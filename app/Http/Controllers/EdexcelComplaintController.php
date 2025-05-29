<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\EdexcelComplaint;
use App\Notifications\InquirySuccessNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PHPMailer\PHPMailer\PHPMailer;

class EdexcelComplaintController extends Controller
{     public function inquiriesList()
    {

        $inquires = EdexcelComplaint::all(); 
        return view('inquiry-list', compact('inquires'));
    }
    public function createComplaints(Request $request)
    {
        $rules = [
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:edexcel_complaints,email',
                'regex:/^[a-zA-Z0-9._%+-]+@(gmail|hotmail|yahoo)\.com$/',
            ],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        if ($request->filled('website')) {
            // Bot detected, silently reject or log
            return redirect()->back();
        }
        $spamKeywords = ['Поздравляем', 'лотерейный билет', 'tinyurl', 'bit.ly'];
        foreach ($spamKeywords as $word) {
            if (stripos($request->input('fname'), $word) !== false || 
                stripos($request->input('description'), $word) !== false) {
                return redirect()->back()->withErrors(['spam' => 'Spam content detected.'])->withInput();
            }
        }
        $EdexcelComplaint = new EdexcelComplaint();
        $EdexcelComplaint->description = $request->input('description');
        $EdexcelComplaint->name = $request->input('fname');
        $EdexcelComplaint->email = $request->input('email');
        $EdexcelComplaint->phone = $request->input('phone');
        $EdexcelComplaint->save();
        $facebookImg = "<img src='https://edexceledu.com/icons/facebook.jpeg' alt='Facebook' width='20' height='20' style='vertical-align:middle'>";
        $instagramImg = "<img src='https://edexceledu.com/icons/instagram.jpeg' alt='Facebook' width='20' height='20' style='vertical-align:middle'>";
        $linkedinImg  = "<img src='https://edexceledu.com/icons/linkedin.jpeg' alt='Facebook' width='20' height='20' style='vertical-align:middle'>";        
        $youtubeImg   = "<img src='https://edexceledu.com/icons/youtube.jpeg' alt='Facebook' width='20' height='20' style='vertical-align:middle'>";       // Send email to the student
              // Send email to the student
        $toStudent = $EdexcelComplaint->email;
        $subjectStudent = "Welcome to Edexcel Academy!";
        $messageStudent = "
            <div style='font-family: Arial, sans-serif; color: #333; line-height: 1.6;'>
                <table width='100%' cellpadding='0' cellspacing='0' border='0'>
                    <tr>
                        <td align='center'>
                            <table style='max-width: 600px; width: 100%; border: 1px solid #ddd; border-radius: 8px; background-color: #fff;' cellpadding='0' cellspacing='0'>

                                <!-- Header -->
                                <tr>
                                    <td style='background-color: #f4f4f4; padding: 15px; text-align: center; font-size: 20px; font-weight: bold; color: #4CAF50; border-top-left-radius: 8px; border-top-right-radius: 8px;'>
                                        Thank You for Your Inquiry!
                                    </td>
                                </tr>

                                <!-- Body -->
                                <tr>
                                    <td style='padding: 20px; text-align: left;'>
                                        <p style='font-size: 16px; margin: 0;'>Dear {$EdexcelComplaint->name},</p>

                                        <p style='font-size: 16px; margin: 10px 0;'>
                                            Welcome to <strong>Edexcel Academy</strong>!We're excited to receive your inquiry and will get back to you shortly.
                                        </p>

                                        <p style='font-size: 16px; margin: 10px 0;'>
                                            In the meantime, feel free to explore our courses, connect with expert educators, and join a community of enthusiastic learners.
                                        </p>

                                        <p style='font-size: 16px; margin: 10px 0;'>
                                            If you need any assistance, contact us at 
                                            <a href='mailto:info@edexceledu.com' style='color: #4CAF50; text-decoration: none;'>info@edexceledu.com</a>.
                                        </p>

                                        <p style='font-size: 16px; margin: 10px 0;'>We’re here to help you succeed!</p>

                                        <p style='font-size: 16px; margin: 10px 0;'>Best regards,</p>
                                        <p style='font-size: 16px; font-weight: bold; margin: 0;'>The Edexcel Academy Team</p>
                                    </td>
                                </tr>

                                <!-- Footer -->
                                <tr>
                                    <td colspan='2' height='10' style='line-height:10px; font-size:0;'>&nbsp;</td>
                                </tr>
                                
                                <tr style='margin-bottom:10px;display:flex;'>
                                    <td align='left' style='color:#43b979; font-size:14px;margin-left:5px;width:50%;'>&copy; 2025 Edexcel Academy. All rights reserved.</td>
                                    <td align='right' style='display:flex;margin-left:30%'>
                                        <a href='https://www.facebook.com/EdexcelAcademyOfficial/' target='_blank' style='margin-right:5px;'>{$facebookImg}</a>
                                        <a href='https://www.instagram.com/edexcel.official?igsh=bmNvcXpkOTUzN2J1&utm_source=qr' target='_blank' style='margin-right:5px;'>{$instagramImg}</a>
                                        <a href='https://www.linkedin.com/company/edexcel-academy/' target='_blank' style='margin-right:5px;'>{$linkedinImg}</a>
                                        <a href='https://youtube.com/@edexcelonline01?si=EuQwX0tL3zk4J-2p' target='_blank'>{$youtubeImg}</a>
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            ";


        $this->sendEmail($toStudent, $subjectStudent, $messageStudent);

        $this->sendAdminInquiryNotification($EdexcelComplaint);

        $admin = User::where('role', 'admin')->first();

        if ($admin) {
            $admin->notify(new InquirySuccessNotification($EdexcelComplaint));
        } else {
            Log::warning('Admin user not found');
        }

        return redirect()->route('newhome')->with('success', 'Inquiry created successfully.');
    }
    protected function sendAdminInquiryNotification(EdexcelComplaint $inquiry)
    {
        $adminEmail = env('email_name'); // Use config, not env()
        $facebookImg = "<img src='https://edexceledu.com/icons/facebook.jpeg' alt='Facebook' width='20' height='20' style='vertical-align:middle'>";
        $instagramImg = "<img src='https://edexceledu.com/icons/instagram.jpeg' alt='Facebook' width='20' height='20' style='vertical-align:middle'>";
        $linkedinImg  = "<img src='https://edexceledu.com/icons/linkedin.jpeg' alt='Facebook' width='20' height='20' style='vertical-align:middle'>";        
        $youtubeImg   = "<img src='https://edexceledu.com/icons/youtube.jpeg' alt='Facebook' width='20' height='20' style='vertical-align:middle'>";       // Send email to the student
         
        if (!$adminEmail) {
            Log::warning('Admin email not configured.');
            return;
        }

        $subject = "Edexcel Notification";
        $messageAdmin = "
                    <div style='font-family: Arial, sans-serif; color: #333; line-height: 1.6;'>
                        <table width='100%' cellpadding='0' cellspacing='0' border='0'>
                            <tr>
                                <td align='center'>
                                    <table style='max-width: 600px; width: 100%; border: 1px solid #ddd; border-radius: 8px; background-color: #fff;' cellpadding='0' cellspacing='0'>
                                        <!-- Header -->
                                        <tr>
                                            <td style='background-color: #f4f4f4; padding: 15px; text-align: center; font-size: 20px; font-weight: bold; color: #4CAF50; border-top-left-radius: 8px; border-top-right-radius: 8px;'>
                                                New Inquiry Received
                                            </td>
                                        </tr>
                                        
                                        <!-- Body -->
                                        <tr>
                                            <td style='padding: 20px; text-align: left;'>
                                                <p style='font-size: 16px; margin: 0;'>Dear Admin,</p>
                                                <p style='font-size: 16px; margin: 10px 0;'>
                                                    A new inquiry has been added to the system. Please find the details below:
                                                </p>
                                                <ul style='font-size: 16px; margin: 10px 0; padding-left: 20px;'>
                                                    <li><strong>Name:</strong> {$inquiry->name}</li>
                                                    <li><strong>Email:</strong> {$inquiry->email}</li>
                                                    <li><strong>Phone:</strong> {$inquiry->phone}</li>
                                                </ul>
                                                <p style='font-size: 16px; margin: 10px 0;'>Best regards,</p>
                                                <p style='font-size: 16px; font-weight: bold; margin: 0;'>The Edexcel Academy Team</p>
                                            </td>
                                        </tr>

                                        <!-- Footer -->
                                        <tr style='margin-bottom:10px;display:flex;'>
                                            <td align='left' style='color:#43b979; font-size:14px;margin-left:5px;width:50%;'>&copy; 2025 Edexcel Academy. All rights reserved.</td>
                                            <td align='right' style='display:flex;margin-left:30%'>
                                                <a href='https://www.facebook.com/EdexcelAcademyOfficial/' target='_blank' style='margin-right:5px;'>{$facebookImg}</a>
                                                <a href='https://www.instagram.com/edexcel.official?igsh=bmNvcXpkOTUzN2J1&utm_source=qr' target='_blank' style='margin-right:5px;'>{$instagramImg}</a>
                                                <a href='https://www.linkedin.com/company/edexcel-academy/' target='_blank' style='margin-right:5px;'>{$linkedinImg}</a>
                                                <a href='https://youtube.com/@edexcelonline01?si=EuQwX0tL3zk4J-2p' target='_blank'>{$youtubeImg}</a>
                                            </td>
                                        </tr>



                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                    ";

        // Send the email using your custom method
        $this->sendEmail($adminEmail, $subject, $messageAdmin);
    }    public function edit($id){ $inqury=EdexcelComplaint::find($id);
        
        return view('edit-inquries',compact('inqury'));}
    
       public function update(Request $request, $id)
{   
    $rules = [
        'email' => "required|string|email|max:255|unique:edexcel_complaints,email,$id",
        'phone' => 'nullable|string|max:20',
       
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    
    $inquiry = EdexcelComplaint::findOrFail($id);

    // Update inquiry fields
    $inquiry->name = $request->input('name');
    $inquiry->email = $request->input('email');
    $inquiry->phone = $request->input('phone');
    $inquiry->description = $request->input('description');
  
    $inquiry->save();

    return redirect()->route('inquiries.list')->with('success', 'inquiry updated successfully.');

}  public function destroy($id)
{
    $inquiry = EdexcelComplaint::findOrFail($id);
    $inquiry->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'Inquiry deleted successfully.'
    ]);
}

    function sendEmail($to, $subject, $body)
    {
        $pass = env('email_pass');
        $name = env('email_name');
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.hostinger.com';
            $mail->SMTPAuth = true;
            $mail->Username = $name;
            $mail->Password = $pass;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Recipients
            $mail->setFrom($name, 'Edexcel'); // Use direct values here
            $mail->addAddress($to);

            // Content
            $mail->isHTML(true); // Set email format to plain text
            $mail->Subject = $subject;
            $mail->Body = $body;

            $mail->send();
            // echo "Email has been sent to $to";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Inquiry;
use App\Notifications\InquirySuccessNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PHPMailer\PHPMailer\PHPMailer;
class InquiryController extends Controller
{
    //
    public function createComplaints(Request $request)
    {
        $rules = [
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:inquiries,email',
                'regex:/^[a-zA-Z0-9._%+-]+@(gmail|hotmail|yahoo)\.com$/'
            ],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $inquiry = new Inquiry();
        $inquiry->description = $request->input('description');
        $inquiry->name = $request->input('fname');
        $inquiry->email = $request->input('email');
        $inquiry->phone = $request->input('phone');
        $inquiry->save();
        $facebookImg = "<img src='https://edexceledu.com/icons/facebook.png' alt='Facebook' width='24' height='24' style='vertical-align:middle'>";
        $instagramImg = "<img src='https://edexceledu.com/icons/facebook.png' alt='Facebook' width='24' height='24' style='vertical-align:middle'>";
        $linkedinImg  = "<img src='https://edexceledu.com/icons/facebook.png' alt='Facebook' width='24' height='24' style='vertical-align:middle'>";        
        $youtubeImg   = "<img src='https://edexceledu.com/icons/facebook.png' alt='Facebook' width='24' height='24' style='vertical-align:middle'>";       // Send email to the student
        $toStudent = $inquiry->email;
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
                                        <p style='font-size: 16px; margin: 0;'>Dear {$inquiry->name},</p>

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
                                            <td style='background-color: #f4f4f4; padding: 15px; text-align: center; font-size: 14px; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px;'>
                                                <div style='display: flex; justify-content: space-between; align-items: center; gap: 10px; margin-bottom: 10px;'>
                                                    <div>
                                                                <span style='color:#43b979 !important'>&copy; 2025 Edexcel Academy. All rights reserved.</span>
                                                    </div>     
                                                    <div style='display:flex;gap:8px;justify-content:space-between'>  
                                                <!-- Facebook -->
                                                    <a href='https://www.facebook.com/EdexcelAcademyOfficial/' target='_blank' style='margin-right:-3px;'>
                                                        {$facebookImg}
                                                        
                                                    </a>

                                                    <!-- Instagram -->
                                                    <a href='https://www.instagram.com/edexcel.official?igsh=bmNvcXpkOTUzN2J1&utm_source=qr' target='_blank'>
                                                        {$instagramImg}
                                                    </a>

                                                    <!-- LinkedIn -->
                                                    <a href='https://www.linkedin.com/company/edexcel-academy/' target='_blank'>
                                                        {$linkedinImg}
                                                    </a>

                                                    <!-- YouTube -->
                                                    <a href='https://youtube.com/@edexcelonline01?si=EuQwX0tL3zk4J-2p' target='_blank'>
                                                       {$youtubeImg}
                                                    </a>
                                                    </div>
                                                </div>
                                                
                                            </td>
                                        </tr>

                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            ";


        $this->sendEmail($toStudent, $subjectStudent, $messageStudent);

        // $this->sendAdminInquiryNotification($inquiry);

        // $admin = User::where('role', 'admin')->first();

        // if ($admin) {
        //     $admin->notify(new InquirySuccessNotification($inquiry));
        // } else {
        //     Log::warning('Admin user not found');
        // }

        return redirect()->route('newhome')->with('success', 'Inquiry created successfully.');
    }

    protected function sendAdminInquiryNotification(Inquiry $inquiry)
    {
        $adminEmail = env('email_name'); // Use config, not env()
        $facebookImg = "<img src='https://edexceledu.com/icons/facebook.png' alt='Facebook' width='24' height='24' style='vertical-align:middle'>";
        $instagramImg = "<img src='https://edexceledu.com/icons/facebook.png' alt='Facebook' width='24' height='24' style='vertical-align:middle'>";
        $linkedinImg  = "<img src='https://edexceledu.com/icons/facebook.png' alt='Facebook' width='24' height='24' style='vertical-align:middle'>";        
        $youtubeImg   = "<img src='https://edexceledu.com/icons/facebook.png' alt='Facebook' width='24' height='24' style='vertical-align:middle'>";       // Send email to the student
        
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
                                        <tr>
                                            <td style='background-color: #f4f4f4; padding: 15px; text-align: center; font-size: 14px; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px;'>
                                                <div style='display: flex; justify-content: space-between; align-items: center; gap: 10px; margin-bottom: 10px;'>
                                                    <div>
                                                                <span style='color:#43b979 !important'>&copy; 2025 Edexcel Academy. All rights reserved.</span>
                                                    </div>     
                                                    <div style='display:flex;gap:8px;'>  
                                                <!-- Facebook -->
                                                    <a href='https://www.facebook.com/EdexcelAcademyOfficial/' target='_blank' style='margin-right:-3px;'>
                                                        {$facebookImg}
                                                        
                                                    </a>

                                                    <!-- Instagram -->
                                                    <a href='https://www.instagram.com/edexcel.official?igsh=bmNvcXpkOTUzN2J1&utm_source=qr' target='_blank'>
                                                        {$instagramImg}
                                                    </a>

                                                    <!-- LinkedIn -->
                                                    <a href='https://www.linkedin.com/company/edexcel-academy/' target='_blank'>
                                                        {$linkedinImg}
                                                    </a>

                                                    <!-- YouTube -->
                                                    <a href='https://youtube.com/@edexcelonline01?si=EuQwX0tL3zk4J-2p' target='_blank'>
                                                       {$youtubeImg}
                                                    </a>
                                                    </div>
                                                </div>
                                                
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

<?php

namespace App\Http\Controllers;
use App\Notifications\InquirySuccessNotification;
use App\Models\Inquiry;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\Log;
class VerificationController extends Controller
{
    private function getSvgImageTag($name, $width = 16, $height = 16)
        {
                $path = public_path("icons/{$name}.svg");

                if (!file_exists($path)) {
                    return '';
                }

                $svg = file_get_contents($path);
                $base64 = base64_encode($svg);

                return "<img src='data:image/svg+xml;base64,{$base64}' width='{$width}' height='{$height}' alt='{$name}' style='vertical-align:middle;' />";
        }
    public function sendEmail(Request $request)
    {
        $email = $request->input('email');

        // Logic to send a verification email with a link to access the page

        return redirect()->back()->with('status', 'Verification link sent to your email address.');
    }
    
    public function show()
    {
        return view('verify-email'); // view to show modal
    }
    public function createinquiry(Request $request)
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

        // Send email to the student
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
                                            <a href='mailto:info@edexceledu.com' style='color: #4CAF50; text-decoration: none;'>test@edexceledu.com</a>.
                                        </p>

                                        <p style='font-size: 16px; margin: 10px 0;'>We’re here to help you succeed!</p>

                                        <p style='font-size: 16px; margin: 10px 0;'>Best regards,</p>
                                        <p style='font-size: 16px; font-weight: bold; margin: 0;'>The Edexcel Academy Team</p>
                                    </td>
                                </tr>

                                <!-- Footer -->
                                <tr>
                                    <td style='background-color: #f4f4f4; color: #4CAF50; padding: 15px; text-align: center; font-size: 14px; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px;'>
                                        &copy; 2025 Edexcel Academy. All rights reserved.
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            ";


        $this->sendEmail($toStudent, $subjectStudent, $messageStudent);

        // $this->sendEmail($toAdmin, $subjectAdmin, $messageAdmin);
        $this->sendAdminInquiryNotification($inquiry);

       $admin = User::where('role', 'admin')->first();

        if ($admin) {
            $admin->notify(new InquirySuccessNotification($inquiry));
        } else {
            // Handle the case where no admin was found
            Log::warning('Admin user not found');
        }

        return redirect()->route('newhome')->with('success', 'Inquiry created successfully.');
    }
    protected function sendAdminInquiryNotification(Inquiry $inquiry)
            {
                $adminEmail = env('email_name'); // Use config, not env()
                $facebookImg  = $this->getSvgImageTag('facebook');
                $instagramImg = $this->getSvgImageTag('instagram');
                $linkedinImg  = $this->getSvgImageTag('linkedin');
                $youtubeImg   = $this->getSvgImageTag('youtube');
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
    public function sendVerificationEmail(Request $request)
{   
     $request->validate([
        'email' => [
            'required',
            'email',
            'regex:/^[a-zA-Z0-9._%+-]+@(gmail\.com|yahoo\.com|outlook\.com)$/i'
        ]
    ], [
        'email.required' => 'Email is required.',
        'email.email' => 'Please enter a valid email address.',
        'email.regex' => 'Only Gmail, Yahoo, and Outlook emails are allowed.'
    ]);
    $otp = rand(100000, 999999); 
    session(['otp' => $otp, 'otp_expiry' => now()->addMinutes(10)]);

    $email = $request->input('email');
    $subject = 'Email Verification';
    $facebookImg  = $this->getSvgImageTag('facebook');
    $instagramImg = $this->getSvgImageTag('instagram');
    $linkedinImg  = $this->getSvgImageTag('linkedin');
    $youtubeImg   = $this->getSvgImageTag('youtube');
    // In the email body
    $body = "
    <div style='font-family: Arial, sans-serif; color: #333; line-height: 1.6;'>
        <table style='max-width: 600px; margin: 0 auto; border: 1px solid #ddd; border-radius: 8px;'>
            <thead>
                <tr>
                    <th style='background-color: #f4f4f4; padding: 15px; text-align: center;'>
                        <h2 style='margin: 0; color: #4CAF50;'>Welcome to Edexcel Academy</h2>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style='padding: 20px; text-align: left;'>
                        <p style='margin: 0; font-size: 16px;'>Dear User,</p>
                        <p style='margin: 10px 0; font-size: 16px;'>
                            Thank you for signing up!
                        </p>
                         <p style='margin: 10px 0; font-size: 16px;'>
                            Your One-Time Password (OTP) for verification is:
                        </p>
                        <p style='text-align: center; font-size: 20px; font-weight: bold; color: #4CAF50;'>
                            $otp
                        </p>
                        <p style='margin: 10px 0; font-size: 16px;'>
                            This OTP is valid for 10 minutes. Do not share it with anyone.
                        </p>
                        <p style='margin: 10px 0; font-size: 16px;'>
                            If you did not sign up for an account, please ignore this email.
                        </p>
                        <p style='margin: 10px 0; font-size: 16px;'>Best regards,</p>
                        <p style='margin: 10px 0; font-size: 16px; font-weight: bold;'>Edexcel Academy</p>
                    </td>
                </tr>
            </tbody>
            <tfoot>
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

            </tfoot>
        </table>
    </div>
";

    // Send the email using PHPMailer
    $this->sendEmails($subject, $body, 'admin', $email, true); // true means it's sending HTML content

    return redirect()->route('tutor-signup')->with([
        'success' => 'Verification link sent to your email!',
        'verifiedEmail' => $email
    ]);
    
}
public function signup()
    {
        $schoolClasses = SchoolClass::all();
        $countriesPhone = collect(config('phonecountries.countries'));
        $countries_number_length = collect(config('countries_number_length.countries'));
        $countries_prefix = collect(config('countries_prefix.countries'));
        $countries = collect(config('countries_assoc.countries'));
        $languages = collect(config('languages.languages'));
         $courses = collect(config('courses.courses'));
        $symbols = collect(config('symbols.symbols'));  // Will show all contents of config/symbols.php
        $subjectsTeach = collect(config('subjects.subjects')); // Fetch languages from config
        $universities = collect(config('universities.universities'));
        // Retrieve verified email from session (if exists)
        $verifiedEmail = session('verified_email', '');
        return view('tutor-signup', compact(['courses', 'universities','symbols', 'countriesPhone', 'countries', 'verifiedEmail', 'schoolClasses', 'countries_number_length', 'countries_prefix', 'languages'])
        )->with([
            'success' => 'Verification link sent to your email!',
            'verifiedEmail' => $verifiedEmail // Corrected key usage
        ]);
    }
        public function verifyOtp(Request $request)
        {
            $request->validate(['otp' => 'required|numeric']);
    
            // Retrieve OTP from session
            $sessionOtp = session('otp');
            $otpExpiry = session('otp_expiry');
    
            if ($sessionOtp && $otpExpiry && now()->lt($otpExpiry)) {
                if ((string) $request->otp === (string) $sessionOtp) {
                    // OTP is correct, remove from session and proceed
                    session()->forget(['otp', 'otp_expiry']);
                    return response()->json(['success' => true, 'message' => 'OTP verified!']);
                } else {
                    return response()->json(['success' => false, 'message' => 'Invalid OTP.']);
                }
            } else {
                return response()->json(['success' => false, 'message' => 'OTP expired. Please request a new one.']);
            }
        }
    
    

function sendEmails($subject, $body, $to_name, $to_email) {  
  $mail = new PHPMailer(true);  
  $pass = env('email_pass');
  $name = env('email_name'); 
    
    try {
        $mail->isSMTP();
        $mail->Host ='smtp.hostinger.com';  
        $mail->SMTPAuth = true;
        $mail->Username =  $name;  // Your email
        $mail->Password =  $pass ;  // Your password
        $mail->SMTPSecure = 'tls';  // Encryption method
        $mail->Port = 587;  // SMTP port

        // Email settings
        $mail->setFrom( $name, 'Edexcel');
        $mail->addAddress($to_email, $to_name);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AltBody = 'This is the plain text version  of the email body.';

        if ($mail->send()) {
            Log::info("Email sent to $to_email successfully!");
            return redirect()->route('newhome')->with('success', 'Email sent successfully!');
        } else {
            Log::error("Email sending failed to $to_email.");
            return redirect()->back()->with('error', 'Email sending failed. Please try again.');
        }
    } catch (Exception $e) {
        Log::error("Email sending failed: " . $e->getMessage());
        return redirect()->back()->with('error', 'Email sending failed. Please try again.');
    }
}
    
    public function sendLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Generate a token for the user
            $token = Hash::make($user->email);

            // Send verification link email
            Mail::send('emails.verify', ['token' => $token], function ($message) use ($user) {
                $message->to($user->email);
                $message->subject('Email Verification Link');
            });

            return response()->json(['message' => 'Verification link sent!']);
        }

        return response()->json(['message' => 'Email not found'], 404);
    }

    public function verify($token)
    {
        $user = Auth::user();

        // Verify token and update email verification timestamp
        if (Hash::check($user->email, $token)) {
            $user->email_verified_at = now();
            $user->save();

            return redirect()->route('protected.page')->with('success', 'Email verified!');
        }

        return redirect()->route('verification.notice')->withErrors(['Invalid verification link']);
    }

    public function checkEmail(Request $request)
    {
        // Validate the email input
        $request->validate([
            'email' => 'required|email',
        ]);

        // Check if the email exists in the users table
        $emailExists = User::where('email', $request->email)->exists();

        if ($emailExists) {
            return response()->json([
                'error' => true,
                'message' => 'This email is already registered.'
            ], 400); // HTTP 400 for client-side error
        }

        return response()->json([
            'error' => false,
            'message' => 'This email is available.'
        ]);
    }
}

<?php

namespace App\Http\Controllers;
use App\Mail\VerificationNotification;
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
        $facebookImg = "<img src='https://edexceledu.com/icons/facebook.jpeg' alt='Facebook' width='20' height='20' style='vertical-align:middle'>";
        $instagramImg = "<img src='https://edexceledu.com/icons/instagram.jpeg' alt='Instagram' width='20' height='20' style='vertical-align:middle'>";
        $linkedinImg  = "<img src='https://edexceledu.com/icons/linkedin.jpeg' alt='LinkedIn' width='20' height='20' style='vertical-align:middle'>";
        $youtubeImg   = "<img src='https://edexceledu.com/icons/youtube.jpeg' alt='Youtube' width='20' height='20' style='vertical-align:middle'>";
        session(['otp' => $otp, 'otp_expiry' => now()->addMinutes(10)]);

        $email = $request->input('email');
        $subject = 'Email Verification';

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
                                        </td>
                                    </tr>
                                        <tr style='margin-bottom:10px;display:flex;'>
                                            
                                        </tr>
                                    </table>
                                </div>
                            ";

        // Send the email using PHPMailer
        $this->sendEmails($email, $otp, $subject, $body, true); // true means it's sending HTML content

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
        return view(
            'tutor-signup',
            compact(['courses', 'universities', 'symbols', 'countriesPhone', 'countries', 'verifiedEmail', 'schoolClasses', 'countries_number_length', 'countries_prefix', 'languages'])
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



    function sendEmails($to, $otp, $subject, $body)
    {
        $pass = env('email_pass');
        $name = env('email_name');
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();                                            // Set mailer to use SMTP
                $mail->Host       = 'smtp.hostinger.com';                     // Specify main and backup SMTP servers
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username = $name;
                $mail->Password = $pass;        
                                     
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption, PHPMailer::ENCRYPTION_SMTPS also accepted
                $mail->Port       = 465;
                

            // Recipients
            $mail->setFrom('info@edexceledu.com', 'Edexcel'); // Use direct values here
            $mail->addAddress($to);
            $mail->addReplyTo('info@edexceledu.com', 'Support');
            // Content
            $mail->isHTML(true); // Set email format to plain text
            $mail->Subject = $subject;
            $mail->Body = $body;
             $mail->AltBody = strip_tags($body);
            $mail->send();
            // echo "Email has been sent to $to";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
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

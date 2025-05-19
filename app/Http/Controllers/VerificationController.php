<?php

namespace App\Http\Controllers;

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
                <td style='background-color: #f4f4f4; padding: 15px; text-align: center; font-size: 14px; color: #777;'>
                    <p>&copy; <?= date('Y') ?> Edexcel Academy. All rights reserved.</p>
                    <div style='display: flex; justify-content: center; gap: 10px; margin-top: 10px;'>
                        <a href='https://www.linkedin.com/company/edexcel-academy/' target='_blank' style='text-decoration: none;'>
                            <svg width='24' height='24' fill='#4caf50' viewBox='0 0 24 24'>
                                <path d='M4.98 3.5C4.98 4.88 3.88 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1 4.98 2.12 4.98 3.5zM.5 8.5h4V24h-4V8.5zm7.5 0h3.8v2.1h.05c.53-1 1.82-2.1 3.75-2.1 4 0 4.7 2.63 4.7 6V24h-4v-7.8c0-1.87-.03-4.3-2.62-4.3-2.63 0-3.03 2.05-3.03 4.16V24h-4V8.5z'/>
                            </svg>
                        </a>

                        <a href='https://www.facebook.com/EdexcelAcademyOfficial/' target='_blank' style='text-decoration: none;'>
                            <svg width='24' height='24' fill='#4caf50' viewBox='0 0 24 24'>
                                <path d='M22.675 0h-21.35C.6 0 0 .6 0 1.325v21.351C0 23.4.6 24 1.325 24H12.82v-9.294H9.692v-3.622h3.128V8.413c0-3.1 1.894-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.31h3.587l-.467 3.622h-3.12V24h6.116C23.4 24 24 23.4 24 22.675V1.325C24 .6 23.4 0 22.675 0z'/>
                            </svg>
                        </a>

                        <a href='https://www.instagram.com/edexcel.official?igsh=bmNvcXpkOTUzN2J1&utm_source=qr' target='_blank' style='text-decoration: none;'>
                            <svg width='24' height='24' fill='#4caf50' viewBox='0 0 24 24'>
                                <path d='M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.353 3.608 1.328.975.975 1.266 2.242 1.328 3.608.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.062 1.366-.353 2.633-1.328 3.608-.975.975-2.242 1.266-3.608 1.328-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.366-.062-2.633-.353-3.608-1.328-.975-.975-1.266-2.242-1.328-3.608C2.175 15.584 2.163 15.204 2.163 12s.012-3.584.07-4.85c.062-1.366.353-2.633 1.328-3.608.975-.975 2.242-1.266 3.608-1.328C8.416 2.175 8.796 2.163 12 2.163M12 0C8.741 0 8.333.014 7.052.072 5.773.13 4.662.369 3.757.893 2.852 1.417 2.084 2.185 1.56 3.09.935 4.005.694 5.117.637 6.396.579 7.676.566 8.084.566 12s.014 4.324.072 5.604c.057 1.279.298 2.391.822 3.296.524.905 1.292 1.673 2.197 2.197.905.524 2.017.765 3.296.822 1.28.058 1.688.072 5.604.072s4.324-.014 5.604-.072c1.279-.057 2.391-.298 3.296-.822.905-.524 1.673-1.292 2.197-2.197.524-.905.765-2.017.822-3.296.058-1.28.072-1.688.072-5.604s-.014-4.324-.072-5.604c-.057-1.279-.298-2.391-.822-3.296-.524-.905-1.292-1.673-2.197-2.197C20.391.369 19.279.13 18 .072 16.719.014 16.311 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zm0 10.162a3.999 3.999 0 1 1 0-7.998 3.999 3.999 0 0 1 0 7.998zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z'/>
                            </svg>
                        </a>

                        <a href='https://youtube.com/@edexcelonline01?si=EuQwX0tL3zk4J-2p' target='_blank' style='text-decoration: none;'>
                            <svg width='24' height='24' fill='#4caf50' viewBox='0 0 24 24'>
                                <path d='M23.498 6.186a2.99 2.99 0 0 0-2.104-2.115C19.548 3.5 12 3.5 12 3.5s-7.548 0-9.394.571a2.99 2.99 0 0 0-2.104 2.115C0 8.036 0 12 0 12s0 3.964.502 5.814a2.99 2.99 0 0 0 2.104 2.115C4.452 20.5 12 20.5 12 20.5s7.548 0 9.394-.571a2.99 2.99 0 0 0 2.104-2.115C24 15.964 24 12 24 12s0-3.964-.502-5.814zM9.75 15.568V8.432L15.818 12 9.75 15.568z'/>
                            </svg>
                        </a>
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

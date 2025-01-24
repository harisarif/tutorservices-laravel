<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Models\User;

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
        'email' => 'required|email',
    ]);

    $email = $request->input('email');
    $subject = 'Email Verification';

    // In the email body
    $body = "
        <div style='font-family: Arial, sans-serif; color: #333; line-height: 1.6;'>
            <table style='max-width: 600px; margin: 0 auto; border: 1px solid #ddd; border-radius: 8px;'>
                <thead>
                    <tr>
                        <th style='background-color: #f4f4f4; padding: 15px; text-align: center;'>
                            <h2 style='margin: 0; color: #4CAF50;'>Welcome to Edexcel</h2>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style='padding: 20px; text-align: left;'>
                            <p style='margin: 0; font-size: 16px;'>Dear User,</p>
                            <p style='margin: 10px 0; font-size: 16px;'>
                                Thank you for signing up! Please verify your email by clicking the button below:
                            </p>
                            <p style='text-align: center; margin: 20px 0;'>
                                
                             <a href='https://bit.ly/4jm3MAS' style='background-color: #4CAF50; color: #fff; padding: 12px 20px; text-decoration: none; border-radius: 5px; font-size: 16px;'>Verify Your Email</a>
                                </p>
                            <p style='margin: 10px 0; font-size: 16px;'>
                                If you did not sign up for an account, please ignore this email.
                            </p>
                            <p style='margin: 10px 0; font-size: 16px;'>Best regards,</p>
                            <p style='margin: 10px 0; font-size: 16px; font-weight: bold;'>Edexcel</p>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td style='background-color: #f4f4f4; padding: 15px; text-align: center; font-size: 14px; color: #777;'>
                            &copy; " . date('Y') . " Edexcel. All rights reserved.
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    ";

    // Send the email using PHPMailer
    $this->sendEmails($subject, $body, 'admin', $email, true); // true means it's sending HTML content

    return redirect()->route('newhome')->with('success', 'Verification link sent to your email!');
}



function sendEmails($subject, $body, $to_name, $to_email)
{

    $pass = env('email_pass');
    $name = env('email_name');
    $smtp_details = config('mail.mailers.smtp');
    $mail = new PHPMailer(true); 
    try {
        $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.hostinger.com';                 // Specify SparkPost SMTP server
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username =  $name;                 // SMTP username
    $mail->Password = $pass; 
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption
    $mail->Port = 587;                                    // TCP port to connect to

    // Email settings
    $mail->setFrom($name, 'Edexcel');
    $mail->addAddress($to_email, $to_name);  // Add a recipient
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;
    $mail->AltBody = 'This is the plain text version of the email body.';        // Plain text version (for non-HTML email clients)

    // Send the email
    if ($mail->send()) {
        echo 'Email sent successfully!';
    } else {
        echo 'Email could not be sent.';
    }
    } catch (Exception $e) {
        // dd($e->getMessage());
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

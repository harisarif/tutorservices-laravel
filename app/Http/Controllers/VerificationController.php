<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
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
        $link = route('tutor'); // Link to the protected route
        $body = "Dear User,\n\nThank you for signing up! Please verify your email by clicking the link below:\n";
        $body .= "<a href='{$link}'>Verify Email</a>\n\n";
        $body .= "Best regards,\nYour Company Name";
    
        // Send the email using your SMTP service
        $this->sendEmails($email, $subject, $body);
    
        return back()->with('success', 'Verification link sent to your email!');
    }
    private function sendEmails($to, $subject, $body)
        {
            $mail = new PHPMailer(true);

            try {
                // Server settings
                // $mail->SMTPDebug = 2;
                $mail->isSMTP();
                $mail->Host = 'smtp.hostinger.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'info@edexceledu.com';
                $mail->Password = 'Babar123!@#';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                // Recipients
                $mail->setFrom('info@edexceledu.com', 'Edexcel'); // Use direct values here
                $mail->addAddress($to);

                // Content
                $mail->isHTML(false); // Set email format to plain text
                $mail->Subject = $subject;
                $mail->Body = $body;

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
}

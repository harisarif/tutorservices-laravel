<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


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
        $email = $request->input('email');
        
        // Send an email with the verification link (tutor-signup link)
        Mail::to($email)->send(new \App\Mail\SendVerificationLink($email));

        return back()->with('success', 'Verification link sent to your email!');
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

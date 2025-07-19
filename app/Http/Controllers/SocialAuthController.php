<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Tutor;
 use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
 use Illuminate\Http\Request;

class SocialAuthController extends Controller
{
    // Redirect to provider (Google)
    public function redirect($provider, Request $request)
{
    // ✅ Store tutor info in session BEFORE redirect
    if ($request->filled('teacher_id')) {
        session()->put('selected_teacher_id', $request->input('teacher_id'));
    }
    if ($request->filled('teacher_name')) {
        session()->put('selected_teacher_name', $request->input('teacher_name'));
    }

    return Socialite::driver($provider)->redirect();
}


    // Handle callback from provider
  public function callback($provider)
{
    $tutorId = session('selected_teacher_id');
    $tutorName = session('selected_teacher_name');

    $socialUser = Socialite::driver($provider)->stateless()->user();
    $email = $socialUser->getEmail();

    if (!$email) {
        return redirect()->route('login')->with('alert', 'Unable to retrieve your email from provider.');
    }

    $user = User::where('email', $email)->first();

    if ($user) {
        Auth::login($user);
        return redirect()->route('newhome')->with('alert', 'User already exists.');
    }

    $user = new User();
    $user->name = $socialUser->getName() ?? 'Unknown User';
    $user->email = $email;
    $user->password = Hash::make(strval(mt_rand(10000000, 99999999)));
    $user->role = 'user';
    $user->save();

    $student = new Student();
    $student->name = $user->name;
    $student->email = $user->email;
    $student->password = $user->password;
    $student->user_id = $user->id;   $student->tutor_name = $tutorName; // ✅ Save tutor name
    $student->tutor_id = $tutorId;   
    $student->session_id = session()->getId();
    $student->save();
// ✅ Update tutor record with student ID
Tutor::where('teacher_id', $tutorId)->update([
    'student_id' => $student->id
]);
    Auth::login($user);
    return redirect()->route('newhome')->with('alert', 'Account created and logged in successfully.');
}





// Make sure to import the Student model

public function changePassword(Request $request)
{
    $request->validate([
        'password' => 'required|string|min:8|confirmed',
    ]);

    $user = Auth::user();
    $hashedPassword = Hash::make($request->password);

    // Update password in users table
    $user->password = $hashedPassword;
    $user->save();

    // If there's a linked student record, update that too
    $student = Student::where('email', $user->email)->first();
    if ($student) {
        $student->password = $hashedPassword;
        $student->save();
    }

    return redirect()->back()->with('success', 'Password changed successfully.');
}

public function redirectToFacebook()
{
    return Socialite::driver('facebook')
        ->scopes(['email']) // request email permission
        ->redirect();
}


public function handleFacebookCallback() {
   $socialUser = Socialite::driver('facebook')->user();
   // Check if user exists
    $user = User::where('email', $socialUser->getEmail())->first();

    if (!$user) {
        // Create new user
        $user = new User();
        $user->name = $socialUser->getName();
        $user->email = $socialUser->getEmail();
        $user->password = Hash::make(strval(mt_rand(10000000, 99999999))); // random 8-digit password
        $user->role = 'user';
        $user->save();

        // Create associated student
        $student = new Student();
        $student->name = $user->name;
        $student->email = $user->email;
        $student->password = $user->password; // use same hashed password
        $student->user_id = $user->id;
        $student->session_id = session()->getId();
        $student->save();
    } else {
        // If user exists, redirect with alert
        Auth::login($user);
        return redirect()->route('newhome')->with('alert', 'You are already registered. Logged in successfully.');
    }

    // Log the user in
    Auth::login($user);

    return redirect()->route('newhome');
}
}


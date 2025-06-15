<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SocialAuthController extends Controller
{
    // Redirect to provider (Google)
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    // Handle callback from provider
   public function callback($provider)
{
    $socialUser = Socialite::driver($provider)->stateless()->user();

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


    // Log the user in
    Auth::login($user);

    return redirect()->route('newhome'); // or any route you want
}

}
}

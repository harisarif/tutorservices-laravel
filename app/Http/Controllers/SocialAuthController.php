<?php

namespace App\Http\Controllers;

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

        // Find or create user
        $user = User::updateOrCreate(
            ['email' => $socialUser->getEmail()],
            [
                'name' => $socialUser->getName(),
                'password' => Hash::make(Str::random(24)),
                'role' => 'user', // Change if needed
            ]
        );
        $student = Student::firstOrCreate(
            ['email' => $user->email],
            [
                'name' => $user->name,
                'user_id' => $user->id,
                'session_id' => session()->getId(),
                'password' => bcrypt(Str::random(16)), // optional
            ]
        );
        Auth::login($user);

        return redirect('/')->with('success', 'You are logged in!');
    }
}


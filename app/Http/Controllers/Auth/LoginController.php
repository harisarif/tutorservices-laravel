<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tutor;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return mixed
     */
    protected function authenticated(Request $request, User $user)
{
    // Check if the user is a tutor
    if ($user->role === 'tutor') {
        // Assuming there's a 'tutor' relationship on the User model to retrieve additional tutor-specific data
        $tutor = $user->tutor; // Get the associated tutor model

        // Check if the tutor's status is inactive
        if ($tutor && $tutor->status === 'inactive') {
            // Log out if inactive
            Auth::logout();

            // Invalidate the session to clear the session data
            $request->session()->invalidate();

            // Regenerate the CSRF token to avoid session fixation attacks
            $request->session()->regenerateToken();

            return redirect()->route('newhome')->with('error', 'Your account is inactive. Please contact support.');
        }

        // If the tutor's status is active, redirect to the students listing
        return redirect()->route('students-listing');
    }

    // Redirect based on the user's role
    if ($user->role === 'admin') {
        return redirect()->route('home');
    }

    // Default redirection for other roles
    return redirect()->route('hiring-tutor');
}




        

    // Other methods...
}
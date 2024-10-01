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
            // Check if the user is a tutor and their status
            if ($user->role === 'tutor') {
                $tutor = $user->tutor; // Get the associated tutor

                // Check if the tutor's status is inactive
                if ($tutor && $tutor->status === 'inactive') {
                    // Log out if inactive
                    Auth::logout();

                    return redirect('/')->with('error', 'Your account is inactive. Please contact support.');
                }

                return redirect()->route('students-listing'); // Redirect if active
            }

            // Redirect based on role
            if ($user->role === 'admin') {
                return redirect()->route('home');
            }

            return redirect()->route('hiring-tutor');
        }



        

    // Other methods...
}
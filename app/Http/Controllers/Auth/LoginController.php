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
    if ($user->role === 'tutor') {
        $tutor = $user->tutor; // Retrieve the associated tutor
    
        // Check if the tutor exists and if the status is active
        if ($tutor && $tutor->status === 'active') {
            // Store the session ID
            $tutor->session_id = session()->getId();
            $tutor->save();
    
            return redirect()->route('students-listing'); // Redirect to students listing page
        } else {
            // If the tutor is inactive, log them out and redirect with an error message
            Auth::logout();
            return redirect()->route('login')->with('error', 'Your account is inactive. Please contact support.');
        }
    }

    if ($user->role === 'admin') {
        return redirect()->route('home');
    }

    return redirect()->route('hiring-tutor');
}





        

    // Other methods...
}
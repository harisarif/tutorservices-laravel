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
        $tutor = $user->tutor;
        
        // Store the session ID
        if ($tutor) {
            $tutor->session_id = session()->getId(); // Save current session ID
            $tutor->save();
        }

        return redirect()->route('students-listing');
    }

    if ($user->role === 'admin') {
        return redirect()->route('home');
    }

    return redirect()->route('hiring-tutor');
}





        

    // Other methods...
}
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

class AutoLogout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        if (Auth::check()) {
            $lastActivity = session('last_activity', Carbon::now()->timestamp); // Default to current time if not set
            $timeout = 3 * 60; // 3 minutes
            
            if (Carbon::now()->timestamp - $lastActivity > $timeout) {
                Auth::logout();
                session()->flush();
                return redirect()->route('login')->with('error', 'You have been logged out due to inactivity.');
            }

            // Update last activity timestamp
            session()->put('last_activity', Carbon::now()->timestamp);
            session()->save(); // Ensure session updates are saved
        }

        return $next($request);
    }
}
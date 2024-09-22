<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class CheckEmailVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();
            if (!$user->hasVerifiedEmail()) {
                // User is authenticated but not verified, show verification modal
                return response()->view('emailVerification');
            }
            return $next($request); // User is authenticated and verified
        }

        // User is not authenticated, show the email verification modal
        return response()->view('emailVerification');
    }
}

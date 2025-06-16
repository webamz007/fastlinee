<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAgencyActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the user is an agency and active
            if (Auth::user()->user_type == 1 && Auth::user()->is_active == 0) {
                // If the user is not an active agency, log them out
                Auth::logout();
                // Redirect to the login page with a message

                return redirect('/login')->with('status', 'Your account is not active. Admin will approve soon.');
            }
        }

        // If the user is not authenticated, continue with the request
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Users
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user() && Auth::user()->role_id == 2 && Auth::user()->is_active == 1 && Auth::user()->email_verified_at != NULL) {
            // Redirect to path
            return $next($request);
        } else if (Auth::user() && Auth::user()->role_id == 2 && Auth::user()->is_active == 0 && Auth::user()->email_verified_at == NULL) {
            // Redirect to login
           Auth::logout();
           return redirect()->route('login')->with('You are blocked!!');
        } else if (Auth::user() && Auth::user()->role_id == 1) {
            // Redirect to user dashboard
             return redirect()->route('dashboard');
        } else {
            // Redirect to login page
            return redirect()->route('login');
        }
    }
}

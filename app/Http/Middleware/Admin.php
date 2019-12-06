<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
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
        if (Auth::user() && Auth::user()->role_id == 1 && Auth::user()->email_verified_at != NULL) {
            // Redirect to path
            return $next($request);
        } else if (Auth::user() && Auth::user()->role_id == 2 && Auth::user()->email_verified_at == NULL) {
            // Redirect to user dashboard
             return redirect()->route('home');
        } else {
            // Redirect to login page
            return redirect()->route('login');
        }
    }
}

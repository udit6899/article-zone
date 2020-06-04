<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthorMiddleware
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
        if (Auth::check() && !Auth::user()->is_admin) {
            // If user is author and authenticated, allow to next handler
            return $next($request);
        } else {
            // If user is not author, redirect to login
            return redirect('/login');
        }
    }
}

<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check() && Auth::user()->is_admin) {
            // If authenticated and user is admin, then redirect to admin dashboard
            return redirect()->route('admin.dashboard');
        } else if (Auth::guard($guard)->check() && !Auth::user()->is_admin) {
            // If authenticated and user is author, then redirect to author dashboard
            return redirect()->route('author.dashboard');
        }

        return $next($request);
    }
}

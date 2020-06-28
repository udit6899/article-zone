<?php

namespace App\Http\Middleware;

use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Closure;

class CheckContributor
{
    /**
     * Check the user is an old participant or not
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //  Check the user is exist or not
        if ($request->exists('email') &&
            $user = User::where('email', $request->email)->first()) {

            if ($user->password == null) {

                // If user is exists and an old contributor, then reset the password
                Toastr::info("You are an old contributor ! Please reset your password to proceed.", 'Info');

                // Return to password reset view
                return redirect()->route('password.request');
            } else {

                // If user is exists and not a contributor
                return $next($request);
            }
        }
    }
}

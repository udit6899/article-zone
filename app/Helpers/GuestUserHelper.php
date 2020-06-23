<?php


namespace App\Helpers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestUserHelper
{
    /**
     * Add firstOrCreate operation for guest user
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User
     */
    public static function getOrCreate(Request $request) {

        // Check the user is authenticated or not
        if (Auth::check()) {

            // If authenticated the return user details
            $user = Auth::user();
        } else {

            // Validate the request
            $request->validate([
                'name' => ['required', 'string'],
                'email' => ['required', 'email'],
            ]);

            // Get user details from DB
            $user = User::where('email', '=', $request->email)->first();

            // Check user is exist or not
            if ($user === null) {
                // If user doesn't exist, then create new one
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email
                ]);
            }
        }

        // Return the user details
        return $user;
    }


    /*
     * Get authentication redirect path for users
     *
     * @return string
     */
    public static function getRedirectUrl() {

        if (Auth::check() && Auth::user()->is_admin) {

            // If user is authenticated and role is admin, then set admin dashboard path
            $redirectTo = route('admin.dashboard');
        } else {

            // If user authenticated and role is author, then set author dashboard path
            $redirectTo = route('author.dashboard');
        }

        // Return redirectTo path
        return $redirectTo;
    }
}

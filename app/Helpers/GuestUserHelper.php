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
    public static function getOrcreate(Request $request) {

        // Check the user is authenticated or not
        if (Auth::check()) {

            // If authenticated the return user details
            $user = Auth::user();
        } else {

            /// Validate the request
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
                    'email' => $request->email,
                    'mobile_no' => rand(1000000000, 9999999999),
                    'password' => ''
                ]);
            }
        }

        // Return the user details
        return $user;
    }
}

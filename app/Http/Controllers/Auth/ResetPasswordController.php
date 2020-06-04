<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo;

    public function __construct()
    {
        if (Auth::check() && Auth::user()->is_admin) {
            // If user is admin and authenticated, then set admin dashboard path
            $this->redirectTo = route('admin.dashboard');
        } else {
            // If user is author and authenticated, then set author dashboard path
            $this->redirectTo = route('author.dashboard');
        }
    }
}

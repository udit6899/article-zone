<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\GuestUserHelper;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Apply the redirecting url
     *
     * @return void
     */
    public function __construct()
    {
        // Get redirectTo path for user
        $this->redirectTo = GuestUserHelper::getRedirectUrl();

        $this->middleware('guest')->except('logout');
    }

}

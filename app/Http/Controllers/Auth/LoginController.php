<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\GuestUserHelper;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Get redirectTo path for user
        $this->redirectTo = GuestUserHelper::getRedirectUrl();

        $this->middleware('guest')->except('logout');
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        // Check the user is verified or not
        if (Auth::user()->email_verified_at) {

            // If user is verified, then redirect to dashboard
            return redirect($this->redirectTo);

        } else {

            Auth::logout();
            // Protect user to logged in, if doesn't verified the email
            Toastr::error('Your account is not verified ! Please check your email to verify.', 'Error');

            return redirect('/login');
        }
    }

}

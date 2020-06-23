
<!--========================== extend-master-blade ==========================-->
@extends('layouts.frontend.app')

@section('title', 'Login')

@push('css')
    <link href="{{ asset('assets/frontend/css/auth/style.css') }}" rel="stylesheet">
@endpush

<!--========================== include content ==========================-->
@section('content')
    <!--============================== login-area-start ================================-->
    <section class="sign-in">

        <div class="container-login">
            <div class="signin-content">
                <div class="signin-image">
                    <figure>
                        <img src="{{ asset('assets/frontend/images/signin.png') }}" alt="sing up image">
                    </figure>
                    <a href="{{ route('register') }}" class="signup-image-link">Create an account</a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Sign in</h2>
                    <form action="{{ route('login') }}" method="POST" class="register-form" id="login-form">
                        <!-- Implement csrf -->
                        @csrf
                        <div class="form-group">
                            <label for="your_email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input id="email" type="email" placeholder="E-mail Address" value="{{ old('email') }}"
                                   name="email" required autocomplete="email" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock material-icons-name"></i></label>
                            <input type="password" name="password" id="your_pass"
                                   placeholder="Password" required autocomplete="current-password"/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="remember" id="remember-me" class="agree-term"
                                {{ old('remember') || Auth::viaRemember() ? 'checked' : '' }}/>
                            <label for="remember-me" class="label-agree-term">
                                <span><span></span></span>Remember me
                            </label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                    <div class="social-login">
                        <span class="social-label">Or login with</span>
                        <ul class="socials">
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

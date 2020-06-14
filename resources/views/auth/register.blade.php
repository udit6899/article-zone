
<!--========================== extend-master-blade ==========================-->
@extends('layouts.frontend.app')

@section('title', 'Signup')

@push('css')
    <link href="{{ asset('assets/frontend/css/auth/style.css') }}" rel="stylesheet">
@endpush

<!--========================== include content ==========================-->
@section('content')
    <!--============================== register-area-start ================================-->
    <section class="signup">
        <div class="container container-login">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Sign up</h2>
                    <form method="POST" action="{{ route('register') }}" class="register-form" id="register-form">
                        <!-- implement csrf_token -->
                        @csrf
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="name" placeholder="Your Name"
                             class="@error('name') is-invalid @enderror"  id="name"
                             value="{{ old('name') }}" autocomplete="name" autofocus required>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email"  placeholder="Your E-mail Address"
                             class="@error('email') is-invalid @enderror" id="your_email"
                             value="{{ old('email') }}" autocomplete="email" required>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="mobile_no"><i class="zmdi zmdi-phone"></i></label>
                            <input type="number" name="mobile_no" placeholder="Your Mobile Number"
                             class="@error('mobile_no') is-invalid @enderror" id="mobile_no"
                             value="{{ old('mobile_no') }}" required autocomplete="mobile_no">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="zmdi zmdi-lock"></i></label>
                            <input  type="password"  class="@error('password') is-invalid @enderror"
                             name="password" id="password" minlength="8"
                             placeholder="Your Password" autocomplete="new-password" required>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="password_confirmation" id="confirm-password"
                                                placeholder="Repeat Your Password" minlength="8" required/>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure>
                        <img src="{{ asset('assets/frontend/images/signup-image.jpg') }}" alt="sing up image">
                    </figure>
                    <a href="{{ route('login') }}" class="signup-image-link">I am already member</a>
                </div>
            </div>
        </div>
    </section>
@endsection

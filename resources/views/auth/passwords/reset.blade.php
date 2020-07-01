@extends('layouts.frontend.app')

@section('title', 'Reset Password')

@section('content')
<div class="container">
    <section class="contact-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="contact-content-border">
                        <div class="contact-content">
                            <h4>Reset Password</h4>
                            <form method="POST" action="{{ route('password.update') }}" class="text-center">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-group">
                                    <label class="float-left"><strong>Email Address</strong></label>
                                    <input class="pull-right" type="email" name="email"  placeholder="Enter Your Email"
                                           autocomplete="email" value="{{ $email ?? old('email') }}"  autofocus required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="float-left"><strong>New Password</strong></label>
                                    <input type="password" name="password" autofocus class="pull-right"
                                           placeholder="Enter New Password" autocomplete="new-password"  required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="float-left"><strong>Confirm Password</strong></label>
                                    <input class="pull-right" type="password"
                                           placeholder="Enter Confirm Password" name="password_confirmation"
                                           id="password-confirm" required autocomplete="new-password">
                                </div>
                                <br>
                                <div class="submit-btn">
                                    <input type="submit" name="submit" value="Reset Password">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

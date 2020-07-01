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
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <label class="float-left"><strong>Email Address</strong></label>
                                    <input type="email" name="email" autofocus placeholder="Enter Your Email"
                                           autocomplete="email" value="{{ old('email') }}"  required>
                                    <br><br>
                                    <div class="submit-btn">
                                        <input type="submit" name="submit" value="Send Password Reset Link">
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

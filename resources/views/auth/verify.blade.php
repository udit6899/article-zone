@extends('layouts.frontend.app')

@section('title', 'Verify Email')

@section('content')
    <div class="container">
        <section class="contact-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <div class="contact-content-border">
                            <div class="contact-content">
                                <h4>Verify Your Email Address</h4>
                                @if (session('resent'))
                                    <p>Before proceeding, please verify your account.</p>
                                    <div class="alert alert-success" role="alert">
                                        {{ __('A fresh verification link has been sent to your email address.') }}
                                    </div>
                                @else
                                    <p class="text-danger">  Your account is not verified !</p>
                                    <p>Before proceeding, please check your email for a verification link.</p>
                                @endif
                                <br><br>
                                {{ __('If you did not receive the email') }}
                                <form method="POST" action="{{ route('verification.resend') }}" class="text-center">
                                    @csrf
                                    <div class="submit-btn">
                                        <input type="submit" name="submit" value="Click here to resend">
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

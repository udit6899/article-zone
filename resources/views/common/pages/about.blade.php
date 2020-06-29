
<!--========================== extend-master-blade ==========================-->
@extends('layouts.frontend.app')

@section('title', 'About me')

<!--========================== include content ==========================-->
@section('content')
    <!--============================== about-area-start ================================-->
    <section class="about-area">
        <div class="container">
            <div class="row">
                <div class="about-information-area-border">
                    <div class="about-information-area-content">
                        <div class="col-md-3 col-sm-4 col-xs-12">
                            <div class="about-self-content">
                                <div class="personal-information">
                                    <div class="about-content">
                                        <a>
                                            <img src="{{ $admin->imageUrl }}"
                                                alt="admin-user-logo">
                                        </a>
                                    </div>
                                    <div class="about-indetails">
                                        <ul>
                                            <li>Name: <span>{{ $admin->name }}</span></li>
                                            <li>Birth Date: <span>6th August</span></li>
                                            <li>Gender: <span>Male</span></li>
                                            <li>Lives In: <span>India</span></li>
                                            <li>Mobile: <span>{{ $admin->mobile_no }}</span></li>
                                            <li>E-mail: <span>{{ $admin->email }}</span></li>
                                            <li>Website: <span>{{ url('/') }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="follow-me-section my-information">
                                <div class="follow-me-title"><h4>follow me on</h4></div>
                                <div class="follow-me-social-link">
                                    <a href=""><i class="fa fa-facebook"></i></a>
                                    <a href=""><i class="fa fa-twitter"></i></a>
                                    <a href=""><i class="fa fa-pinterest"></i></a>
                                    <a href=""><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-8">
                            <div class="about-personal-information-text-content">
                                <h4><a href="{{ route('about') }}">Hello, I’m {{ $admin->name }} !</a></h4>
                                <p>
                                    I started the website to provide the people to read blogs and current affairs.
                                    We are glad that you are here and thank you for supporting us.
                                    We stand out from the crowd in the sense that usually we break news stories – yes,
                                    we mainly bring you stuff that you’ll not find anywhere in the mainstream media.
                                    Its a free blogging site which allow authors to maintain their account easily.
                                    It provides various awesome features like article create, edit, delete
                                    and add favourite article etc. Most of our authors gives good feedback
                                    and they tells, "They like it".
                                </p>
                                <p>"{{ $admin->about }}”</p>
                                <p>
                                    It is started in 2020, has been a popular blogging website.
                                    We stand with you to encourage and appreciate to start your journey to become a
                                    good writer. We dreams to be the worlds no. 1 blogging site. We maintain your
                                    article to be secure, provide a platform to reach out your thoughts to the people.
                                    "We are here to help you and we are happy to see here".
                                </p>
                                <p>Thank You.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

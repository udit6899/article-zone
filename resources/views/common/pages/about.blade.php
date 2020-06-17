
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
                                        <a><img src="{{ asset('assets/frontend/images/fahi.png') }}" alt=""></a>
                                    </div>
                                    <div class="about-indetails">
                                        <ul>
                                            <li>Name: <span>Fahima Zerin</span></li>
                                            <li>Birth Date: <span>1st January</span></li>
                                            <li>Gender: <span>Female</span></li>
                                            <li>Lives In: <span>Bangladesh</span></li>
                                            <li>Mobile: <span>0122-356-48</span></li>
                                            <li>E-mail: <span>Speekloud@email.com</span></li>
                                            <li>Website: <span>www.abcd.com</span></li>
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
                                <h4><a href="{{ route('about') }}">Hello, I’m Fahima!</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum do retpariatur. Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 4up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the.</p>
                                <p>"de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.”</p>
                                <p>"de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32. </p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum do retpariatur. Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 4up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

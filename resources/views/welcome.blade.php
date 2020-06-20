
<!--========================== extend-master-blade ==========================-->
@extends('layouts.frontend.app')

@section('title', 'Article Zone')

<!--========================== include content ==========================-->
@section('content')
    <!--============================== slider-area-start ================================-->
    <section class="slider-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <div class="slider-content" id="slider-item-1">
                                    <div class="col-md-5 col-md-offset-6 col-sm-8 col-sm-offset-2 col-xs-12">
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="slider-content" id="slider-item-2">
                                    <div class="col-md-5 col-md-offset-6 col-sm-8 col-sm-offset-2 col-xs-12">
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="slider-content" id="slider-item-3">
                                    <div class="col-md-5 col-md-offset-6 col-sm-8 col-sm-offset-2 col-xs-12">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Controls -->
                        <a class="left slide-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <a class="right slide-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <i class="fa fa-angle-left"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--========================== about-area-start ==========================-->
    <section class="about-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="about-area-all-content">
                        <div class="about-area-content">
                            <div class="about-photo-content">
                                <a>
                                    <img alt="admin-avatar" src="{{ $admin->imageUrl }}">
                                </a>
                            </div>
                            <br>
                            <div class="about-text-content">
                                    <h4><a href="{{ route('about') }}">{{ "Hello, I’m $admin->name !" }}</a></h4>
                                <p>{{ $admin->about }}</p>
                                <div class="social-link-about">
                                    <a href=""><i class="fa fa-facebook"></i></a>
                                    <a href=""><i class="fa fa-twitter"></i></a>
                                    <a href=""><i class="fa fa-pinterest"></i></a>
                                    <a href=""><i class="fa fa-instagram"></i></a>
                                    <a href=""><i class="fa fa-google-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--========================== categories-area-start ==========================-->
    <section class="categories-area">
        @include('common.base.pages.post-list', ['posts' => $posts])
    </section>
@endsection

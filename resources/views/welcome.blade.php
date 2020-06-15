
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
                                <div class="slider-content">
                                    <div class="col-md-5 col-md-offset-6 col-sm-8 col-sm-offset-2 col-xs-12">
                                        <div class="slide-text-border-content">
                                            <div class="slide-text">
                                                <h2>Welcome To My Blog!</h2>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidi dunt ut labore et dolore magna aliqua  ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidi dunt ut labore et dolore magna aliqua</p>
                                                <a href="category.html">read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="slider-content-2">
                                    <div class="col-md-5 col-md-offset-6 col-sm-8 col-sm-offset-2 col-xs-12">
                                        <div class="slide-text-border-content">
                                            <div class="slide-text">
                                                <h2>Welcome To My Blog!</h2>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidi dunt ut labore et dolore magna aliqua  ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidi dunt ut labore et dolore magna aliqua</p>
                                                <a href="single-posts.html">read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Controls -->
                        <a class="left slide-control" href="#carousel-example-generic" role="button" data-slide="prev"><i class="fa fa-angle-right"></i>
                        </a>
                        <a class="right slide-control" href="#carousel-example-generic" role="button" data-slide="next"><i class="fa fa-angle-left"></i>
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
                                <a><img src="{{ asset('assets/frontend/images/fahi.png') }}" alt=""></a>
                            </div>
                            <div class="about-text-content">
                                    <h4><a href="{{ route('about') }}">Hello, I’m Fahima!</a></h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                    reprehenderit in voluptate velit esse cillum do retpariatur.
                                </p>
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
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @foreach($posts as $post)
                        <div class="video-area-border-content section-padding">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="video-area-content-detail">
                                        <div class="category-img">
                                            <img src="{{ Storage::disk('public')->url('posts/' . $post->image) }}"
                                                 alt="{{ $post->title }}">
                                            <div class="category-overlay">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 fix col-sm-6">
                                    <div class="video-content-text">
                                        <a href="" class="art">{{ $post->user->name }}</a>
                                        <h4>
                                            <a href="{{ route('post.details', $post->slug) }}">{{ Str::limit($post->title, 50, '') }}</a>
                                        </h4>
                                        <span class="art">{{ $post->created_at->toFormattedDateString() }}</span>
                                        <p>{{ Str::limit($post->quote, 100) }}</p>
                                        <div class="category-link">
                                            <a href="{{ route('post.details', $post->slug) }}">read more</a>
                                        </div>
                                        <div class="share-comment-section">
                                            <div class="comment">
                                                <i class="fa fa-heart-o"><span>25</span></i>
                                                <i class="fa fa-comment-o">
                                                    <span>{{ $post->approved_comments->count() }}</span>
                                                </i>
                                                <i class="fa fa-eye"><span>{{ $post->view_count }}</span></i>
                                            </div>
                                            <div class="share">
                                                <span>share:</span>
                                                <a href=""><i class="fa fa-facebook"></i></a>
                                                <a href=""><i class="fa fa-twitter"></i></a>
                                                <a href=""><i class="fa fa-pinterest"></i></a>
                                                <a href=""><i class="fa fa-instagram"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- include sidebar -->
                @include('layouts.frontend.partial.sidebar')
            </div>
        </div>
    </section>
@endsection

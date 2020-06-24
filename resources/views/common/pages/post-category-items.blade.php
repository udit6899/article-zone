
<!--========================== extend-master-blade ==========================-->
@extends('layouts.frontend.app')

@section('title')
    {{ "$category->name-Items" }}
@endsection

<!--========================== include content ==========================-->
@section('content')
    <!--============================== slider-area-start ================================-->
    <section class="slider-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <div class="slider-content-2 text-center"
                                    style="background: url({{ Storage::disk('public')
                                    ->url("categories/slider/$category->image") }}) no-repeat scroll center center;">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h1 class="display-flex">{{ $category->name }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                <a><img alt="author-profile-image"
                                        src="{{ asset('assets/frontend/images/category-logo.png') }}">
                                </a>
                            </div>
                            <div class="about-text-content">
                                <h4>
                                    <a href="{{ $category->postsLink }}">{{ $category->name }}</a>
                                </h4>
                                <p>{{ $category->description }}</p>
                                <div>
                                    <span>
                                        <strong>Total Posts:</strong> {{ $categoryPosts->total() }}
                                    </span>
                                    <span class="pull-right">
                                          <div class="share">
                                            <span>share:</span>
                                            <a href=""><i class="fa fa-facebook"></i></a>
                                            <a href=""><i class="fa fa-twitter"></i></a>
                                            <a href=""><i class="fa fa-pinterest"></i></a>
                                            <a href=""><i class="fa fa-instagram"></i></a>
                                        </div>
                                    </span>
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
        @include('common.base.pages.post-list', ['posts' => $categoryPosts])
    </section>
@endsection

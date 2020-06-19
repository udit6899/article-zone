
<!--========================== extend-master-blade ==========================-->
@extends('layouts.frontend.app')

@section('title', 'Author Profile')

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
                                <div class="slider-content-2 text-center">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h1 class="display-flex">{{ $author->name }}</h1>
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
                                <a><img src="{{ Storage::disk('public')->url("users/$author->avatar_path") }}"
                                    alt="author-profile-image">
                                </a>
                            </div>
                            <div class="about-text-content">
                                <h4>
                                    <a href="{{ route('post.author.profile', $author->id) }}">
                                        Hello, I’m {{ $author->name }}!
                                    </a>
                                </h4>
                                <p>{{ $author->about }}</p>
                                <div>
                                    <span>
                                        <strong>Total Posts:</strong> {{ $authorPosts->total() }}
                                    </span>
                                    <span class="pull-right">
                                        <strong>Author Since:</strong>
                                        {{ $author->created_at->toFormattedDateString() }}
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
        @include('common.base.pages.post-list', ['posts' => $authorPosts])
    </section>
@endsection

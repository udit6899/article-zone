
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
                                <a><img src="{{ Storage::disk('public')->url('users/' . $author->avatar_path) }}"
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
                                        <strong>Total Posts:</strong> {{ $authorPosts->count() }}
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
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @forelse($authorPosts as $post)
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
                                        <a href="{{ route('post.author.profile', $author->id) }}" class="art">
                                            {{ $post->user->name }}
                                        </a>
                                        <h4>
                                            <a href="{{ route('post.details', $post->slug) }}">
                                                {{ Str::limit($post->title, 50, '') }}
                                            </a>
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
                    @empty
                        <div class="video-area-border-content section-padding">
                            <div class="category-border-content clearfix bg-warning text-danger">
                                <div class="single-user-comment">
                                    <p><strong>No Posts Found !</strong></p>
                                </div>
                            </div>
                            <div class="recent-post-content clearfix text-center">
                                <h4>You May Also Like</h4>
                                @foreach($randomPosts as $randomPost)
                                        <div class="recent-post-single single-page">
                                            <div class="recent-post-img single-page">
                                                <a href="{{ route('post.details', $randomPost->slug) }}">
                                                    <img src="{{ Storage::disk('public')
                                                        ->url('posts/' . $randomPost->image) }}"  height="54px"
                                                         alt="{{ $randomPost->title }}" width="54px">
                                                </a>
                                            </div>
                                            <div class="recent-post-text single-page">
                                                <span>{{ $randomPost->created_at->toFormattedDateString() }}</span>
                                                <a href="{{ route('post.details', $randomPost->slug) }}">
                                                    <p>{{ Str::limit($randomPost->title, 15) }}</p>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                            </div>
                        </div>
                    @endforelse
                </div>
                <!-- include sidebar -->
                @include('layouts.frontend.partial.sidebar')
            </div>
        </div>
    </section>
@endsection

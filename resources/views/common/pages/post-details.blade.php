<!--========================== extend-master-blade ==========================-->
@extends('layouts.frontend.app')

@section('title', $post->title)


<!--========================== include content ==========================-->
@section('content')
    <!--============================== page-area-start ================================-->
    <section class="single-page-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="category-border-content">
                        <div class="category-detail category">
                            <div class="category-img">
                                <img src="{{ $post->imageUrl }}" alt="{{ $post->title }}">
                                <div class="category-overlay">
                                </div>
                            </div>
                            <div class="category-text read-more clearfix">
                                <a href="{{ $post->user->postsLink }}" class="art">
                                    <strong>{{ $post->user->name }}</strong>
                                </a>
                                <h4><a href="{{ $post->viewLink }}">{{ $post->title }}</a></h4>
                                <span class="art">{{ $post->created_at->toFormattedDateString() }}</span>
                                <div class="quote">
                                    <p>
                                        <i class="fa fa-quote-left"></i>
                                            {{ $post->quote }}
                                        <i class="fa fa-quote-right"></i>
                                    </p>
                                </div>
                                <p>{!! $post->body !!}</p>
                                <div class="read-more-more clearfix">
                                    <div class="tag floatleft">
                                        <span>Tags</span>
                                        @foreach($post->tags as $tag)
                                            <a href="{{ $tag->postsLink }}">
                                                {{ $tag->name }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="read-more-more clearfix">
                                    <div class="post-category floatleft">
                                        <span>Categories</span>
                                        @foreach($post->categories as $category)
                                            <a href="{{ $category->postsLink }}">
                                                {{ $category->name }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="share-comment-section ">
                                    <div class="share single-page">
                                        <span>share:</span>
                                        <a href=""><i class="fa fa-facebook"></i></a>
                                        <a href=""><i class="fa fa-twitter"></i></a>
                                        <a href=""><i class="fa fa-pinterest"></i></a>
                                        <a href=""><i class="fa fa-instagram"></i></a>
                                    </div>
                                </div>

                                <!-- Include random-posts list -->

                                @include('common.base.pages.random-post')
                                
                                <!-- End random post -->

                                <div class="user-comments">
                                    <p>
                                        <i class="fa fa-comments-o"></i>
                                        <span>comments {{ '(' . $post->approved_comments->count() . ')' }}</span>
                                    </p>
                                    @forelse($post->approved_comments as $comment)
                                        <div class="single-user-comment clearfix">
                                            <div class="single-user-img">
                                                <a>
                                                    <img src="{{ $comment->user->imageUrl }}"
                                                         alt="user-image" height="54px" width="54px">
                                                </a>
                                            </div>
                                            <div class="single-user-comment-text">
                                                <h4>
                                                    <a>{{ $comment->user->name }}</a>
                                                    <span>{{ $comment->created_at->diffForHumans() }}</span>
                                                </h4>
                                                <p>{{ $comment->comment }}</p>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="single-user-comment clearfix">
                                            <p>No comments Yet ! Be the first one.</p>
                                        </div>
                                    @endforelse
                                </div>
                                <div class="reply-section">
                                    <h4>Leave a Comment</h4>
                                    <form action="{{ route('post.comment.store') }}" method="post">
                                        @csrf
                                        @guest
                                            <div class="form-group">
                                                <input type="text" name="name" placeholder="Name"
                                                       value="{{ old('name') }}" required>
                                                <input type="email" name="email" placeholder="Email"
                                                       value="{{ old('email') }}" required>
                                            </div>
                                        @endguest
                                        <div class="form-group">
                                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="comment" placeholder="Write somethings..."
                                            >{{ old('comment') }}</textarea>
                                        </div>
                                        <input type="submit" value="submit">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- include sidebar -->
                @include('layouts.frontend.partial.sidebar')
            </div>
        </div>
    </section>
@endsection


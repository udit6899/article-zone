<!--========================== extend-master-blade ==========================-->
@extends('layouts.frontend.app')

@section('title', $post->title)

<!--====== author's details content ======-->
@section('author-details')
    <div class="sidebar-widget">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="popular-post-border-content">
                    <div class="popular-post-content text-center" id="author-details">
                        <div class="popular-post-title">
                            <h4>Author's Details</h4>
                        </div>
                        <div class="author-image">
                            <img src="{{ $post->user->imageUrl }}" alt="post-author-image">
                        </div>
                        <div class="author-name">
                            <a href="{{ $post->user->postsLink }}">
                                {{ $post->user->name }}
                            </a>
                        </div>
                        <div class="sub">
                            <small>
                                <strong>Total Posts:</strong>
                                {{ $post->user->posts()->published()->count() }} |
                                <strong>Since: </strong>
                                {{ $post->user->created_at->toFormattedDateString() }}
                            </small>
                        </div>
                        <div class="author-profile-link">
                            @include('common.base.pages.share', ['data' => $post->user])
                        </div>
                        <div class="author-about">
                           <p>{{ Str::limit($post->user->about, '100') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

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
                                <img alt="{{ $post->title }}"
                                     src="{{ Storage::disk('public')->url("posts/slider/$post->image") }}">
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
                                                <i class="fa fa-tag"></i> {{ $tag->name }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="read-more-more clearfix">
                                    <div class="post-category floatleft">
                                        <span>Categories</span>
                                        @foreach($post->categories as $category)
                                            <a href="{{ $category->postsLink }}">
                                                <i class="fa fa-cube"></i> {{ $category->name }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="share-comment-section ">
                                    <div class="share single-page">
                                        <span>share:</span>
                                        @include('common.base.pages.share', ['data' => $post])
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


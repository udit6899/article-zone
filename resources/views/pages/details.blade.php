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
                                <img src="{{ Storage::disk('public')->url('posts/slider/' . $post->image) }}"
                                     alt="{{ $post->title }}">
                                <div class="category-overlay">
                                </div>
                            </div>
                            <div class="category-text read-more clearfix">
                                <a href="" class="art"><strong>{{ $post->user->name }}</strong></a>
                                <h4><a href="{{ route('post.details', $post->slug) }}">{{ $post->title }}</a></h4>
                                <span class="art">{{ $post->created_at->toFormattedDateString() }}</span>
                                <div class="quote"><p><i class="fa fa-quote-left"></i>{{ $post->quote }}<i class="fa fa-quote-right"></i></p></div>
                                <p>{!! $post->body !!}</p>
                                <div class="read-more-more clearfix">
                                    <div class="share-comment-section floatright">
                                        <div class="share single-page">
                                            <span>share:</span>
                                            <a href=""><i class="fa fa-facebook"></i></a>
                                            <a href=""><i class="fa fa-twitter"></i></a>
                                            <a href=""><i class="fa fa-pinterest"></i></a>
                                            <a href=""><i class="fa fa-instagram"></i></a>
                                        </div>
                                    </div>
                                    <div class="tag floatleft">
                                        <span>Tags</span>
                                        @foreach($post->tags as $tag)
                                            <a href="">{{ $tag->name }}</a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="recent-post-content clearfix">
                                    <h4>You May Also Like</h4>
                                    @foreach($recentPosts as $recentPost)
                                        <div class="recent-post-single single-page">
                                            <div class="recent-post-img single-page">
                                                <a href="{{ route('post.details', $recentPost->slug) }}">
                                                    <img src="{{ Storage::disk('public')
                                                        ->url('posts/' . $recentPost->image) }}"  height="54px"
                                                         alt="{{ $recentPost->title }}" width="54px">
                                                </a>
                                            </div>
                                            <div class="recent-post-text single-page">
                                                <span>{{ $recentPost->created_at->toFormattedDateString() }}</span>
                                                <a href="{{ route('post.details', $recentPost->slug) }}">
                                                    <p>{{ Str::limit($recentPost->title, 15) }}</p>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="user-comments">
                                    <p><i class="fa fa-comments-o"></i><span>comments</span></p>
                                    <div class="single-user-comment clearfix">
                                        <div class="single-user-img">
                                            <a><img src="{{ asset('assets/frontend/images/single-user-1.jpg') }}" alt=""></a>
                                        </div>
                                        <div class="single-user-comment-text">
                                            <h4><a>Jolie Anne Curtiz</a><span>01 jan, 2016</span></h4>
                                            <p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat.</p>
                                        </div>
                                    </div>
                                    <div class="single-user-comment clearfix">
                                        <div class="single-user-img">
                                            <a><img src="{{ asset('assets/frontend/images/single-user-2.jpg') }}" alt=""></a>
                                        </div>
                                        <div class="single-user-comment-text">
                                            <h4><a>Robert Smith</a><span>01 jan, 2016</span></h4>
                                            <p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat.</p>
                                        </div>
                                    </div>
                                    <div class="single-user-comment clearfix">
                                        <div class="single-user-img">
                                            <a><img src="{{ asset('assets/frontend/images/single-user-3.jpg') }}" alt=""></a>
                                        </div>
                                        <div class="single-user-comment-text">
                                            <h4><a>Sara Jordan</a><span>01 jan, 2016</span></h4>
                                            <p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat.</p>
                                        </div>
                                    </div>
                                    <div class="single-user-comment clearfix">
                                        <div class="single-user-img">
                                            <a><img src="{{ asset('assets/frontend/images/single-user-4.jpg') }}" alt=""></a>
                                        </div>
                                        <div class="single-user-comment-text">
                                            <h4><a>Paul Pablo</a><span>01 jan, 2016</span></h4>
                                            <p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="reply-section">
                                    <h4>Leave a Reply</h4>
                                    <form action="#" method="post">
                                        <input type="text" placeholder="Name">
                                        <input type="email" placeholder="Email">
                                        <div class="web-address"><input type="text" class="web-address" placeholder="Website"></div>
                                        <textarea placeholder="Comment"></textarea>
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


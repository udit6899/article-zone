<!-- Base post-list area -->
<div class="container">
        <div class="row">
            <div class="col-md-8">
                @forelse($posts as $post)
                    <div class="video-area-border-content section-padding">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="video-area-content-detail">
                                    <div class="category-img">
                                        <img src="{{ Storage::disk('public')->url("posts/$post->image") }}"
                                             alt="{{ $post->title }}">
                                        <div class="category-overlay">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 fix col-sm-6">
                                <div class="video-content-text">
                                    <a href="{{ route('post.author.profile', $post->user->id) }}"
                                       class="art">{{ $post->user->name }}</a>
                                    <h4>
                                        <a href="{{ route('post.details', $post->slug) }}">
                                            {{ Str::limit($post->title, 50, '') }}
                                        </a>
                                    </h4>
                                    <span class="art">{{ $post->created_date }}</span>
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
                        @if(!Request::is('/'))
                            <div class="recent-post-content clearfix text-center">
                                <h4>You May Also Like</h4>
                                @foreach($randomPosts as $randomPost)
                                    <div class="recent-post-single single-page">
                                        <div class="recent-post-img single-page">
                                            <a href="{{ route('post.details', $randomPost->slug) }}">
                                                <img src="{{ Storage::disk('public')
                                                    ->url("posts/$randomPost->image") }}"  height="54px"
                                                     alt="{{ $randomPost->title }}" width="54px">
                                            </a>
                                        </div>
                                        <div class="recent-post-text single-page">
                                            <span>{{ $randomPost->created_date }}</span>
                                            <a href="{{ route('post.details', $randomPost->slug) }}">
                                                <p style="color: #0D0A0A;">
                                                    {{ Str::limit($randomPost->title, 15) }}
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforelse
                <!-- Add pagination -->
                <div class="text-center">
                    {{ $posts->onEachSide(3)->links('vendor.pagination.default') }}
                </div>
            </div>
            <!-- include sidebar -->
            @include('layouts.frontend.partial.sidebar')
        </div>
    </div>

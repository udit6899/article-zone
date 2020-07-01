<!-- Base post-list area -->
<div class="container" xmlns="http://www.w3.org/1999/html">
    <div class="row">
        <div class="col-md-8">
            @forelse($posts as $post)
                <div class="video-area-border-content section-padding">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="video-area-content-detail">
                                <div class="category-img">
                                    <img src="{{ $post->imageUrl }}" alt="{{ $post->title }}">
                                    <div class="category-overlay">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 fix col-sm-6">
                            <div class="video-content-text">
                                <a href="{{ $post->user->postsLink }}"
                                   class="art">{{ $post->user->name }}</a>
                                <h4>
                                    <a href="{{ $post->viewLink }}">
                                        {{ Str::limit($post->title, 20, '') }}
                                    </a>
                                </h4>
                                <span class="art">{{ $post->created_date }}</span>
                                <p>{{ Str::limit($post->quote, 100) }}</p>
                                <div class="category-link">
                                    <a href="{{ $post->viewLink }}">read more</a>
                                </div>
                                <div class="share-comment-section">
                                    <div class="comment">
                                        @if(Auth::check() && Auth::user()->hasFavouritePost($post->id))
                                            <i id="favourite-icon" title="Added to favourite" class="fa fa-heart">
                                        @else
                                            <i class="fa fa-heart-o" title="Favourites" >
                                        @endif
                                            <span>{{ $post->favouriteToUsers->count() }}</span>
                                        </i>
                                        <i class="fa fa-comment-o" title="Comments">
                                            <span>{{ $post->approved_comments->count() }}</span>
                                        </i>
                                        <i class="fa fa-eye" title="Views"><span>{{ $post->view_count }}</span></i>
                                    </div>
                                    <div class="share">
                                        <span>share:</span>
                                        @include('common.base.pages.share', ['data' => $post])
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
                        @include('common.base.pages.random-post')
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

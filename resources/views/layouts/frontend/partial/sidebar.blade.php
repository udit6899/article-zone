<div class="col-md-4">
    <div class="sidebar-widget">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="widget-list">
                    <div class="category-widget-single">
                        <div class="category-widget-single-detail">
                            <div class="category-title">
                                <h4>Categories</h4>
                            </div>
                            <div class="category-list">
                                <ul class="left-portion">
                                    @foreach($categories as $category)
                                        @if($loop->odd && $loop->index < 10 && substr_count($category->name, ' ') < 1)
                                            <li><a href="{{ route('post.category') }}">
                                                    {{ $category->name. ' (' . $category->posts->count() . ')'}}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                                <ul class="right-portion">
                                    @foreach($categories as $category)
                                        @if($loop->even && $loop->index < 7 && substr_count($category->name, ' ') < 1)
                                            <li><a href="{{ route('post.category') }}">
                                                    {{ $category->name. ' (' . $category->posts->count() . ')'}}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                        <li><a href="{{ route('post.category') }}">More...</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-widget">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="widget-list">
                    <div class="category-widget-single">
                        <div class="category-widget-single-detail">
                            <div class="category-title">
                                <h4>Tags</h4>
                            </div>
                            <div class="category-list">
                                <ul class="left-portion">
                                    @foreach($tags as $tag)
                                        @if($loop->odd)
                                            <li><a href="{{ route('post.category') }}">
                                                    {{ $tag->name. ' (' . $tag->posts->count() . ')'}}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                                <ul class="right-portion">
                                    @foreach($tags as $tag)
                                        @if($loop->even)
                                            <li><a href="{{ route('post.category') }}">
                                                    {{ $tag->name. ' (' . $tag->posts->count() . ')'}}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-widget">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="widget-ad">
                    <div class="category-widget-single">
                        <div class="category-widget-single-ad">
                            <a href="">
                                <img src="{{ asset('assets/frontend/images/category-widget-ad.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-widget">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="instagram-widget">
                    <div class="instagram-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="instagram-title"><h4>Instagram</h4></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div id="instafeed"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-widget">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="follow-widget">
                    <div class="follow-me-section">
                        <div class="follow-me-title"><h4>follow me on</h4></div>
                        <div class="follow-me-social-link">
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
    <div class="sidebar-widget">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="popular-post-border-content">
                    <div class="popular-post-content">
                        <div class="popular-post-title">
                            <h4>Popular posts</h4>
                        </div>
                        @foreach($popularPosts as $popularPost)
                            <div class="popular-post-single @if($loop->first) top @elseif($loop->last) bottom @endif">
                                <div class="popular-post-single-img">
                                    <a href="{{ route('post.details', $popularPost->slug) }}">
                                        <img src="{{ Storage::disk('public')->url('posts/' . $popularPost->image) }}"
                                             alt="{{ $popularPost->title }}" width="89px" height="100px">
                                    </a>
                                </div>
                                <div class="popular-post-single-text">
                                    <span>{{ $popularPost->created_at->toFormattedDateString() }}</span>
                                    <p>{{ Str::limit($popularPost->title, 18, '') }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

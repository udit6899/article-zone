<div class="col-md-4">

    @hasSection('author-details')
        @yield('author-details')
        <br><br>
    @endif

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
                                        @if($loop->odd)
                                            <li>
                                                <a href="{{ $category->postsLink }}">
                                                    <i class="fa fa-cube"></i>
                                                    {{ $category->name .
                                                        ' (' . $category->posts()->published()->count() . ')'}}
                                                </a>
                                            </li>
                                        @endif
                                        @break($loop->index > 7)
                                    @endforeach
                                </ul>
                                <ul class="right-portion">
                                    @foreach($categories as $category)
                                        @if($loop->even)
                                            <li>
                                                <a href="{{ $category->postsLink }}">
                                                    <i class="fa fa-cube"></i>
                                                    {{ $category->name .
                                                        ' (' . $category->posts()->published()->count() . ')' }}
                                                </a>
                                            </li>
                                        @elseif ($loop->index > 7)
                                            <li>
                                                <a href="{{ route('post.category') }}">
                                                    <i class="fa fa-reorder"></i>More...
                                                </a>
                                            </li>
                                            @break
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            @if($categories->count() < 1)
                                <div class="text-center">
                                    <p class="text-danger">No categories found !</p><br>
                                </div>
                            @endif
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
                                            <li>
                                                <a href="{{ $tag->postsLink }}">
                                                    <i class="fa fa-tag"></i>
                                                    {{ "$tag->name" .
                                                            ' (' . $tag->posts()->published()->count() . ')' }}
                                                </a>
                                            </li>
                                        @endif
                                        @break($loop->index > 7)
                                    @endforeach
                                </ul>
                                <ul class="right-portion">
                                    @foreach($tags as $tag)
                                        @if($loop->even)
                                            <li>
                                                <a href="{{ $tag->postsLink }}">
                                                    <i class="fa fa-tag"></i>
                                                    {{ "$tag->name" .
                                                            ' (' . $tag->posts()->published()->count() . ')' }}
                                                </a>
                                            </li>
                                        @elseif($loop->index > 7)
                                            <li>
                                                <a href="{{ route('post.tag') }}">
                                                    <i class="fa fa-reorder"></i> More...
                                                </a>
                                            </li>
                                            @break
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            @if($tags->count() < 1)
                                <div class="text-center">
                                    <p class="text-danger">No tags found !</p><br>
                                </div>
                            @endif
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
                                <img src="{{ asset('assets/frontend/images/slider-action.gif') }}" alt="blog-action">
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
                        @forelse($popularPosts as $popularPost)
                            <div class="popular-post-single top">
                                <div class="popular-post-single-img">
                                    <a href="{{ $popularPost->viewLink }}">
                                        <img src="{{ $popularPost->imageUrl }}"
                                             alt="{{ $popularPost->title }}" width="89px" height="100px">
                                    </a>
                                </div>
                                <div class="popular-post-single-text">
                                    <span>{{ $popularPost->created_date }}</span>
                                    <p>
                                        <a href="{{ $popularPost->viewLink }}">
                                            {{ Str::limit($popularPost->title, 18) }}
                                        </a>
                                    </p>
                                </div>
                            </div>
                        @empty
                            <div class="text-center">
                                <p class="text-danger">No popular posts found !</p><br>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

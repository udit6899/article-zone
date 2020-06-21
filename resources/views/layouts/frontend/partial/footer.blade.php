<!--========================== footer-top-area-start ==========================-->
<section class="footer-top-area">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-2">
                <div class="footer-logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('assets/frontend/images/logo3.png') }}" alt="ArticleZone-Logo">
                    </a>
                </div>
                <div class="footer-content">
                    <p>get in touch</p>
                    <div class="footer-social-icon">
                        <a href=""><i class="fa fa-facebook"></i></a>
                        <a href=""><i class="fa fa-twitter"></i></a>
                        <a href=""><i class="fa fa-pinterest"></i></a>
                        <a href=""><i class="fa fa-instagram"></i></a>
                        <a href=""><i class="fa fa-google-plus"></i></a>
                        <a href=""><i class="fa fa-rss"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-0">
                <div class="subscription-input">
                    <h4 class="footer-title">subscription</h4>
                    <form action="{{ route('subscriber.store') }}" method="POST">
                        @csrf
                        <input type="email" name="email" placeholder="Email" required>
                        <input type="submit" value="Subscribe">
                    </form>
                </div>
            </div>
            <div class="col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-0">
                <div class="recent-post-content">
                    <h4 class="footer-title">recent post</h4>
                    @forelse($recentPosts as $recentPost)
                        <div class="recent-post-single">
                            <div class="recent-post-img">
                                <a href="{{ $recentPost->viewLink }}">
                                    <img src="{{ $recentPost->imageUrl }}"
                                         alt="{{ $recentPost->title }}" height="54px" width="54px">
                                </a>
                            </div>
                            <div class="recent-post-text">
                                <span>{{ $recentPost->created_date }}</span>
                                <a href="{{ $recentPost->viewLink }}">
                                    <p>{{ Str::limit($recentPost->title, 20) }}</p>
                                </a>
                            </div>
                        </div>
                    @empty
                        <br>
                        <p class="text-danger">No recent posts found !</p>
                    @endforelse
                </div>
            </div>
            <div class="col-md-2 col-sm-2">
                <div class="footer-category">
                    <h4 class="footer-title">category</h4>
                    <ul>
                        @forelse($categories as $category)
                            @if($loop->index < 7 && substr_count($category->name, ' ') < 1)
                                <li><a href="{{ $category->postsLink }}">{{ $category->name }}</a></li>
                            @else
                                <li><a href="{{ route('post.category') }}">More...</a></li>
                                @break
                            @endif
                        @empty
                            <li class="text-danger">No categories found !</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--========================== footer-top-area-start ==========================-->
<section class="footer-bottom-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="footer-bottom-text text-center">
                    <p>Blog Design 2020 &copy;All Rights reserved</p>
                    <p>Designed by <span><a href="/">ArticleZone</a></span></p>
                </div>
            </div>
        </div>
    </div>
</section>

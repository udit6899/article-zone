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
                    <form action="{{ route('post.subscriber.store') }}" method="POST">
                        @csrf
                        <input type="email" name="email" placeholder="Email" required>
                        <input type="submit" value="Subscribe">
                    </form>
                </div>
            </div>
            <div class="col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-0">
                <div class="recent-post-content">
                    <h4 class="footer-title">recent post</h4>
                    @foreach($recentPosts as $recentPost)
                        <div class="recent-post-single">
                            <div class="recent-post-img">
                                <a href="{{ route('post.details', $recentPost->slug) }}">
                                    <img src="{{ Storage::disk('public')->url("posts/$recentPost->image") }}"
                                         alt="{{ $recentPost->title }}" height="54px" width="54px">
                                </a>
                            </div>
                            <div class="recent-post-text">
                                <span>{{ $recentPost->created_date }}</span>
                                <a href="{{ route('post.details', $recentPost->slug) }}">
                                    <p>{{ Str::limit($recentPost->title, 20) }}</p>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-2 col-sm-2">
                <div class="footer-category">
                    <h4 class="footer-title">category</h4>
                    <ul>
                        @foreach($categories as $category)
                            @if($loop->index < 7 && substr_count($category->name, ' ') < 1)
                                <li><a href="">{{ $category->name }}</a></li>
                            @endif
                        @endforeach
                        <li><a href="{{ route('post.category.item', $category->slug) }}">More...</a></li>
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

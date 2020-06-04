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
                                    <li><a href="">Art/Lifestyle (18)</a></li>
                                    <li><a href="">Music (25)</a></li>
                                    <li><a href="">Travel/journey (21)</a></li>
                                    <li><a href="">Food (36)</a></li>
                                </ul>
                                <ul class="right-portion">
                                    <li><a href="">Photography (19)</a></li>
                                    <li><a href="">Video (12)</a></li>
                                    <li><a href="">Movie (19)</a></li>
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
                            <a href=""><img src="{{ asset('assets/frontend/images/category-widget-ad.png') }}" alt=""></a>
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
                        <div class="popular-post-single top">
                            <div class="popular-post-single-img">
                                <a href="{{ route('article.singleArticle', [ 'slug' => $article['slug'] ]) }}">
                                    <img src="{{ asset('assets/frontend/images/popular-1.jpg') }}" alt="">
                                </a>
                            </div>
                            <div class="popular-post-single-text">
                                <span>12 Jan, 2016</span>
                                <p>Yummy chocolate Muffin</p>
                            </div>
                        </div>
                        <div class="popular-post-single">
                            <div class="popular-post-single-img">
                                <a href="{{ route('article.singleArticle', [ 'slug' => $article['slug'] ]) }}">
                                    <img src="{{ asset('assets/frontend/images/popular-2.jpg') }}" alt="">
                                </a>
                            </div>
                            <div class="popular-post-single-text">
                                <span>12 Jan, 2016</span>
                                <p>Music concert</p>
                            </div>
                        </div>
                        <div class="popular-post-single bottom">
                            <div class="popular-post-single-img">
                                <a href="{{ route('article.singleArticle', [ 'slug' => $article['slug'] ]) }}">
                                    <img src="{{ asset('assets/frontend/images/popular-3.jpg') }}" alt="">
                                </a>
                            </div>
                            <div class="popular-post-single-text">
                                <span>12 Jan, 2016</span>
                                <p>new year celebration</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

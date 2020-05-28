<!--========================== footer-top-area-start ==========================-->
<section class="footer-top-area">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-2">
                <div class="footer-logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt=""></a>
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
                    <form action="#">
                        <input type="email" placeholder="Email">
                        <input type="submit" value="Subscribe">
                    </form>
                </div>
            </div>
            <div class="col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-0">
                <div class="recent-post-content">
                    <h4 class="footer-title">recent post</h4>
                    <div class="recent-post-single">
                        <div class="recent-post-img">
                            <a href="{{ route('article.singleArticle', [ 'title' => $title ]) }}">
                                <img src="{{ asset('images/recent-1.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="recent-post-text">
                            <span>01 jan, 2016</span>
                            <a href="{{ route('article.singleArticle', [ 'title' => $title ]) }}">
                                <p>celebration of new year</p>
                            </a>
                        </div>
                    </div>
                    <div class="recent-post-single">
                        <div class="recent-post-img">
                            <a href="{{ route('article.singleArticle', [ 'title' => $title ]) }}">
                                <img src="{{ asset('images/recent-2.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="recent-post-text">
                            <span>01 jan, 2016</span>
                            <a href="{{ route('article.singleArticle', [ 'title' => $title ]) }}">
                                <p>color in nature</p>
                            </a>
                        </div>
                    </div>
                    <div class="recent-post-single">
                        <div class="recent-post-img">
                            <a href="{{ route('article.singleArticle', [ 'title' => $title ]) }}">
                                <img src="{{ asset('images/recent-3.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="recent-post-text">
                            <span>01 jan, 2016</span>
                            <a href="{{ route('article.singleArticle', [ 'title' => $title ]) }}">
                                <p>yummy burgers</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-2">
                <div class="footer-category">
                    <h4 class="footer-title">category</h4>
                    <ul>
                        <li><a href="">Art/lifestyle</a></li>
                        <li><a href="">Music</a></li>
                        <li><a href="">Travel/journey</a></li>
                        <li><a href="">Food</a></li>
                        <li><a href="">Photography</a></li>
                        <li><a href="">video</a></li>
                        <li><a href="">Movie</a></li>
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
                    <p>Blog Design 2016 &copy;All Rights reserved</p>
                    <p>Designed by <span><a href="#">BootstrapCafe</a></span></p>
                </div>
            </div>
        </div>
    </div>
</section>

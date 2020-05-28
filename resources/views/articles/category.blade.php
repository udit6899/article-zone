
<!--========================== extend-master-blade ==========================-->
@extends('layout.master')

<!--========================== include content ==========================-->
@section('content')
    <!--============================== slider-area-start ================================-->
    <section class="slider-area category-page-single">
        <div class="table category-page-single">
            <div class="table-cell category-page-single">
                <h2>Category-Items</h2>
            </div>
        </div>
    </section>
    <!--============================== categories-area-start ================================-->
    <section class="categories-area category-page-single">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="category-border-content">
                        <div class="category-detail">
                            <div class="category-img">
                                <img src="{{ asset('images/category-img-1.jpg') }}" alt="">
                                <div class="category-overlay">
                                </div>
                            </div>
                            <div class="category-text">
                                <a href="" class="art">Art / lifestyle</a>
                                <h4><a href="{{ route('article.singleArticle', [ 'title' => $title ]) }}">Todays Celebration</a></h4>
                                <span class="art">12 jan, 2016</span>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                                <div class="category-link"><a href="{{ route('home') }}">read more</a></div>
                                <div class="share-comment-section">
                                    <div class="comment">
                                        <i class="fa fa-heart-o"><span>25</span></i>
                                        <i class="fa fa-comment-o"><span>19</span></i>
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
                <div class="col-md-4 col-sm-6">
                    <div class="category-border-content">
                        <div class="category-detail">
                            <div class="category-img">
                                <img src="{{ asset('images/category-img-2.jpg') }}" alt="">
                                <div class="category-overlay">
                                </div>
                            </div>
                            <div class="category-text">
                                <a href="" class="art">Art / lifestyle</a>
                                <h4><a href="{{ route('article.singleArticle', [ 'title' => $title ]) }}">Family comes first</a></h4>
                                <span class="art">12 jan, 2016</span>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                                <div class="category-link"><a href="{{ route('home') }}">read more</a></div>
                                <div class="share-comment-section">
                                    <div class="comment">
                                        <i class="fa fa-heart-o"><span>25</span></i>
                                        <i class="fa fa-comment-o"><span>19</span></i>
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
                <div class="col-md-4 col-sm-12">
                    <div class="row">
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
                    <div class="row">
                        <div class="category-widget-single">
                            <div class="category-widget-single-ad">
                                <a href=""><img src="{{ asset('images/category-widget-ad.png') }}" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================== video-area-start ================================-->
    <section class="video-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="category-border-content">
                        <div class="category-detail">
                            <div class="category-img">
                                <img src="{{ asset('images/cake.png') }}" alt="">
                                <div class="category-overlay">
                                </div>
                            </div>
                            <div class="category-text">
                                <a href="" class="art">food</a>
                                <h4><a href="{{ route('article.singleArticle', [ 'title' => $title ]) }}">yummy yummy cake</a></h4>
                                <span class="art">12 jan, 2016</span>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                                <div class="category-link"><a href="{{ route('home') }}">read more</a></div>
                                <div class="share-comment-section">
                                    <div class="comment">
                                        <i class="fa fa-heart-o"><span>25</span></i>
                                        <i class="fa fa-comment-o"><span>19</span></i>
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
                <div class="col-md-4 col-sm-6">
                    <div class="category-border-content">
                        <div class="category-detail">
                            <div class="category-img">
                                <img src="{{ asset('images/travel.png') }}" alt="">
                                <div class="category-overlay">
                                </div>
                            </div>
                            <div class="category-text">
                                <a href="" class="art">travel</a>
                                <h4><a href="{{ route('article.singleArticle', [ 'title' => $title ]) }}">touch with nature</a></h4>
                                <span class="art">12 jan, 2016</span>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                                <div class="category-link"><a href="{{ route('home') }}">read more</a></div>
                                <div class="share-comment-section">
                                    <div class="comment">
                                        <i class="fa fa-heart-o"><span>25</span></i>
                                        <i class="fa fa-comment-o"><span>19</span></i>
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
                <div class="col-md-4 col-sm-12">
                    <div class="instagram-content">
                        <div class="row">
                            <div class="col-md-12"><div class="instagram-title"><h4>Instagram</h4></div></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div id="instafeed"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="follow-me-section">
                                <div class="about-photo-content category-page-single">
                                    <img src="{{ asset('images/fahi.png') }}" alt="">
                                </div>
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
        </div>
    </section>
    <!--============================== feature-post-area-start ================================-->
    <section class="feature-post-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="category-border-content">
                        <div class="category-detail">
                            <div class="category-img">
                                <img src="{{ asset('images/feature-1.jpg') }}" alt="">
                                <div class="category-overlay">
                                </div>
                            </div>
                            <div class="category-text">
                                <a href="" class="art">food</a>
                                <h4><a href="{{ route('article.singleArticle', [ 'title' => $title ]) }}">yummy chocolate muffin</a></h4>
                                <span class="art">12 jan, 2016</span>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                                <div class="category-link"><a href="{{ route('home') }}">read more</a></div>
                                <div class="share-comment-section">
                                    <div class="comment">
                                        <i class="fa fa-heart-o"><span>25</span></i>
                                        <i class="fa fa-comment-o"><span>19</span></i>
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
                <div class="col-md-4 col-sm-6">
                    <div class="category-border-content">
                        <div class="category-detail">
                            <div class="category-img">
                                <img src="{{ asset('images/feature-2.jpg') }}" alt="">
                                <div class="category-overlay">
                                </div>
                            </div>
                            <div class="category-text">
                                <a href="" class="art">travel/journey</a>
                                <h4><a href="{{ route('article.singleArticle', [ 'title' => $title ]) }}">close to mountain</a></h4>
                                <span class="art">12 jan, 2016</span>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                                <div class="category-link"><a href="{{ route('home') }}">read more</a></div>
                                <div class="share-comment-section">
                                    <div class="comment">
                                        <i class="fa fa-heart-o"><span>25</span></i>
                                        <i class="fa fa-comment-o"><span>19</span></i>
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
                <div class="col-md-4 fix-1">
                    <div class="popular-post-border-content">
                        <div class="popular-post-content">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="popular-post-title">
                                        <h4>Popular posts</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="popular-post-single top">
                                        <div class="popular-post-single-img"><a href="{{ route('article.singleArticle', [ 'title' => $title ]) }}"><img src="{{ asset('images/popular-1.jpg') }}" alt=""></a></div>
                                        <div class="popular-post-single-text"><span>12 Jan, 2016</span><p>Yummy chocolate Muffin</p></div>
                                    </div>
                                    <div class="popular-post-single">
                                        <div class="popular-post-single-img"><a href="{{ route('article.singleArticle', [ 'title' => $title ]) }}"><img src="{{ asset('images/popular-2.jpg') }}" alt=""></a></div>
                                        <div class="popular-post-single-text"><span>12 Jan, 2016</span><p>Music concert</p></div>
                                    </div>
                                    <div class="popular-post-single bottom">
                                        <div class="popular-post-single-img"><a href="{{ route('article.singleArticle', [ 'title' => $title ]) }}"><img src="{{ asset('images/popular-3.jpg') }}" alt=""></a></div>
                                        <div class="popular-post-single-text"><span>12 Jan, 2016</span><p>new year celebration</p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================== my-passion-area-start ================================-->
    <section class="my-passion-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="category-border-content">
                        <div class="category-detail">
                            <div id="carousel-example" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <div class="category-img">
                                            <img src="{{ asset('images/my-passion-1.jpg')  }}" alt="">
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="category-img">
                                            <img src="{{ asset('images/category-img-1.jpg') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <a class="left slide-control photograph" href="#carousel-example-generic" role="button" data-slide="prev"><i class="fa fa-angle-right"></i></a>
                                <a class="right slide-control photograph" href="#carousel-example-generic" role="button" data-slide="next"><i class="fa fa-angle-left"></i></a>
                            </div>
                            <div class="category-text">
                                <a href="" class="art">photography</a>
                                <h4><a href="{{ route('article.singleArticle', [ 'title' => $title ]) }}">photography is my passion</a></h4>
                                <span class="art">12 jan, 2016</span>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                                <div class="category-link"><a href="{{ route('home') }}">read more</a></div>
                                <div class="share-comment-section">
                                    <div class="comment">
                                        <i class="fa fa-heart-o"><span>25</span></i>
                                        <i class="fa fa-comment-o"><span>19</span></i>
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
                <div class="col-md-4 col-sm-6">
                    <div class="category-border-content">
                        <div class="category-detail">
                            <div class="category-img">
                                <img src="{{ asset('images/my-passion-2.jpg') }}" alt="">
                                <div class="category-overlay">
                                </div>
                            </div>
                            <div class="category-text">
                                <a href="" class="art">movie</a>
                                <h4><a href="{{ route('article.singleArticle', [ 'title' => $title ]) }}">best movie</a></h4>
                                <span class="art">12 jan, 2016</span>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                                <div class="category-link"><a href="{{ route('home') }}">read more</a></div>
                                <div class="share-comment-section">
                                    <div class="comment">
                                        <i class="fa fa-heart-o"><span>25</span></i>
                                        <i class="fa fa-comment-o"><span>19</span></i>
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
            </div>
        </div>
    </section>
@endsection


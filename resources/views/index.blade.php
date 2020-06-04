
<!--========================== extend-master-blade ==========================-->
@extends('layouts.frontend.app')

@section('title', 'Article Zone')

<!--========================== include content ==========================-->
@section('content')
    <!--========================== show status message ==========================-->
    @if (session('status'))
        <div class="alert alert-success text-center alert-dismissible show" role="alert">
            <strong>{{ session('status') }}</strong> You are registerd in successfully.
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif
    <!--========================== slider-area-start ==========================-->
    <section class="slider-area">
        <div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <div class="slider-content">
                        <div class="col-md-5 col-md-offset-5 col-sm-8 col-sm-offset-2 col-xs-12">
                            <div class="slide-text-border-content">
                                <div class="slide-text">
                                    <h2>Welcome To My Blog!</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidi dunt ut labore et dolore magna aliqua  ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidi dunt ut labore et dolore magna aliqua</p>
                                    <a href="{{ route('article.category') }}">read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="slider-content-2">
                        <div class="col-md-5 col-md-offset-5 col-sm-8 col-sm-offset-2 col-xs-12">
                            <div class="slide-text-border-content">
                                <div class="slide-text">
                                    <h2>Welcome To My Blog!</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidi dunt ut labore et dolore magna aliqua  ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidi dunt ut labore et dolore magna aliqua</p>
                                    <a href="{{ route('article.singleArticle', [ 'slug' => $article['slug'] ]) }}">read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Controls -->
            <a class="left slide-control arrow" href="#carousel-example-generic" role="button" data-slide="prev"><i class="fa fa-angle-right"></i>
            </a>
            <a class="right slide-control arrow" href="#carousel-example-generic" role="button" data-slide="next"><i class="fa fa-angle-left"></i>
            </a>
        </div>
    </section>
    <!--========================== about-area-start ==========================-->
    <section class="about-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="about-area-all-content">
                        <div class="about-area-content">
                            <div class="about-photo-content">
                                <a><img src="{{ asset('assets/frontend/images/fahi.png') }}" alt=""></a>
                            </div>
                            <div class="about-text-content">
                                    <h4><a href="{{ route('about') }}">Hello, I’m Fahima!</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum do retpariatur. </p>
                                <div class="social-link-about">
                                    <a href=""><i class="fa fa-facebook"></i></a>
                                    <a href=""><i class="fa fa-twitter"></i></a>
                                    <a href=""><i class="fa fa-pinterest"></i></a>
                                    <a href=""><i class="fa fa-instagram"></i></a>
                                    <a href=""><i class="fa fa-google-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--========================== categories-area-start ==========================-->
    <section class="categories-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="video-area-border-content section-padding">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="video-area-content-detail">
                                    <div class="category-img">
                                        <img src="{{ asset('assets/frontend/images/category-img-1.jpg') }}" alt="">
                                        <div class="category-overlay">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 fix col-sm-6">
                                <div class="video-content-text">
                                    <a href="" class="art">Art / lifestyle</a>
                                    <h4><a href="{{ route('article.singleArticle', [ 'slug' => $article['slug'] ]) }}">Todays Celebration</a></h4>
                                    <span class="art">12 jan, 2016</span>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typ setting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry....</p>
                                    <div class="category-link"><a href="{{ route('article.singleArticle', [ 'slug' => $article['slug'] ]) }}">read more</a></div>
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
                    <div class="video-area-border-content section-padding">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="video-area-content-detail">
                                    <div class="category-img">
                                        <img src="{{ asset('assets/frontend/images/category-img-2.jpg') }}" alt="">
                                        <div class="category-overlay">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 fix col-sm-6">
                                <div class="video-content-text">
                                    <a href="" class="art">Art / lifestyle</a>
                                    <h4><a href="{{ route('article.singleArticle', [ 'slug' => $article['slug'] ]) }}">Family comes first</a></h4>
                                    <span class="art">12 jan, 2016</span>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typ setting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry....</p>
                                    <div class="category-link"><a href="{{ route('article.singleArticle', [ 'slug' => $article['slug'] ]) }}">read more</a></div>
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
                    <div class="video-area-border-content section-padding">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="video-area-content-detail">
                                    <iframe width="100" height="249" src="https://www.youtube.com/embed/mZb_gat5YCY" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="col-md-6 fix col-sm-6">
                                <div class="video-content-text">
                                    <a href="" class="art">video</a>
                                    <h4><a href="{{ route('article.singleArticle', [ 'slug' => $article['slug'] ]) }}">Awesome video</a></h4>
                                    <span class="art">12 jan, 2016</span>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typ setting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry....</p>
                                    <div class="category-link"><a href="{{ route('article.singleArticle', [ 'slug' => $article['slug'] ]) }}">read more</a></div>
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
                    <div class="video-area-border-content section-padding">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="video-area-content-detail">
                                    <iframe width="100" height="249" src="https://www.youtube.com/embed/KGTfD6P7gu8" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="col-md-6 fix col-sm-6">
                                <div class="video-content-text">
                                    <a href="" class="art">music</a>
                                    <h4><a href="{{ route('article.singleArticle', [ 'slug' => $article['slug'] ]) }}">top 10 music of this</a></h4>
                                    <span class="art">12 jan, 2016</span>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typ setting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry....</p>
                                    <div class="category-link"><a href="{{ route('article.singleArticle', [ 'slug' => $article['slug'] ]) }}">read more</a></div>
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
                    <div class="video-area-border-content section-padding">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="video-area-content-detail">
                                    <div class="category-img">
                                        <img src="{{ asset('assets/frontend/images/feature-1.jpg') }}" alt="">
                                        <div class="category-overlay">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 fix col-sm-6">
                                <div class="video-content-text">
                                    <a href="" class="art">food</a>
                                    <h4><a href="{{ route('article.singleArticle', [ 'slug' => $article['slug'] ]) }}">yummy chocolate muffin</a></h4>
                                    <span class="art">12 jan, 2016</span>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typ setting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry....</p>
                                    <div class="category-link"><a href="{{ route('article.singleArticle', [ 'slug' => $article['slug'] ]) }}">read more</a></div>
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
                    <div class="video-area-border-content section-padding">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="video-area-content-detail">
                                    <div class="category-img">
                                        <img src="{{ asset('assets/frontend/images/feature-2.jpg') }}" alt="">
                                        <div class="category-overlay">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 fix col-sm-6">
                                <div class="video-content-text">
                                    <a href="" class="art">travel/journey</a>
                                    <h4><a href="{{ route('article.singleArticle', [ 'slug' => $article['slug'] ]) }}">close to mountain</a></h4>
                                    <span class="art">12 jan, 2016</span>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typ setting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry....</p>
                                    <div class="category-link"><a href="{{ route('article.singleArticle', [ 'slug' => $article['slug'] ]) }}">read more</a></div>
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
                    <div class="video-area-border-content section-padding">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="video-area-content-detail">
                                    <div class="category-img">
                                        <img src="{{ asset('assets/frontend/images/my-passion-1.jpg') }}" alt="">
                                        <div class="category-overlay">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 fix col-sm-6">
                                <div class="video-content-text">
                                    <a href="" class="art">photography</a>
                                    <h4><a href="{{ route('article.singleArticle', [ 'slug' => $article['slug'] ]) }}">photography is my passion</a></h4>
                                    <span class="art">12 jan, 2016</span>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typ setting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry....</p>
                                    <div class="category-link"><a href="{{ route('article.singleArticle', [ 'slug' => $article['slug'] ]) }}">read more</a></div>
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
                <!-- include sidebar -->
                @include('layouts.frontend.partial.sidebar')
            </div>
        </div>
    </section>
@endsection


<!--========================== extend-master-blade ==========================-->
@extends('layouts.frontend.app')

@section('title', $post['title'])


<!--========================== include content ==========================-->
@section('content')
    <!--============================== page-area-start ================================-->
    <section class="single-page-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="category-border-content">
                        <div class="category-detail category">
                            <div class="category-img">
                                <img src="{{ asset('assets/frontend/images/category-img-2.jpg') }}" alt="">
                                <div class="category-overlay">
                                </div>
                            </div>
                            <div class="category-text read-more clearfix">
                                <a href="" class="art">Art / lifestyle</a>
                                <h4><a href="{{ route('article.singleArticle', [ 'slug' => $article['slug'] ]) }}">Family comes first</a></h4>
                                <span class="art">12 jan, 2016</span>
                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                                <div class="quote"><p><i class="fa fa-quote-left"></i>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem<i class="fa fa-quote-right"></i></p></div>
                                <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
                                <div class="read-more-more clearfix">
                                    <div class="share-comment-section floatright">
                                        <div class="share single-page">
                                            <span>share:</span>
                                            <a href=""><i class="fa fa-facebook"></i></a>
                                            <a href=""><i class="fa fa-twitter"></i></a>
                                            <a href=""><i class="fa fa-pinterest"></i></a>
                                            <a href=""><i class="fa fa-instagram"></i></a>
                                        </div>
                                    </div>
                                    <div class="tag floatleft">
                                        <span>Tags</span>
                                        <a href="">lifestyle</a>
                                        <a href="">art</a>
                                        <a href="">video</a>
                                    </div>
                                </div>
                                <div class="recent-post-content clearfix">
                                    <h4>You May Also Like</h4>
                                    <div class="recent-post-single single-page">
                                        <div class="recent-post-img single-page">
                                            <a href="{{ route('article.singleArticle', [ 'slug' => $article['slug'] ]) }}"><img src="{{ asset('assets/frontend/images/recent-1.jpg') }}" alt=""></a>
                                        </div>
                                        <div class="recent-post-text single-page">
                                            <span>01 jan, 2016</span>
                                            <a href="{{ route('article.singleArticle', [ 'slug' => $article['slug'] ]) }}"><p>celebration of new year</p></a>
                                        </div>
                                    </div>
                                    <div class="recent-post-single single-page">
                                        <div class="recent-post-img single-page">
                                            <a href="{{ route('article.singleArticle', [ 'slug' => $article['slug'] ]) }}"><img src="{{ asset('assets/frontend/images/recent-2.jpg') }}" alt=""></a>
                                        </div>
                                        <div class="recent-post-text single-page">
                                            <span>01 jan, 2016</span>
                                            <a href="{{ route('article.singleArticle', [ 'slug' => $article['slug'] ]) }}"><p>color in nature</p></a>
                                        </div>
                                    </div>
                                    <div class="recent-post-single single-page">
                                        <div class="recent-post-img single-page">
                                            <a href="{{ route('article.singleArticle', [ 'slug' => $article['slug'] ]) }}"><img src="{{ asset('assets/frontend/images/recent-3.jpg') }}" alt=""></a>
                                        </div>
                                        <div class="recent-post-text single-page">
                                            <span>01 jan, 2016</span>
                                            <a href="{{ route('article.singleArticle', [ 'slug' => $article['slug'] ]) }}"><p>yummy burgers</p></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="user-comments">
                                    <p><i class="fa fa-comments-o"></i><span>comments</span></p>
                                    <div class="single-user-comment clearfix">
                                        <div class="single-user-img">
                                            <a><img src="{{ asset('assets/frontend/images/single-user-1.jpg') }}" alt=""></a>
                                        </div>
                                        <div class="single-user-comment-text">
                                            <h4><a>Jolie Anne Curtiz</a><span>01 jan, 2016</span></h4>
                                            <p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat.</p>
                                        </div>
                                    </div>
                                    <div class="single-user-comment clearfix">
                                        <div class="single-user-img">
                                            <a><img src="{{ asset('assets/frontend/images/single-user-2.jpg') }}" alt=""></a>
                                        </div>
                                        <div class="single-user-comment-text">
                                            <h4><a>Robert Smith</a><span>01 jan, 2016</span></h4>
                                            <p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat.</p>
                                        </div>
                                    </div>
                                    <div class="single-user-comment clearfix">
                                        <div class="single-user-img">
                                            <a><img src="{{ asset('assets/frontend/images/single-user-3.jpg') }}" alt=""></a>
                                        </div>
                                        <div class="single-user-comment-text">
                                            <h4><a>Sara Jordan</a><span>01 jan, 2016</span></h4>
                                            <p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat.</p>
                                        </div>
                                    </div>
                                    <div class="single-user-comment clearfix">
                                        <div class="single-user-img">
                                            <a><img src="{{ asset('assets/frontend/images/single-user-4.jpg') }}" alt=""></a>
                                        </div>
                                        <div class="single-user-comment-text">
                                            <h4><a>Paul Pablo</a><span>01 jan, 2016</span></h4>
                                            <p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="reply-section">
                                    <h4>Leave a Reply</h4>
                                    <form action="#" method="post">
                                        <input type="text" placeholder="Name">
                                        <input type="email" placeholder="Email">
                                        <div class="web-address"><input type="text" class="web-address" placeholder="Website"></div>
                                        <textarea placeholder="Comment"></textarea>
                                        <input type="submit" value="submit">
                                    </form>
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


<!--========================== top-area-start ==========================-->
<section class="top-area">
    <div class="container">
        <div class="row">
            <div class="top-area-content">
                <div class="col-md-6 col-sm-6 col-xs-5">
                    <div class="logo text-left">
                        <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-7">
                    <div class="social-icon text-right">
                        <a href=""><i class="fa fa-facebook"></i></a>
                        <a href=""><i class="fa fa-twitter"></i></a>
                        <a href=""><i class="fa fa-pinterest"></i></a>
                        <a href=""><i class="fa fa-instagram"></i></a>
                        <a href=""><i class="fa fa-google-plus"></i></a>
                        <a href=""><i class="fa fa-rss"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--========================== menu-area-start ==========================-->
<section class="menu-area">
    <div class="container">
        <div class="row">
            <div class="menu-area-content clearfix">
                <div class="col-md-7 col-sm-9 col-xs-12">
                    <div class="main-menu text-left">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="@if($title === 'Article Zone') {{ 'active' }} @endif"><a href="{{ route('home') }}">Home</a></li>
                                <li class="@if($title === 'About me') {{ 'active' }} @endif"><a href="{{ route('about') }}">About me</a></li>
                                <li class="@if($title === 'Categories') {{ 'active' }} @endif"><a href="{{ route('article.category') }}">Categories</a></li>
                                <li class="@if($title === 'Contact') {{ 'active' }} @endif"><a href="{{ route('contact') }}">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-3 col-xs-12">
                    <div class="search-btn text-right">
                        <form>
                            <input type="search" placeholder="Type to search here"/>
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

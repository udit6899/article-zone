
<!--========================== extend-master-blade ==========================-->
@extends('layouts.frontend.app')

@section('title', 'Post Categories')

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
            @for($i = 0; $i < 3; $i++)
                <div class="row">
                @foreach($categories as $category)
                    @if($loop->index >= ($i * 3) && $loop->index < ($i + 1) * 3)
                    <div class="col-md-4 col-sm-6">
                        <div class="category-border-content">
                                <div class="category-detail">
                                    <div class="category-img">
                                        <img src="{{ Storage::disk('public')->url('categories/' . $category->image) }}"
                                             alt="{{ $category->name }}">
                                        <div class="category-overlay"></div>
                                    </div>
                                    <div class="category-text">
                                        <a href="" class="art">{{ $category->created_at->toFormattedDateString() }}</a>
                                        <h4><a href="{{ route('post.category') }}">{{ $category->name }}</a></h4>
                                        <span class="art">[ {{ $category->posts->count() }} ]</span>
                                        <p>{{ Str::limit($category->description, 75) }}</p>
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
                    @endif
                @endforeach
                </div>
                <br><br>
            @endfor
        </div>
    </section>
@endsection


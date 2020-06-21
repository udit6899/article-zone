
<!--========================== extend-master-blade ==========================-->
@extends('layouts.frontend.app')

@section('title', 'Article Categories')

<!--========================== include content ==========================-->
@section('content')
    <!--============================== slider-area-start ================================-->
    <section class="slider-area category-page-single">
        <div class="table category-page-single">
            <div class="table-cell category-page-single">
                <h2>Article Category</h2>
            </div>
        </div>
    </section>
    <!--============================== categories-area-start ================================-->
    <section class="categories-area category-page-single">
        <div class="container">
            @for($i = 0; $i < 3; $i++)
                <div class="row">
                @forelse($nonEmptyCategories as $category)
                    @if($loop->index >= ($i * 3) && $loop->index < ($i + 1) * 3)
                    <div class="col-md-4 col-sm-6">
                        <div class="category-border-content">
                            <div class="category-detail">
                                <div class="category-img">
                                    <img src="{{ $category->imageUrl }}" alt="{{ $category->name }}">
                                    <div class="category-overlay"></div>
                                </div>
                                <div class="category-text">
                                    <a class="art">{{ $category->created_at->toFormattedDateString() }}</a>
                                    <h4>
                                        <a href="{{ $category->postsLink }}">
                                            {{ $category->name }}
                                        </a>
                                    </h4>
                                    <p>{{ Str::limit($category->description, 75) }}</p>
                                    <div class="category-link">
                                        <a href="{{ $category->postsLink }}">view</a>
                                    </div>
                                    <div class="share-comment-section">
                                        <div class="comment">
                                            <small>
                                                <strong>Total Posts: </strong>
                                                <span>{{ $category->posts()->published()->count() }}</span>
                                            </small>
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

                @empty
                    <div class="category-border-content clearfix bg-warning text-danger">
                        <div class="single-user-comment">
                            <p><strong>No Categories Found !</strong></p>
                        </div>
                    </div>
                    @break
                @endforelse
                </div>
                <br><br>
            @endfor
            <!-- Add pagination -->
            <div class="text-center">
                {{ $nonEmptyCategories->onEachSide(3)->links('vendor.pagination.default') }}
            </div>
        </div>
    </section>
@endsection


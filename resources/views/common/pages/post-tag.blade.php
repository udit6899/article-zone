
<!--========================== extend-master-blade ==========================-->
@extends('layouts.frontend.app')

@section('title', 'Article Tags')

<!--========================== include content ==========================-->
@section('content')
    <!--============================== slider-area-start ================================-->
    <section class="slider-area category-page-single">
        <div class="table category-page-single">
            <div class="table-cell category-page-single">
                <h2>Article Tag</h2>
            </div>
        </div>
    </section>
    <!--============================== categories-area-start ================================-->
    <section class="categories-area category-page-single">
        <div class="container">
            @for($i = 0; $i < 3; $i++)
                <div class="row">
                @forelse($nonEmptyTags as $tag)
                    @if($loop->index >= ($i * 3) && $loop->index < ($i + 1) * 3)
                    <div class="col-md-4 col-sm-6">
                        <div class="category-border-content">
                            <div class="category-detail">
                                <div class="category-text">
                                    <a class="art">{{ $tag->created_at->toFormattedDateString() }}</a>
                                    <h4>
                                        <a href="{{ $tag->postsLink }}">
                                            {{ $tag->name }}
                                        </a>
                                    </h4>
                                    <p>{{ Str::limit($tag->description, 75) }}</p>
                                    <div class="category-link">
                                        <a href="{{ $tag->postsLink }}">view</a>
                                    </div>
                                    <div class="share-comment-section">
                                        <div class="comment">
                                            <small>
                                                <strong>Total Posts: </strong>
                                                <span>{{ $tag->posts()->published()->count() }}</span>
                                            </small>
                                        </div>
                                        <div class="share">
                                            <span>share:</span>
                                            @include('common.base.pages.share', ['data' => $tag])
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
                            <p><strong>No Tags Found !</strong></p>
                        </div>
                    </div>
                    @break
                @endforelse
                </div>
                <br><br>
            @endfor
            <!-- Add pagination -->
            <div class="text-center">
                {{ $nonEmptyTags->onEachSide(3)->links('vendor.pagination.default') }}
            </div>
        </div>
    </section>
@endsection


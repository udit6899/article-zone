
<!--========================== extend-master-blade ==========================-->
@extends('layouts.frontend.app')

@section('title')
    {{ "$category->name-Items" }}
@endsection

<!--========================== include content ==========================-->
@section('content')
    <!--============================== slider-area-start ================================-->
    <section class="slider-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <div class="slider-content-2 text-center"
                                    style="background: url({{ Storage::disk('public')
                                    ->url("categories/slider/$category->image") }}) no-repeat scroll center center;">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h1 class="display-flex">{{ $category->name }}</h1>
                                        <p class="lead">
                                            <strong>Total Posts: </strong>{{ $categoryPosts->total() }}
                                        </p>
                                    </div>
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
        @include('common.base.pages.post-list', ['posts' => $categoryPosts])
    </section>
@endsection

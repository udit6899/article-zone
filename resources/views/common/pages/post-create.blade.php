<!--========================== extend-master-blade ==========================-->
@extends('layouts.frontend.app')

@section('title', "Create Article")

@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('assets/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

<!--========================== include content ==========================-->
@section('content')
    <!--============================== slider-area-start ================================-->
    <section class="slider-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="carousel-example-generic"
                         class="carousel slide carousel-fade" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <div class="slider-content-2 text-center">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h1 class="display-flex">Create New Article</h1>
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
    <section class="single-page-area">
        <div class="container">
            <div class="row clearfix text-left">
                <div class="col-md-8">
                    <div class="category-border-content">
                    <form id="post-create"
                          action="{{ route("post.store") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row clearfix text-center">
                            <div class="table category-page-single">
                                <div class="table-cell category-page-single">
                                    <h2>Add Article</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group ">
                                    <div>
                                        <label class="form-label text-left">Your Name</label>
                                        <input type="text" id="name" name='name' class="form-control"
                                               placeholder="Your Full Name" value="{{ old('name') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group ">
                                    <div>
                                        <label class="form-label text-left">Your Email</label>
                                        <input type="email" name='email' class="form-control" required
                                               placeholder="Your Email Address" value="{{ old('email') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group ">
                                    <div>
                                        <label class="form-label text-left">Article Title</label>
                                        <input type="text" id="title" name='title' class="form-control"
                                               placeholder="Article Title" value="{{ old('title') }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <label class="form-label text-left">Article Quote</label>
                                        <textarea rows="3" class="form-control" name="quote" id="post_quote"
                                        placeholder="Write somethings...">{{ old('quote') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="category_image">Featured Image :</label>
                                    <input type="file" accept="image/*" id="post_image" name='image' required>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <div>
                                        <label for="tag">Select Category</label>
                                        <select id="category" name="categories[]" required
                                                class="form-control show-tick" data-live-search="true" multiple>
                                            @foreach($allCategories as $category)
                                                <option value="{{ $category->id }}"
                                                    @if(
                                                        !is_null(old('categories')) &&
                                                        in_array($category->id, old('categories'))
                                                    )
                                                        {{ 'selected' }}
                                                    @endif>{{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group ">
                                    <div>
                                        <label for="tag">Select Tag</label>
                                        <select id="tag" name="tags[]" required
                                                class="form-control show-tick" data-live-search="true" multiple>
                                            @foreach($allTags as $tag)
                                                <option value="{{ $tag->id }}"
                                                    @if(
                                                        !is_null(old('tags')) &&
                                                        in_array($tag->id, old('tags'))
                                                    )
                                                        {{ 'selected' }}
                                                    @endif>{{ $tag->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group ">
                                    <!-- TinyMCE -->
                                    <label class="form-label text-left">Article Body</label>
                                    <textarea id="tinymce" name="body">{{ old('body') }}</textarea>
                                    <!-- #END# TinyMCE -->
                                </div>
                            </div>
                        </div>
                        <br/>
                        <br/>
                        <div class="row clearfix text-center">
                            <button type="submit" class="btn btn-info m-t-15 waves-effect">Publish</button>
                        </div>
                    </form>
                    </div>
                </div>
                <!-- include sidebar -->
                @include('layouts.frontend.partial.sidebar')
            </div>
        </div>
    </section>
@endsection

@push('js')
    <!-- Custom js for editor -->
    <script src="{{ asset('assets/frontend/js/editor.js') }}"></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset('assets/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- TinyMCE -->
    <script src="{{ asset('assets/plugins/tinymce/tinymce.js') }}"></script>
@endpush

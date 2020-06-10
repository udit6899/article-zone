@extends('layouts.backend.app')

@section('title', 'Add Post')

@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <form action="{{ route('admin.post.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row clearfix">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        ADD NEW POST
                    </h2>
                </div>
                <div class="body">
                    <div class="form-group form-float">
                        <div class="form-line {{ $errors->has('title') ? 'focused error' : '' }}">
                            <input type="text" id="title" name='title' class="form-control" value="{{ old('title') }}">
                            <label class="form-label">Post Title</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line {{ $errors->has('quote') ? 'focused error' : '' }}">
                            <textarea rows="3" class="form-control" name="quote" id="post_quote">{{ old('quote') }}</textarea>
                            <label class="form-label">Post Quote</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category_image">Featured Image :</label>
                        <input type="file" accept="image/*" id="post_image" name='image' class="form-control">
                    </div>
                </div>
            </div>
        </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Categories and Tags
                        </h2>
                    </div>
                    <div class="body">
                        <div class="form-group form-float">
                            <div class="form-line {{ $errors->has('categories') ? 'focused error' : '' }}">
                                <label for="tag">Select Category</label>
                                <select id="category" name="categories[]" class="form-control show-tick" data-live-search="true" multiple>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @if(
                                                !is_null(old('categories')) &&
                                                in_array($category->id, old('categories'))
                                            ){{ 'selected' }}@endif>{{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line {{ $errors->has('tags') ? 'focused error' : '' }}">
                                <label for="tag">Select Tag</label>
                                <select id="tag" name="tags[]" class="form-control show-tick" data-live-search="true" multiple>
                                   @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}"
                                            @if(
                                                !is_null(old('tags')) &&
                                                in_array($tag->id, old('tags'))
                                            ){{ 'selected' }}@endif>{{ $tag->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" id="publish" name='is_published' class="form-control filled-in"
                                   {{ old('is_published') == 1 ? 'checked' : '' }} value="1">
                            <label for="publish" class="form-label">Publish</label>
                        </div>

                        <a class="btn bg-deep-orange m-t-15 waves-effect" href="{{ route('admin.post.index') }}">BACK</a>

                        <button type="submit" class="btn btn-info m-t-15 waves-effect">SAVE</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Body
                        </h2>
                    </div>
                    <div class="body">
                        <!-- TinyMCE -->
                        <textarea id="tinymce" name="body" required>
                            {{ old('body') }}
                        </textarea>
                        <!-- #END# TinyMCE -->
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

@push('js')
    <!-- Select Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- TinyMCE -->
    <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>
@endpush

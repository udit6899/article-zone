@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{ secure_asset('assets/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

<!-- Base-post-edit form -->
<form action="{{ route("$prefix.post.update", $post) }}" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <div class="row clearfix">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        EDIT POST
                    </h2>
                </div>
                <div class="body">
                    <div class="form-group form-float">
                        <div class="form-line {{ $errors->has('title') ? 'focused error' : '' }}">
                            <input type="text" id="title" name='title'
                                   class="form-control" value="{{ old('title') ? old('title') : $post->title }}">
                            <label class="form-label">Post Title</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line {{ $errors->has('quote') ? 'focused error' : '' }}">
                            <textarea rows="3" class="form-control" name="quote" id="post_quote"
                            >{{ old('quote') ? old('quote') : $post->quote }}</textarea>
                            <label class="form-label">Post Quote</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="post_image">Featured Image :</label>
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
                            <select id="category" name="categories[]"
                                    class="form-control show-tick" data-live-search="true" multiple>
                                @foreach($allCategories as $category)
                                    <option value="{{ $category->id }}"
                                        @if(
                                            !is_null(old('categories')) &&
                                            in_array($category->id, old('categories'))
                                        )
                                            {{ 'selected' }}
                                        @elseif(is_null(old('categories')))
                                            @foreach($post->categories as $postCategory)
                                                {{ $category->id === $postCategory->id ? 'selected' : '' }}
                                            @endforeach
                                        @endif>{{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line {{ $errors->has('tags') ? 'focused error' : '' }}">
                            <label for="tag">Select Tag</label>
                            <select id="tag" name="tags[]"
                                    class="form-control show-tick" data-live-search="true" multiple>
                                @foreach($allTags as $tag)
                                    <option value="{{ $tag->id }}"
                                        @if(
                                            !is_null(old('tags')) &&
                                            in_array($tag->id, old('tags'))
                                        )
                                            {{ 'selected' }}
                                        @elseif(is_null(old('tags')))
                                            @foreach($post->tags as $postTag)
                                                {{ $tag->id === $postTag->id ? 'selected' : '' }}
                                            @endforeach
                                        @endif>{{ $tag->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="publish" name='is_published' class="form-control filled-in"
                               @if(
                                    old('is_published') == true ||
                                    (is_null(old('is_published')) && $post->is_published == true)
                               )
                                    {{ 'checked' }}
                               @endif value="1">
                        <label for="publish" class="form-label">Publish</label>
                    </div>

                    <a class="btn bg-deep-orange m-t-15 waves-effect" href="{{ route("$prefix.post.index") }}">
                        BACK
                    </a>

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
                            {{ old('body') ? old('body') : $post->body }}
                    </textarea>
                    <!-- #END# TinyMCE -->
                </div>
            </div>
        </div>
    </div>
</form>

@push('js')
    <!-- Custom js for editor -->
    <script src="{{ secure_asset('assets/frontend/js/editor.js') }}"></script>

    <!-- Select Plugin Js -->
    <script src="{{ secure_asset('assets/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- TinyMCE -->
    <script src="{{ secure_asset('assets/plugins/tinymce/tinymce.js') }}"></script>
@endpush

<!-- Base-post-index page -->
<div class="container-fluid">
    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">

                <div class="header">
                    <h2>
                        MY FAVOURITE POSTS
                        <span class="badge bg-color-black-gray">{{ $favouritePosts->count() }}</span>
                    </h2>
                </div>

                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">

                            <thead class="bg-color-black-gray">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Image</th>
                                <th>Created_At</th>
                                <th><i class="material-icons">visibility</i></th>
                                <th><i class="material-icons">favorite</i></th>
                                <th><i class="material-icons">comment</i></th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($favouritePosts as $key=>$post)
                                <tr class="text-color-black">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ Str::limit($post->title, 10, '...   ') }}</td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>
                                        <img src="{{ $post->imageUrl }}" height="50px" width="80px">
                                    </td>
                                    <td>{{ $post->created_at->toDateString() }}</td>
                                    <td>{{ $post->view_count }}</td>
                                    <td>{{ $post->favouriteToUsers->count() }}</td>
                                    <td>{{ $post->approved_comments->count() }}</td>
                                    <td class="text-center">
                                        <a target="_blank" class="btn btn-xs bg-blue-grey waves-effect"
                                           title="View" href="{{ route("post.details", $post->slug) }}">
                                            <i class="material-icons action-icon">visibility</i>
                                        </a>
                                        <button type="button" class="btn btn-xs bg-deep-orange waves-effect"
                                                title="Delete" onclick="deleteItem({{ $post->id }})">
                                            <i class="material-icons action-icon">delete</i>
                                        </button>
                                        <form id="delete-form-{{ $post->id }}" class="form-hide"  method="POST"
                                              action="{{ route("$prefix.favourite-post.destroy", $post->id) }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Exportable Table -->
</div>

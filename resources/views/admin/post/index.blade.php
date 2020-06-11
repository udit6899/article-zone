@extends('layouts.backend.app')

@section('title', 'Article Post')

@push('css')

@endpush

@section('content')
    <div class="container-fluid">

        <div class="block-header">
            <a class="btn btn-info waves-effect" href="{{ route('admin.post.create') }}">
                <i class="material-icons">post_add</i>
                <span>Add New Post</span>
            </a>

            <div class="pull-right">

                @if(Request::is('admin/post/all'))
                    <a class="btn btn-info waves-effect" href="{{ route('admin.post.index') }}">
                        <i class="material-icons">library_books</i>
                        <span>My Post</span>
                    </a>
                @else
                    <a class="btn btn-info waves-effect" href="{{ route('admin.post.all') }}">
                        <i class="material-icons">library_books</i>
                        <span>All Post</span>
                    </a>
                @endif

                <a class="btn btn-info waves-effect" href="{{ route('admin.post.pending') }}">
                    <i class="material-icons">library_books</i>
                    <span>Pending Post</span>
                </a>

            </div>
        </div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">

                    <div class="header">
                        <h2>
                            {{ Request::is('admin/post/all') ? 'ALL POSTS' : 'MY POSTS' }}
                            <span class="badge bg-color-black-gray">{{ $posts->count() }}</span>
                        </h2>
                    </div>

                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">

                                <thead class="bg-color-black-gray">
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        @if(Request::is('admin/post/all'))<th>Author</th>@endif
                                        <th>Is_Approved</th>
                                        <th>Image</th>
                                        <th>Is_Published</th>
                                        <th>Created_At</th>
                                        @if(Request::is('admin/post'))<th>Updated_At</th>@endif
                                        <th><i class="material-icons">visibility</i></th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($posts as $key=>$post)
                                        <tr class="text-color-black">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ Str::limit($post->title, 10, '...   ') }}</td>
                                            @if(Request::is('admin/post/all'))<td>{{ $post->user->name }}</td>@endif

                                            <td>
                                                @if($post->is_approved == true)
                                                    <span class="badge bg-light-green ">approved</span>
                                                @else
                                                    <span class="badge bg-pink">pending</span>
                                                @endif
                                            </td>

                                            <td>
                                                <img src="{{ Storage::disk('public')->url('posts/'.$post->image) }}"
                                                     height="50px" width="80px">
                                            </td>
                                            <td>
                                                @if($post->is_published == true)
                                                    <span class="badge bg-light-green">published</span>
                                                @else
                                                    <span class="badge bg-pink">pending</span>
                                                @endif
                                            </td>

                                            <td>{{ $post->created_at }}</td>
                                            @if(Request::is('admin/post'))<td>{{ $post->updated_at }}</td>@endif
                                            <td>{{ $post->view_count }}</td>

                                            <td class="text-center">
                                                <a class="btn btn-xs bg-blue-grey waves-effect" title="Show" href="{{ route('admin.post.show', $post->id) }}">
                                                    <i class="material-icons action-icon">visibility</i>
                                                </a>
                                                <a class="btn btn-xs btn-info waves-effect" title="Edit" href="{{ route('admin.post.edit', $post->id) }}">
                                                    <i class="material-icons action-icon">edit</i>
                                                </a>
                                                <button type="button" class="btn btn-xs bg-deep-orange waves-effect" title="Delete" onclick="deleteItem({{ $post->id }})">
                                                    <i class="material-icons action-icon">delete</i>
                                                </button>
                                                <form id="delete-form-{{ $post->id }}" class="form-hide" action="{{ route('admin.post.destroy', $post->id) }}" method="POST">
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
@endsection

@push('js')

@endpush

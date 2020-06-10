@extends('layouts.backend.app')

@section('title', 'Article Post')

@push('css')
    <!-- JQuery DataTable Css -->
    <link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <a class="btn btn-info waves-effect" href="{{ route('admin.post.create') }}">
                <i class="material-icons">add</i>
                <span>Add New Post</span>
            </a>
        </div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            ALL POSTS
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
                                        <th>Author</th>
                                        <th>Views</th>
                                        <th>Is_Approved</th>
                                        <th>Image</th>
                                        <th>Is_Published</th>
                                        <th>Created_At</th>
                                        <th>Updated_At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $key=>$post)
                                        <tr class="text-color-black">
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                {{ Str::limit($post->title, 10, '...   ') }}
                                                <a class="badge bg-orange" title="{{ $post->title }}">read more</a>
                                            </td>
                                            <td>{{ $post->user->name }}</td>
                                            <td>{{ $post->view_count }}</td>
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
                                            <td>{{ $post->updated_at }}</td>
                                            <td class="text-center">
                                                <a class="btn bg-blue-grey waves-effect" href="{{ route('admin.post.show', $post->id) }}">
                                                    <i class="material-icons">visibility</i>
                                                </a>
                                                <a class="btn btn-info waves-effect" href="{{ route('admin.post.edit', $post->id) }}">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <button type="button" class="btn bg-deep-orange waves-effect" onclick="deleteItem({{ $post->id }})">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                                <form id="delete-form-{{ $post->id }}" action="{{ route('admin.post.destroy', $post->id) }}" method="POST" style="display: none">
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
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('assets/backend/js/pages/tables/jquery-datatable.js') }}"></script>
@endpush

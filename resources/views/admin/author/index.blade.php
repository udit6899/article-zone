@extends('layouts.backend.app')

@section('title', 'Article Author')

@push('css')

@endpush

@section('content')
    <div class="container-fluid">
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            ALL AUTHORS
                            <span class="badge bg-color-black-gray">{{ $authors->count() }}</span>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead class="bg-color-black-gray">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Posts</th>
                                        <th>Comments</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($authors as $key=>$author)
                                        <tr class="text-color-black">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $author->name }}</td>
                                            <td>
                                                <img height="50px" width="50px" src="{{ $author->ImageUrl }}">
                                            </td>
                                            <td>
                                                <a  target="_blank" href="{{ $author->postsLink }}">
                                                    {{ $author->posts_count }}
                                                </a>
                                            </td>
                                            <td>{{ $author->comments_count }}</td>
                                            <td>{{ $author->created_at }}</td>
                                            <td>{{ $author->created_at }}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-xs bg-blue-grey waves-effect"
                                                        title="View" onclick="readAuthor({{ $author->toJson() }})">
                                                    <i class="material-icons action-icon">visibility</i>
                                                </button>
                                                <button type="button" class="btn btn-xs bg-deep-orange waves-effect"
                                                        title="Delete" onclick="deleteItem({{ $author->id }})">
                                                    <i class="material-icons action-icon">delete</i>
                                                </button>
                                                <form id="delete-form-{{ $author->id }}" class="form-hide"
                                                      action="{{ route('admin.author.destroy', $author->id) }}"
                                                      method="POST">
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

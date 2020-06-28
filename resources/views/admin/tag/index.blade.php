@extends('layouts.backend.app')

@section('title', 'Article Tag')

@push('css')

@endpush

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <a class="btn btn-info waves-effect" href="{{ route('admin.tag.create') }}">
                <i class="material-icons">add</i>
                <span>Add New Tag</span>
            </a>
        </div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            ALL TAGS
                            <span class="badge bg-color-black-gray">{{ $tags->count() }}</span>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead class="bg-color-black-gray">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Posts</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-color-black">
                                    @foreach($tags as $key=>$tag)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $tag->name }}</td>
                                            <td>
                                                <a target="_blank" href="{{ $tag->postsLink }}">
                                                    {{ $tag->posts->count() }}
                                                </a>
                                            </td>
                                            <td>{{ $tag->created_at }}</td>
                                            <td>{{ $tag->updated_at }}</td>
                                            <td class="text-center">
                                                <a class="btn btn-xs btn-info waves-effect"
                                                   title="Edit" href="{{ route('admin.tag.edit', $tag->slug) }}">
                                                    <i class="material-icons action-icon">edit</i>
                                                </a>
                                                <button type="button" class="btn btn-xs bg-deep-orange waves-effect"
                                                        title="Delete" onclick="deleteItem('{{ $tag->slug }}')">
                                                    <i class="material-icons action-icon">delete</i>
                                                </button>
                                                <form id="delete-form-{{ $tag->slug }}" class="form-hide" method="POST"
                                                      action="{{ route('admin.tag.destroy', $tag->slug) }}">
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

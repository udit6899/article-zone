@extends('layouts.backend.app')

@section('title', 'Article Category')

@push('css')

@endpush

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <a class="btn btn-info waves-effect" href="{{ route('admin.category.create') }}">
                <i class="material-icons">add</i>
                <span>Add New Category</span>
            </a>
        </div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            ALL CATEGORIES
                            <span class="badge bg-color-black-gray">{{ $categories->count() }}</span>
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
                                        <th>Description</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $key=>$category)
                                        <tr class="text-color-black">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                <img height="50px" width="80px"
                                                 src="{{ Storage::disk('public')->url('categories/'.$category->image) }}">
                                            </td>
                                            <td>{{ $category->posts->count() }}</td>
                                            <td>
                                                {{ Str::limit($category->description, 20, '...   ') }}
                                                <a class="badge bg-orange" title="{{ $category->description }}">read more</a>
                                            </td>
                                            <td>{{ $category->created_at }}</td>
                                            <td>{{ $category->updated_at }}</td>
                                            <td class="text-center">
                                                <a class="btn btn-xs btn-info waves-effect" title="Edit" href="{{ route('admin.category.edit', $category->id) }}">
                                                    <i class="material-icons action-icon">edit</i>
                                                </a>
                                                <button type="button" class="btn btn-xs bg-deep-orange waves-effect" title="Delete" onclick="deleteItem({{ $category->id }})">
                                                    <i class="material-icons action-icon">delete</i>
                                                </button>
                                                <form id="delete-form-{{ $category->id }}" class="form-hide" action="{{ route('admin.category.destroy', $category->id) }}" method="POST">
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

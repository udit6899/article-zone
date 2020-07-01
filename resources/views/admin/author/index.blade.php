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
                                        <th>Status</th>
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
                                                <img height="30px" width="30px"
                                                     alt="author-image" src="{{ $author->ImageUrl }}">
                                            </td>
                                            <td>
                                                <a  target="_blank" href="{{ $author->postsLink }}">
                                                    {{ $author->posts_count }}
                                                </a>
                                            </td>
                                            <td>{{ $author->comments_count }}</td>
                                            <td>
                                                @if($author->email_verified_at)
                                                    <span class="badge bg-light-green">verified</span>
                                                @else
                                                    <span class="badge bg-pink">pending</span>
                                                @endif
                                            </td>
                                            <td>{{ $author->created_at }}</td>
                                            <td>{{ $author->updated_at }}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-xs bg-blue-grey waves-effect"
                                                        onclick="readAuthor({{ $author->replicate()->toJson() }},
                                                        '{{ $author->imageUrl }}')" title="View">
                                                    <i class="material-icons action-icon">visibility</i>
                                                </button>
                                                <button type="button"
                                                        class="btn btn-xs bg-deep-orange waves-effect" title="Delete"
                                                        onclick="deleteItem('{{ $key = $author->encryptId }}')">
                                                    <i class="material-icons action-icon">delete</i>
                                                </button>
                                                <form id="{{ "delete-form-$key" }}" class="form-hide"
                                                      action="{{ route('admin.author.destroy', $author->encryptId) }}"
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

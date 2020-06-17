@extends('layouts.backend.app')

@section('title', 'Article Post')

@push('css')

@endpush

@section('admin-post-activities')
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
@endsection

@section('content')
    @include('common.base.post.index', ['prefix' => 'admin'])
@endsection

@push('js')

@endpush

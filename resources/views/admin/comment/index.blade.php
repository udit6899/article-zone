@extends('layouts.backend.app')

@section('title', 'Article Comment')

@push('css')

@endpush

@section('admin-comment-header')
    <div class="header">
        <h2>
            @if(Request::is('admin/comment/all'))
                ALL COMMENTS
            @elseif(Request::is('admin/comment/pending'))
                PENDING COMMENTS
            @else
                MY COMMENTS
            @endif
            <span class="badge bg-color-black-gray">{{ $comments->count() }}</span>
        </h2>
    </div>
@endsection

@section('admin-comment-activities')
    <div class="block-header">
        @if(Request::is('admin/comment/all'))
            <a class="btn btn-info waves-effect" href="{{ route('admin.comment.index') }}">
                <i class="material-icons">comment</i>
                <span>My Comment</span>
            </a>
        @else
            <a class="btn btn-info waves-effect" href="{{ route('admin.comment.all') }}">
                <i class="material-icons">comment</i>
                <span>All Comment</span>
            </a>
        @endif

        @if(!Request::is('admin/comment/pending'))
            <div class="pull-right">
                <a class="btn btn-info waves-effect" href="{{ route('admin.comment.pending') }}">
                    <i class="material-icons">comment</i>
                    <span>Pending Comment</span>
                </a>
            </div>
        @else
            <div class="pull-right">
                <a class="btn btn-info waves-effect" href="{{ route('admin.comment.index') }}">
                    <i class="material-icons">comment</i>
                    <span>My Comment</span>
                </a>
            </div>
        @endif
    </div>
@endsection

@section('content')
    @include('common.base.comment.index', ['prefix' => 'admin'])
@endsection

@push('js')

@endpush

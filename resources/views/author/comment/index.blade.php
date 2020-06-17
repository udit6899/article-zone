@extends('layouts.backend.app')

@section('title', 'Article Comment')

@push('css')

@endpush

@section('author-comment-header')
    <div class="header">
        <h2>
            MY COMMENTS
            <span class="badge bg-color-black-gray">{{ $comments->count() }}</span>
        </h2>
    </div>
@endsection

@section('content')
    @include('common.base.comment.index', ['prefix' => 'author'])
@endsection

@push('js')

@endpush

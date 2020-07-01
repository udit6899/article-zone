@extends('layouts.backend.app')

@section('title', 'Show Post')

@push('css')

@endpush

@section('admin-post-approve')
    <button type="button" class="btn bg-cyan" onclick="approveItem('{{ $post->slug }}')">
        <i class="material-icons">donut_large</i>
        <span><strong>Approve</strong></span>
    </button>
    <form id="{{ 'approval-form-' . $post->slug }}" class="form-hide"
          action="{{ route('admin.post.approve', $post->slug) }}" method="POST">
        @csrf
        @method('PATCH')
    </form>
@endsection

@section('content')
    @include('common.base.post.show', ['prefix' => 'admin'])
@endsection

@push('js')

@endpush

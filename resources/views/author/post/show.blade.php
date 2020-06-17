@extends('layouts.backend.app')

@section('title', 'Show Post')

@push('css')

@endpush

@section('author-post-approve')
    <button type="button" class="btn btn-warning" style="cursor: auto;" readonly>
        <i class="material-icons">donut_large</i>
        <span><strong>Pending</strong></span>
    </button>
@endsection

@section('content')
    @include('common.base.post.show', ['prefix' => 'author'])
@endsection

@push('js')

@endpush

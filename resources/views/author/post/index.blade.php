@extends('layouts.backend.app')

@section('title', 'Article Post')

@push('css')

@endpush

@section('content')
    @include('common.base.post.index', ['prefix' => 'author'])
@endsection

@push('js')

@endpush

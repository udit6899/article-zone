@extends('layouts.backend.app')

@section('title', 'Edit Post')

@push('css')

@endpush

@section('content')
    @include('common.base.post.edit', ['prefix' => 'author'])
@endsection

@push('js')

@endpush

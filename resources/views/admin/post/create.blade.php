@extends('layouts.backend.app')

@section('title', 'Add Post')

@push('css')

@endpush

@section('content')
    @include('common.base.post.create', ['prefix' => 'admin'])
@endsection

@push('js')

@endpush

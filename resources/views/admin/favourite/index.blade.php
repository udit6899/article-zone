@extends('layouts.backend.app')

@section('title', 'Favourite Post')

@push('css')

@endpush

@section('content')
    @include('common.base.favourite.index', ['prefix' => 'admin'])
@endsection

@push('js')

@endpush

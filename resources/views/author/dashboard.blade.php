
<!--========================== extend-master-blade ==========================-->
@extends('layouts.backend.app')

@section('title', 'Dashboard')

@push('css')
@endpush

@section('content')
    @include('common.base.dashboard')
@endsection

@push('js')

@endpush

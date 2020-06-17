
<!--========================== extend-master-blade ==========================-->
@extends('layouts.backend.app')

@section('title', 'Settings')

<!--========================== include content ==========================-->
@section('content')
    @include('common.base.setting.settings', ['prefix' => 'admin'])
@endsection

@push('js')
    <script src="{{ asset('assets/backend/js/pages/examples/profile.js') }}"></script>
@endpush

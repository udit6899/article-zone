@extends('layouts.backend.app')

@section('title', 'Add Tag')

@push('css')

@endpush

@section('content')
    <!-- Vertical Layout | With Floating Label -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        ADD NEW TAG
                    </h2>
                </div>
                <div class="body">
                    <form action="{{ route('admin.tag.store') }}" method="post">
                        @csrf
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="tag_name" name='name' class="form-control" value="{{ old('name') }}">
                                <label class="form-label">Tag Name</label>
                            </div>
                        </div>
                        <a class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.tag.index') }}">BACK</a>

                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">SAVE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Vertical Layout | With Floating Label -->
@endsection

@push('js')

@endpush

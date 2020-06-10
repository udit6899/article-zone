@extends('layouts.backend.app')

@section('title', 'Edit Tag')

@push('css')

@endpush

@section('content')
<!-- Vertical Layout | With Floating Label -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    EDIT TAG
                </h2>
            </div>
            <div class="body">
                <form action="{{ route('admin.tag.update', $tag->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group form-float">
                        <div class="form-line {{ $errors->has('name') ? 'focused error' : '' }}">
                            <input type="text" id="tag_name" name='name' class="form-control" value="{{ old('name') ? old('name') : $tag->name }}">
                            <label class="form-label">Tag Name</label>
                        </div>
                    </div>
                    <a class="btn bg-deep-orange m-t-15 waves-effect" href="{{ route('admin.tag.index') }}">BACK</a>

                    <button type="submit" class="btn btn-info m-t-15 waves-effect">UPDATE</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Vertical Layout | With Floating Label -->
@endsection

@push('js')

@endpush

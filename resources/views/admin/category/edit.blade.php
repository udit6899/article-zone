@extends('layouts.backend.app')

@section('title', 'Edit Category')

@push('css')

@endpush

@section('content')
<!-- Vertical Layout | With Floating Label -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    EDIT CATEGORY
                </h2>
            </div>
            <div class="body">
                <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" id="category_name" name='name' class="form-control" value="{{ old('name') ? old('name') : $category->name }}">
                            <label class="form-label">Category Name</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea rows="3" class="form-control" name="description" id="category_description">{{ old('description') ? old('description') : $category->description }}</textarea>
                            <label class="form-label">Category Description</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="file" accept="image/*" id="category_image" name='image' class="form-control">
                    </div>
                    <a class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.category.index') }}">BACK</a>

                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Vertical Layout | With Floating Label -->
@endsection

@push('js')

@endpush

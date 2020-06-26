
<!--========================== extend-master-blade ==========================-->
@extends('layouts.backend.app')

@section('title', 'Dashboard')

@section('admin-activity')
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="info-box bg-grey hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">mail_outline</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL MESSAGES</div>
                    <div class="number count-to" data-from="0"
                         data-to="{{ $data['totalMessages'] }}" data-speed="1000" data-fresh-interval="20">
                    </div>
                </div>
            </div>
            <div class="info-box bg-pink hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">label_outline</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL TAGS</div>
                    <div class="number count-to"
                         data-from="0" data-to="{{ $allTags->count() }}" data-speed="1000" data-fresh-interval="20">
                    </div>
                </div>
            </div>
            <div class="info-box bg-lime hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">apps</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL CATEGORIES</div>
                    <div class="number count-to" data-from="0"
                         data-to="{{ $allCategories->count() }}" data-speed="1000" data-fresh-interval="20">
                    </div>
                </div>
            </div>
            <div class="info-box bg-brown hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">supervised_user_circle</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL AUTHORS</div>
                    <div class="number count-to" data-from="0"
                         data-to="{{ $data['totalAuthors'] }}" data-speed="1000" data-fresh-interval="20">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
            @include('common.base.post.popular-post', ['prefix' => 'admin'])
        </div>
    </div>
@endsection

@section('active-author')
    <div class="card">
        <div class="header">
            <h2>MOST ACTIVE AUTHORS</h2>
        </div>
        <div class="body">
            <div class="table-responsive">
                <table class="table table-hover dashboard-task-infos table-striped table-hover dataTable">
                    <thead class="bg-color-black-gray">
                    <tr>
                        <th>Rank</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Email</th>
                        <th>Posts</th>
                        <th>Comments</th>
                        <th>Created_At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($data['activeAuthors'] as $key => $author)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $author->name }}</td>
                            <td>
                                <img height="30px"
                                     alt="author-image" width="30px" src="{{ $author->imageUrl  }}">
                            </td>
                            <td>{{ $author->email }}</td>
                            <td>
                                <a  target="_blank"
                                    href="{{ route('post.author.profile', $author->id) }}">
                                    {{ $author->posts_count }}
                                </a>
                            </td>
                            <td>{{ $author->comments_count }}</td>
                            <td>{{ $author->created_at->toFormattedDateString() }}</td>
                            <td class="text-center">
                                <a class="btn btn-xs bg-info waves-effect"
                                        title="View" onclick="readAuthor({{ $author->toJson() }})">
                                    <i class="material-icons action-icon">visibility</i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr class="text-danger">
                            <td colspan="8">No active authors found !</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

<!--=== include content ====-->
@section('content')
    @include('common.base.dashboard')
@endsection

@push('js')

@endpush

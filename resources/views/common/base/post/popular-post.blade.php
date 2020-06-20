<!-- Popular post table include file -->
<div class="card">
    <div class="header">
        <h2>MOST POPULAR POSTS</h2>
    </div>
    <div class="body">
        <div class="table-responsive">
            <table class="table table-hover dashboard-task-infos">
                <thead class="bg-color-black-gray">
                <tr>
                    <th>Rank</th>
                    <th>Title</th>
                    @if(Auth::user()->is_admin)
                        <th>Author</th>
                    @else
                        <th>Created_At</th>
                        <th>Updated_At</th>
                    @endif
                    <th>Comments</th>
                    <th>Views</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($popularPosts as $key => $post)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ Str::limit($post->title, 15) }}</td>
                        @if(Auth::user()->is_admin)
                            <td>{{ $post->user->name }}</td>
                        @else
                            <td>{{ $post->created_date }}</td>
                            <td>{{ $post->updated_at->toFormattedDateString() }}</td>
                        @endif
                        <td>{{ $post->comments_count }}</td>
                        <td>{{ $post->view_count }}</td>
                        @if($post->is_published == true)
                            <td><span class="label bg-green">Published</span></td>
                            <td>
                                <a target="_blank" class="btn btn-xs bg-info waves-effect"
                                   title="View" href="{{ route("post.details", $post->slug) }}">
                                    <i class="material-icons action-icon">visibility</i>
                                </a>
                            </td>
                        @else
                            <td><span class="label bg-pink">Pending</span></td>
                            <td>
                                <a class="btn btn-xs bg-info waves-effect"
                                   title="View" href="{{ route("author.post.show", $post->id) }}">
                                    <i class="material-icons action-icon">visibility</i>
                                </a>
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

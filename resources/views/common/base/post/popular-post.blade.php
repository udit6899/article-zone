<!-- Popular post table include file -->
<div class="card">
    <div class="header">
        <h2>MOST POPULAR POSTS</h2>
    </div>
    <div class="body">
        <div class="table-responsive">
            <table class="table table-hover dashboard-task-infos table-striped table-hover dataTable">
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
                @forelse($data['popularPosts'] as $key => $post)
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
                        @else
                            <td><span class="label bg-pink">Pending</span></td>
                        @endif

                        <td>
                            <a class="btn btn-xs bg-info waves-effect" title="View"

                                @if($post->is_approved && $post->is_published)
                                    target="_blank" href="{{ $post->viewLink }}"
                                @else
                                    href="{{ route("$prefix.post.show", $post->id) }}"
                                @endif>
                                <i class="material-icons action-icon">visibility</i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr class="text-danger">
                        <td colspan="7">No active authors found !</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

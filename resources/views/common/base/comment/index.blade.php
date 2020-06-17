<!-- Base comment-index page -->
<div class="container-fluid">

    @hasSection('admin-comment-activities')
        @yield('admin-comment-activities')
    @endif
    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">

                @hasSection('admin-comment-header')
                    @yield('admin-comment-header')
                @else
                    @yield('author-comment-header')
                @endif

                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">

                            <thead class="bg-color-black-gray">
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Comment Info</th>
                                <th class="text-center">Post Info</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($comments as $key=>$comment)
                                <tr class="text-color-black">
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td class="text-left">
                                        <div class="media">
                                            <div class="media-left">
                                                <img class="media-object" height="54px" width="54px"
                                                     src="{{ Storage::disk('public')
                                                        ->url('users/' . $comment->user->avatar_path) }}">
                                            </div>
                                            <div class="media-body">
                                                <h5 class="media-heading">
                                                    {{ $comment->user->name }}
                                                    <small>
                                                        | {{ $comment->created_at->diffForHumans() }}
                                                    </small></h5>
                                                <p>{{ $comment->comment }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-left">
                                        <div class="media">
                                            <div class="media-left">
                                                <a target="_blank"
                                                   href="{{ route('post.details', $comment->post->slug) }}">
                                                    <img class="media-object" height="54px" width="84px"
                                                         src="{{ Storage::disk('public')
                                                                ->url('posts/' . $comment->post->image) }}">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <a target="_blank"
                                                   href="{{ route('post.details', $comment->post->slug) }}">
                                                    <h5 class="media-heading">
                                                        {{ Str::limit($comment->post->title, 20) }}
                                                    </h5>
                                                </a>
                                                <p>
                                                    By <small>{{ $comment->post->user->name }}</small>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        @if($comment->is_approved == true)
                                            <span class="badge bg-light-green ">approved</span>
                                        @else
                                            <span class="badge bg-pink">pending</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @hasSection('admin-comment-approve')
                                            @yield('admin-comment-approve')
                                        @endif
                                        <button type="button" class="btn btn-xs bg-cyan waves-effect"
                                                title="Edit" onclick="editComment({{ $comment->toJson() }})">
                                            <i class="material-icons action-icon">edit</i>
                                        </button>
                                        <form class="form-hide"
                                              action="{{ route("$prefix.comment.update", $comment->id) }}"
                                              id="{{ 'update-comment-' . $comment->id }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <textarea id="{{ 'comment-' . $comment->id }}" name="comment"></textarea>
                                        </form>
                                        <button type="button" class="btn btn-xs bg-deep-orange waves-effect"
                                                title="Delete" onclick="deleteItem({{ $comment->id }})">
                                            <i class="material-icons action-icon">delete</i>
                                        </button>
                                        <form class="form-hide"
                                              action="{{ route("$prefix.comment.destroy", $comment->id) }}"
                                              id="delete-form-{{ $comment->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Exportable Table -->
</div>

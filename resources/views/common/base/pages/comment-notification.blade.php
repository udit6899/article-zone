@component('mail::message')
    <h1>Hello, Admin !</h1>
    {!! $message_description !!}
    <br><br>
    <div class="row clearfix text-center">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="media">
                <div class="media-left float-left">
                    <img class="media-object" alt="post-image" src="{{ $comment->post->imageUrl }}">
                </div>
                <div class="media-body float-right">
                    <h5 class="media-heading">{{ $comment->post->title }}</h5>
                    <p>By <small>{{ $comment->post->user->name }}</small></p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="media">
                <div class="media-left float-left">
                    <img class="media-object" height="54px"
                         alt="comment-owner-image" width="54px" src="{{ $comment->user->imageUrl }}">
                </div>
                <div class="media-body pull-right">
                    <h5 class="media-heading">
                        {{ $comment->user->name }}
                        <small>
                            | {{ $comment->created_at }}
                        </small>
                    </h5>
                    <p><strong>Comment : </strong>{{ $comment->comment }}</p>
                </div>
            </div>
        </div>
    </div>
    <p>To approve the comment click on view button.</p>
@component('mail::button', ['url' => url(route('admin.comment.pending')) ])
View
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

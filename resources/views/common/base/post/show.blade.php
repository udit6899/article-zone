<!-- Base show-post page -->
<div class="row clearfix">
    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
        <div class="card">

            <div class="header" id="post-header">
                <h2>{{ $post->title }}</h2>
                <div class="address">
                    <a href="{{ route('post.author.profile', $post->user->id) }}">
                        <img src="{{ Storage::disk('public')->url('users/'.$post->user->avatar_path) }}"
                             class="img-responsive" align="left">
                        <small>
                            <strong>{{ $post->user->name }}</strong>
                        </small>
                    </a>
                    <small style="float: right;">
                        Posted on: <strong>{{ $post->created_date }}</strong>
                    </small>
                </div>
            </div>

            <div class="body">
                <div class="text-center">
                    <img  alt="post_image" class="img-responsive" width="100%"
                          src="{{ Storage::disk('public')->url("posts/$post->image") }}">
                </div>
                <div class="post-text read-more clearfix">
                    <div class="quote">
                        <p>
                            <i class="glyphicon glyphicon-grain"></i>
                            {{ $post->quote }}
                            <i class="glyphicon glyphicon-grain"></i>
                        </p>
                    </div>
                    <br>
                    {!! $post->body !!}
                </div>
            </div>

        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">

        <div class="card">
            <div class="header bg-cyan">
                <h2>
                    Categories
                </h2>
            </div>
            <div class="body">
                @foreach($post->categories as $category)
                    <span class="label bg-cyan font-11">{{ $category->name }}</span>
                @endforeach
            </div>
        </div>

        <div class="card">
            <div class="header bg-success">
                <h2>
                    Tags
                </h2>
            </div>
            <div class="body">
                @foreach($post->tags as $tag)
                    <span class="label bg-light-green font-11">{{ $tag->name }}</span>
                @endforeach
            </div>
        </div>

        <div class="text-center">
            <a @if(!is_null($prev))
                    href="{{ route("$prefix.post.show", $prev) }}"
               @else
                    {{ 'disabled' }}
               @endif
            class="btn bg-deep-orange">
                <i class="material-icons">keyboard_arrow_left</i>
            </a>

            @if($post->is_approved == true)
                <button type="button" class="btn btn-success" style="cursor: auto;" readonly>
                    <i class="material-icons">done_outline</i>
                    <span><strong>Approved</strong></span>
                </button>
            @else
               @hasSection('admin-post-approve')
                   @yield('admin-post-approve')
               @else
                   @yield('author-post-approve')
               @endif
            @endif

            <a @if(!is_null($next))
                    href="{{ route("$prefix.post.show", $next) }}"
               @else
                    {{ 'disabled' }}
               @endif
            class="btn bg-deep-orange">
                <i class="material-icons">keyboard_arrow_right</i>
            </a>
        </div>

    </div>
</div>

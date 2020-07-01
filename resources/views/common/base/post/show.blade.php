<!-- Base show-post page -->
<div class="row clearfix">
    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
        <div class="card">

            <div class="header" id="post-header">
                <h2>{{ $post->title }}</h2>
                <div class="address">
                    <a target="_blank" href="{{ $post->user->postsLink }}">
                        <img src="{{ $post->user->imageUrl }}"
                             alt="post-owner-image" class="img-responsive" align="left">
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
                          src="{{ Storage::disk('s3')->url("posts/slider/$post->image") }}">
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

       @if(Auth::user()->is_admin)
            <div class="card text-center">
                <div class="header bg-brown">
                    <h2>
                        Author's Details
                    </h2>
                </div>
                <div class="body">
                    <img src="{{ $post->user->imageUrl }}" alt="post-author-image">
                    <a target="_blank" href="{{ $post->user->postsLink }}">
                        <h4>{{ $post->user->name }}</h4>
                    </a>
                    <div>
                        <small>
                            <strong>Total Posts: </strong>
                            {{ $post->user->posts()->count() }} |
                            <strong>Since: </strong>
                            {{ $post->user->created_at->toFormattedDateString() }}
                        </small>
                    </div>
                </div>
            </div>
       @endif

       <div class="body text-center">
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
       <br>

       <div class="card text-center">
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

       <div class="card text-center">
           <div class="header bg-blue-grey">
               <h2>
                   Tags
               </h2>
           </div>
           <div class="body">
               @foreach($post->tags as $tag)
                   <span class="label bg-blue-grey font-11">{{ $tag->name }}</span>
               @endforeach
           </div>
       </div>
    </div>
</div>

<!-- Base random-post data -->
@if(!$randomPosts->isEmpty())
    <div class="recent-post-content clearfix text-center">
        <h4>You May Also Like</h4>
        @foreach($randomPosts as $randomPost)
            <div class="recent-post-single single-page">
                <div class="recent-post-img single-page">
                    <a href="{{ $randomPost->viewLink }}">
                        <img src="{{ $randomPost->imageUrl }}"
                             height="54px" alt="{{ $randomPost->title }}" width="54px">
                    </a>
                </div>
                <div class="recent-post-text single-page">
                    <span>{{ $randomPost->created_date }}</span>
                    <a href="{{ $randomPost->viewLink }}">
                        <p style="color: #0D0A0A">
                            {{ Str::limit($randomPost->title, 15) }}
                        </p>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endif

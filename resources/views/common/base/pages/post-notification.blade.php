@component('mail::message')
    <h1>Hello, Admin !</h1>
    {!! $message_description !!}
    <br>
    <div class="text-center">
        <p>Post Title : <strong> {{ $post->title }} </strong></p>
        <img src="{{ $post->imageUrl }}" alt="post-image">
        <p>To approve the post click on view button.</p>
    </div>
@component('mail::button', ['url' => url(route('admin.post.show', $post->slug)) ])
View
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

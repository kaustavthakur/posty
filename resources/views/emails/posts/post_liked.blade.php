@component('mail::message')
# Your Post was Liked

{{ $likedBy->name }} liked one of your posts.

@component('mail::button', ['url' => route('posts.show', $postLiked )])
View Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

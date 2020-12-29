@props(['post'=> $post])
<div class="mb-2">
    <a href="{{ route('user.profile', $post->user) }}" class="font-bold">{{ $post->user->name }}</a> <span class="text-sm text-gray-600">{{ $post->created_at->diffForHumans() }}</span>
    <p class="mb-2">{{ $post->body }}</p>
    {{-- 28-12-2020 --}}
    
    <div class="flex">
        @auth
        @if (!$post->likedBy(auth()->user()))
            <form action="{{ route('posts.likes', $post) }}" method="POST" class="mr-2">
                @csrf
                <button type="submit" class="text-blue-500">Like</button>
            </form>
        @else
            <form action="{{ route('posts.unlike', $post) }}" method="POST" class="mr-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-blue-500">Unlike</button>
            </form>
        @endif
        {{-- @if($post->ownedBy(auth()->user())) --}}
        @can('delete', $post)
        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="mr-2">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500">Delete</button>
        </form>
        @endcan
        {{-- @endif --}}
        @endauth
        @if($post->likes->count() > 0)
        <span>{{ $post->likes->count() }} {{ Str::plural('Like', $post->likes->count()) }} </span>
        @endif
    </div>
    

    {{-- End 28-12-2020 --}}
</div>
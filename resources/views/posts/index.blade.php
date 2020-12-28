@extends('layouts.app')

@section('title', 'Posty-Posts')
@section('content')
@auth
<div class="flex justify-center">
    <div class="w-6/12 p-6 bg-white rounded-lg">
        <form action="{{ route('posts') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="body" class="sr-only">Post Message</label>
                <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"" placeholder="Post your message" value="{{old('body')}}"></textarea>


                @error('body')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 rounded text-white font-medium px-6 py-3 float-right">Post</button>
        </form>
    </div>
</div>
@endauth
<div class="flex justify-center mt-6">
    <div class="w-6/12 p-6 bg-white rounded-lg">
        @if ($posts->count())
            @foreach ($posts as $post)
                <div class="mb-2">
                    <a href="" class="font-bold">{{ $post->user->name }}</a> <span class="text-sm text-gray-600">{{ $post->created_at->diffForHumans() }}</span>
                    <p class="mb-2">{{ $post->body }}</p>
                    {{-- 28-12-2020 --}}
                    
                    <div class="flex">
                        @if (!$post->likedBy(auth()->user()))
                            <form action="{{ route('posts.likes', $post) }}" method="POST" class="mr-2">
                                @csrf
                                <button type="submit" class="text-blue-500">Like</button>
                            </form>
                        @else
                            <form action="{{ route('posts.likes', $post) }}" method="POST" class="mr-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-blue-500">Unlike</button>
                            </form>
                        @endif
                        <span>{{ $post->likes->count() }} {{ Str::plural('Likes', $post->likes->count()) }} </span>
                    </div>
                    

                    {{-- End 28-12-2020 --}}
                </div>
            @endforeach
            {{ $posts->links() }}
        @else
            No posts found!
        @endif
    </div>
</div>

@endsection

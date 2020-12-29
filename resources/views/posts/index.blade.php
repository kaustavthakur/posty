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
                <x-post :post="$post" />
            @endforeach
            {{ $posts->links() }}
        @else
            No posts found!
        @endif
    </div>
</div>

@endsection

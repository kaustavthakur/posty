@extends('layouts.app')

@section('title', 'Posty-User Profile')
@section('content')
<div class="flex justify-center">
    
    <div class="w-6/12">
        <div class="p-6">
        <h1 class="text-2xl font-medium mb-1">{{ $user->name }}</h1>
        <p>Has {{ $posts->count() }} posts and {{ $user->receivedLikes->count() }} likes</p>
        </div>
        <div class="p-6 bg-white rounded-lg">
            @if ($posts->count())
                @foreach ($posts as $post)
                    <x-post :post="$post" />
                @endforeach
                {{ $posts->links() }}
            @else
                <p>{{ $user->name }} does not have any post</p>
            @endif
        </div>
        
    </div>
</div>
@endsection
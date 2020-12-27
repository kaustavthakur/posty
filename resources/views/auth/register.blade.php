@extends('layouts.app')

@section('title', 'Posty-Register')
@section('content')
<div class="flex justify-center">
    <div class="w-3/12 p-6 bg-white rounded-lg">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="sr-only">Name</label>
                <input type="text" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" id="name" name="name" placeholder="Your name" value="{{old('name')}}">

                @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="username" class="sr-only">Username</label>
                <input type="text" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror" id="username" name="username" placeholder="Username" value="{{old('username')}}">

                @error('username')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <input type="text" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror"" id="email" name="email" placeholder="Your email" value="{{old('email')}}">

                @error('email')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="sr-only">Password</label>
                <input type="password" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror" id="password" name="password" placeholder="Enter a password" value="">
                @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="sr-only">Password</label>
                <input type="password" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password_confirmation') border-red-500 @enderror" id="password_confirmation" name="password_confirmation" placeholder="Re-enter the password" value="">
                @error('password_confirmation')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="bg-blue-500 w-full rounded text-white font-medium px-4 py-3">Register</button>

        </form>
    </div>
</div>
@endsection

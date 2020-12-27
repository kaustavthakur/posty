@extends('layouts.app')

@section('title', 'Posty-Login')
@section('content')
<div class="flex justify-center">
    <div class="w-3/12 p-6 bg-white rounded-lg">
        @if (session('status'))
            <div class="rounded bg-red-400 text-white w-full p-2 mb-6 text-center">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
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
                <div class="flex justify-items-center">
                    <input type="checkbox" name="remember" id="remember" class="mr-2 mt-1">
                    <label for="remember">Remember Me</label>
                </div>
            </div>

            <button type="submit" class="bg-blue-500 w-full rounded text-white font-medium px-4 py-3">Login</button>

        </form>
    </div>
</div>
@endsection

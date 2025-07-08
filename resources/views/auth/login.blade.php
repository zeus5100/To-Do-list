@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-md">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-semibold mb-6 text-center">{{ __('Login') }}</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-gray-700 mb-1">{{ __('Email Address') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('email') border-red-500 @else border-gray-300 @enderror" />
                @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 mb-1">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" required autocomplete="current-password" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('password') border-red-500 @else border-gray-300 @enderror" />
                @error('password')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 flex items-center">
                <input type="checkbox" name="remember" id="remember" class="mr-2">
                <label for="remember" class="text-gray-700 select-none">{{ __('Remember Me') }}</label>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-indigo-600 hover:underline text-sm">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection

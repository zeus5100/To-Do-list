@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow">
    <h2 class="text-xl font-semibold mb-6">{{ __('Reset Password') }}</h2>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium mb-1">{{ __('Email Address') }}</label>
            <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autofocus class="w-full px-3 py-2 border rounded @error('email') border-red-500 @else border-gray-300 @enderror" />
            @error('email')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium mb-1">{{ __('Password') }}</label>
            <input id="password" type="password" name="password" required class="w-full px-3 py-2 border rounded @error('password') border-red-500 @else border-gray-300 @enderror" />
            @error('password')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password-confirm" class="block text-sm font-medium mb-1">{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password" name="password_confirmation" required class="w-full px-3 py-2 border border-gray-300 rounded" />
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
            {{ __('Reset Password') }}
        </button>
    </form>
</div>
@endsection

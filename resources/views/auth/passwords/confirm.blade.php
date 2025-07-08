@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow">
    <h2 class="text-xl font-semibold mb-6">{{ __('Confirm Password') }}</h2>

    <p class="mb-4">{{ __('Please confirm your password before continuing.') }}</p>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium mb-1">{{ __('Password') }}</label>
            <input id="password" type="password" name="password" required autocomplete="current-password" class="w-full px-3 py-2 border rounded @error('password') border-red-500 @else border-gray-300 @enderror" />
            @error('password')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition">
                {{ __('Confirm Password') }}
            </button>

            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">
                {{ __('Forgot Your Password?') }}
            </a>
            @endif
        </div>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="text-xl font-semibold mb-4">{{ __('Dashboard') }}</div>

        @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <p>{{ __('You are logged in!') }}</p>
    </div>
</div>
@endsection

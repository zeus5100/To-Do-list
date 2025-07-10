@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-md p-6">

        @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <div>
            <p class="text-lg text-gray-700 my-3 dark:text-gray-300">
                Jesteś zalogowany.
            </p>
        </div>
        <a href="{{ route('tasks.index') }}" class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-600/90 transition">
            Przejdź do zadań
        </a>

    </div>
</div>
@endsection

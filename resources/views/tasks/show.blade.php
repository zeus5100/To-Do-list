@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-3xl mt-10 p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-semibold mb-6">Szczegóły zadania</h1>

    <div class="mb-4">
        <span class="font-semibold">Nazwa:</span>
        <span>{{ $task->name }}</span>
    </div>

    <div class="mb-4">
        <span class="font-semibold">Priorytet:</span>
        <span class="capitalize">{{ $task->priority }}</span>
    </div>

    <div class="mb-4">
        <span class="font-semibold">Status:</span>
        <span class="capitalize">{{ str_replace('_', ' ', $task->status) }}</span>
    </div>

    <div class="mb-4">
        <span class="font-semibold">Termin wykonania:</span>
        <span>{{ \Carbon\Carbon::parse($task->completion_date)->format('Y-m-d') }}</span>
    </div>

    @if ($task->description)
    <div class="mb-4">
        <span class="font-semibold">Opis:</span>
        <p class="mt-1 whitespace-pre-line">{{ $task->description }}</p>
    </div>
    @endif

    <div class="mt-6 flex gap-x-4">
        <a href="{{ route('tasks.edit', $task) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edytuj</a>
        <a href="{{ route('tasks.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Powrót</a>
    </div>
</div>
@endsection

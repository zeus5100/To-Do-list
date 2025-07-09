@extends('layouts.app')

@section('content')
<div class="container max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">{{ $task->name }}</h1>
    <p><strong>Opis:</strong> {{ $task->description }}</p>
    <p><strong>Priorytet:</strong> {{ $task->priority }}</p>
    <p><strong>Status:</strong> {{ $task->status }}</p>
    <p><strong>Termin:</strong> {{ $task->completion_date }}</p>
</div>
@endsection

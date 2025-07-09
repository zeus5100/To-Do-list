@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-2xl mt-10 p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-semibold mb-6 text-center">Historia zadania: {{ $task->name }}</h1>

    <div class="border border-green-400 bg-green-50 rounded p-4 mb-8">
        <div class="font-semibold text-green-700 mb-2">Obecny stan</div>
        <table class="min-w-full table-auto border-collapse border border-gray-300 text-sm">
            <tbody>
                <tr>
                    <td class="border border-gray-300 px-3 py-1">Nazwa zadania</td>
                    <td class="border border-gray-300 px-3 py-1 whitespace-pre-wrap">{{ $task->name }}</td>
                </tr>
                <tr>
                    <td class="border border-gray-300 px-3 py-1">Opis</td>
                    <td class="border border-gray-300 px-3 py-1 whitespace-pre-wrap">{{ $task->description }}</td>
                </tr>
                <tr>
                    <td class="border border-gray-300 px-3 py-1">Status</td>
                    <td class="border border-gray-300 px-3 py-1 whitespace-pre-wrap">{{ $task->status }}</td>
                </tr>
                <tr>
                    <td class="border border-gray-300 px-3 py-1">Priorytet</td>
                    <td class="border border-gray-300 px-3 py-1 whitespace-pre-wrap">{{ $task->priority }}</td>
                </tr>
                <tr>
                    <td class="border border-gray-300 px-3 py-1">Termin</td>
                    <td class="border border-gray-300 px-3 py-1 whitespace-pre-wrap">{{ $task->completion_date }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    @if($history->isEmpty())
    <p class="text-center text-gray-500">Brak zapisanych wersji.</p>
    @else
    <div class="space-y-6">
        @foreach($history as $version)
        @php $snap = json_decode($version->snapshot, true) @endphp
        <div class="border border-gray-300 rounded p-4">
            <div class="flex justify-between items-center mb-2">
                <div class="font-semibold text-gray-700">
                    Wersja z: {{ date('Y-m-d H:i', strtotime($version->created_at)) }}
                </div>
            </div>
            <table class="min-w-full table-auto border-collapse border border-gray-300 text-sm">
                <tbody>
                    <tr>
                        <td class="border border-gray-300 px-3 py-1">Nazwa zadania</td>
                        <td class="border border-gray-300 px-3 py-1 whitespace-pre-wrap">{{ $snap['name'] ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 px-3 py-1">Opis</td>
                        <td class="border border-gray-300 px-3 py-1 whitespace-pre-wrap">{{ $snap['description'] ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 px-3 py-1">Status</td>
                        <td class="border border-gray-300 px-3 py-1 whitespace-pre-wrap">{{ $snap['status'] ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 px-3 py-1">Priorytet</td>
                        <td class="border border-gray-300 px-3 py-1 whitespace-pre-wrap">{{ $snap['priority'] ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 px-3 py-1">Termin</td>
                        <td class="border border-gray-300 px-3 py-1 whitespace-pre-wrap">{{ $task->completion_date }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endforeach
    </div>
    @endif

    <div class="mt-6 text-center">
        <a href="{{ route('tasks.index') }}" class="inline-block px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
            ← Powrót do zadań
        </a>
    </div>
</div>
@endsection

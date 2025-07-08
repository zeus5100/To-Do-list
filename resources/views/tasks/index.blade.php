@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-5xl mt-10 p-6 bg-white rounded shadow">
    <form method="GET" action="{{ route('tasks.index') }}" class="flex space-x-6 mb-6">
        <div>
            <label for="priority" class="block mb-1 font-semibold">Priorytet</label>
            <select name="priority" id="priority" class="border rounded px-3 py-2">
                <option value="">Wszystkie</option>
                @foreach(\App\Enums\Priority::cases() as $priority)
                <option value="{{ $priority->value }}" @selected(request('priority')==$priority->value)>{{ ucfirst($priority->value) }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="status" class="block mb-1 font-semibold">Status</label>
            <select name="status" id="status" class="border rounded px-3 py-2">
                <option value="">Wszystkie</option>
                @foreach(\App\Enums\Status::cases() as $status)
                <option value="{{ $status->value }}" @selected(request('status')==$status->value)>{{ ucfirst(str_replace('_', ' ', $status->value)) }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="date_from" class="block mb-1 font-semibold">Termin od</label>
            <input type="date" name="date_from" id="date_from" value="{{ request('date_from') }}" class="border rounded px-3 py-2" />
        </div>

        <div>
            <label for="date_to" class="block mb-1 font-semibold">Termin do</label>
            <input type="date" name="date_to" id="date_to" value="{{ request('date_to') }}" class="border rounded px-3 py-2" />
        </div>

        <div class="flex items-end gap-x-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Filtruj</button>
            <a href="{{ route('tasks.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Wyczyść</a>
        </div>
    </form>
    @if (session('success'))
    <div class="mb-4 px-4 py-2 bg-green-100 text-green-800 rounded">
        {{ session('success') }}
    </div>
    @endif
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Lista zadań</h1>
        <a href="{{ route('tasks.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            + Nowe zadanie
        </a>
    </div>


    <table class="min-w-full table-auto border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 px-4 py-2 text-left max-w-[200px]">Nazwa</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Priorytet</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Status</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Termin wykonania</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Akcje</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tasks as $task)
            <tr class="hover:bg-gray-50">
                <td class="border border-gray-300 px-4 py-2 max-w-[400px] break-words whitespace-normal">
                    {{ $task->name }}
                </td>
                <td class="border border-gray-300 px-4 py-2 capitalize">{{ $task->priority }}</td>
                <td class="border border-gray-300 px-4 py-2 capitalize">{{ str_replace('_', ' ', $task->status) }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ date('Y-m-d', strtotime($task->completion_date)) }}</td>
                <td class="border border-gray-300 px-4 py-2 space-x-2">
                    <a href="{{ route('tasks.show', $task) }}" class="text-green-600 hover:underline">Pokaż</a>
                    <a href="{{ route('tasks.edit', $task) }}" class="text-blue-600 hover:underline">Edytuj</a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline" onsubmit="return confirm('Na pewno usunąć?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Usuń</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center p-4 text-gray-500">Brak zadań.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-6">
        {{ $tasks->links() }}
    </div>
</div>
@endsection

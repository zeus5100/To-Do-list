@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-md mt-10 p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-semibold mb-6 text-center">Utwórz zadanie</h1>

    <form action="{{ route('tasks.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="name" class="block mb-1 font-medium text-gray-700">Nazwa zadania</label>
            <input type="text" name="name" id="name" maxlength="255" required class="w-full px-3 py-2 border rounded @error('name') border-red-500 @else border-gray-300 @enderror focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('name') }}">
            @error('name')<p class="mt-1 text-red-600 text-sm">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="description" class="block mb-1 font-medium text-gray-700">Opis</label>
            <textarea name="description" id="description" rows="4" class="w-full px-3 py-2 border rounded @error('description') border-red-500 @else border-gray-300 @enderror focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
            @error('description')<p class="mt-1 text-red-600 text-sm">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="priority" class="block mb-1 font-medium text-gray-700">Priorytet</label>
            <select name="priority" id="priority" required class="w-full px-3 py-2 border rounded @error('priority') border-red-500 @else border-gray-300 @enderror focus:outline-none focus:ring-2 focus:ring-blue-500">
                @foreach($priorities as $priority)
                <option value="{{ $priority->value }}" @selected(old('priority')==$priority->value)>
                    {{ ucfirst($priority->value) }}
                </option>
                @endforeach
            </select>
            @error('priority')<p class="mt-1 text-red-600 text-sm">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="status" class="block mb-1 font-medium text-gray-700">Status</label>
            <select name="status" id="status" required class="w-full px-3 py-2 border rounded @error('status') border-red-500 @else border-gray-300 @enderror focus:outline-none focus:ring-2 focus:ring-blue-500">
                @foreach($statuses as $status)
                <option value="{{ $status->value }}" @selected(old('status')==$status->value)>
                    {{ ucfirst(str_replace('_', ' ', $status->value)) }}
                </option>
                @endforeach
            </select>
            @error('status')<p class="mt-1 text-red-600 text-sm">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="completion_date" class="block mb-1 font-medium text-gray-700">Termin wykonania</label>
            <input type="date" name="completion_date" id="completion_date" required class="w-full px-3 py-2 border rounded @error('completion_date') border-red-500 @else border-gray-300 @enderror focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('completion_date') }}">
            @error('completion_date')<p class="mt-1 text-red-600 text-sm">{{ $message }}</p>@enderror
        </div>
        <div class="flex gap-x-2 justify-center">
            <button type="submit" class=" bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Utwórz
            </button>
            <a href="{{ route('tasks.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Powrót</a>
        </div>
    </form>
</div>
@endsection

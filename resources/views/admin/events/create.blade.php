@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-8 px-4">
    <h1 class="text-2xl font-bold mb-6">Créer un événement</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.events.store') }}" method="POST" class="space-y-4 bg-white shadow rounded p-6">
        @csrf

        <div>
            <label class="block font-medium mb-1">Titre</label>
            <input type="text" name="title" value="{{ old('title') }}" class="w-full border rounded p-2">
            @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-medium mb-1">Description</label>
            <textarea name="description" rows="4" class="w-full border rounded p-2">{{ old('description') }}</textarea>
            @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block font-medium mb-1">Date</label>
                <input type="date" name="event_date" value="{{ old('event_date') }}" class="w-full border rounded p-2">
                @error('event_date') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block font-medium mb-1">Heure</label>
                <input type="time" name="event_time" value="{{ old('event_time') }}" class="w-full border rounded p-2">
                @error('event_time') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label class="block font-medium mb-1">Lieu</label>
            <input type="text" name="location" value="{{ old('location') }}" class="w-full border rounded p-2">
            @error('location') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block font-medium mb-1">Prix (0 = gratuit)</label>
                <input type="number" step="0.01" min="0" name="price" value="{{ old('price', 0) }}" class="w-full border rounded p-2">
                @error('price') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block font-medium mb-1">Jauge max</label>
                <input type="number" min="1" name="capacity" value="{{ old('capacity') }}" class="w-full border rounded p-2">
                @error('capacity') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
            Créer l'événement
        </button>
    </form>
</div>
@endsection
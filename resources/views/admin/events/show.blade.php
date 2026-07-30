@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto py-8 px-4">
        <a href="{{ route('events.index') }}" class="text-blue-600 hover:underline text-sm">&larr; Retour aux événements</a>

        <div class="bg-white rounded-lg shadow-sm p-6 mt-4">
            <h1 class="text-2xl font-bold mb-2">{{ $event->title }}</h1>
            <p class="text-gray-700 mb-4">{{ $event->description }}</p>

            <div class="space-y-2 text-gray-600">
                <p>📅 {{ \Carbon\Carbon::parse($event->event_date)->format('d/m/Y') }} à
                    {{ \Carbon\Carbon::parse($event->event_time)->format('H:i') }}</p>
                <p>📍 {{ $event->location }}</p>
                <p>💰 {{ $event->price > 0 ? number_format($event->price, 2) . ' MAD' : 'Gratuit' }}</p>
                <p>🎟️ {{ $event->RemainingSeats() }} / {{ $event->capacity }} places restantes</p>
            </div>

            <div class="mt-6">
                @if ($event->RemainingSeats() == 0)
                    <span class="inline-block bg-red-100 text-red-700 px-4 py-2 rounded">Événement complet</span>
                @else
                    @if ($isRegistered)
                        <button disabled class="bg-gray-400 text-white px-4 py-2 rounded">

                            Déjà inscrit

                        </button>
                    @else
                        <form action="{{ route('reservations.store', $event) }}" method="POST">

                            @csrf

                            <button class="bg-blue-600 text-white px-4 py-2 rounded">

                                S'inscrire

                            </button>

                        </form>
                    @endif
                @endif
            </div>
        </div>
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded">

                {{ session('success') }}

            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded">

                {{ session('error') }}

            </div>
        @endif
    </div>
@endsection

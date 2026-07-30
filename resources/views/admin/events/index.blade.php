@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-8 px-4">
    <h1 class="text-2xl font-bold">Bienvenue sur BDE Events</h1>
    {{-- <p class="text-gray-600 mt-2">La liste des événements arrivera ici.</p> --}}
    <div class="max-w-6xl mx-auto py-8 px-4">
    <h1 class="text-2xl font-bold mb-6">Événements</h1>

    @if ($events->isEmpty())
        <p class="text-gray-600">Aucun événement pour le moment.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($events as $event)
                <a href="{{ route('events.show', $event) }}" class="bg-white rounded-lg shadow-sm hover:shadow-md transition p-5 block">
                    <h2 class="text-lg font-semibold mb-1">{{ $event->title }}</h2>
                    <p class="text-gray-600 text-sm mb-3">{{ Str::limit($event->description, 80) }}</p>

                    <div class="text-sm text-gray-500 space-y-1">
                        <p>📅 {{ \Carbon\Carbon::parse($event->event_date)->format('d/m/Y') }} à {{ \Carbon\Carbon::parse($event->event_time)->format('H:i') }}</p>
                        <p>📍 {{ $event->location }}</p>
                        <p>💰 {{ $event->price > 0 ? number_format($event->price, 2) . ' MAD' : 'Gratuit' }}</p>
                    </div>

                    <div class="mt-3">
                        @php $placesRestantes = $event->RemainingSeats(); @endphp

                        @if ($placesRestantes > 0)
                            <span class="inline-block bg-green-100 text-green-700 text-xs px-2 py-1 rounded">
                                {{ $placesRestantes }} places restantes
                            </span>
                        @else
                            <span class="inline-block bg-red-100 text-red-700 text-xs px-2 py-1 rounded">
                                Complet
                            </span>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
    @endif
</div>
</div>
@endsection



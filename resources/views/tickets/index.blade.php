@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">

Mes Billets

</h1>

@foreach($tickets as $ticket)

<div class="border rounded-lg p-6 mb-5 shadow">

    <h2 class="text-xl font-bold">

        {{ $ticket->reservation->event->title }}

    </h2>

    <p>

        <strong>Nom :</strong>

        {{ $ticket->reservation->user->name }}

    </p>

    <p>

        <strong>Date :</strong>

        {{ $ticket->reservation->event->event_date }}

    </p>

    <p>

        <strong>Heure :</strong>

        {{ $ticket->reservation->event->event_time }}

    </p>

    <p>

        <strong>Lieu :</strong>

        {{ $ticket->reservation->event->location }}

    </p>

    <p>

        <strong>Numéro :</strong>

        {{ $ticket->ticket_code }}

    </p>

</div>

@endforeach

@endsection

<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function store(Event $event)
    {
        $user = auth()->user();

        if (
            Reservation::where('user_id', $user->id)
                ->where('event_id', $event->id)
                ->exists()
        ) {
            return back()->with('error', 'Vous êtes déjà inscrit à cet événement.');
        }

        if ($event->reservations()->count() >= $event->capacity) {
            return back()->with('error', 'Cet événement est complet.');
        }

        Reservation::create([
            'user_id' => $user->id,
            'event_id' => $event->id,
        ]);

        return back()->with('success', 'Inscription effectuée avec succès.');
    }
}
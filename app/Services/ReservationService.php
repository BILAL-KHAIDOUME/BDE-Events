<?php

namespace App\Services;

use App\Models\Event;
use App\Models\Reservation;

/**
 * Class ReservationService.
 */
class ReservationService
{
    public function __construct(
        protected TicketService $ticketService
    ) {}

    public function reserve(Event $event): Reservation
    {
        $user = auth()->user();

        if (
            Reservation::where('user_id', $user->id)
                ->where('event_id', $event->id)
                ->exists()
        ) {
            throw new \Exception('Vous êtes déjà inscrit à cet événement.');
        }

        if ($event->reservations()->count() >= $event->capacity) {
            throw new \Exception('Cet événement est complet.');
        }

        $reservation = Reservation::create([
            'user_id' => $user->id,
            'event_id' => $event->id,
        ]);

        $this->ticketService->generate($reservation);

        return $reservation;
    }
}

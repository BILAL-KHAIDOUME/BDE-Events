<?php

namespace App\Services;

use App\Models\Reservation;
use App\Models\Ticket;
use Illuminate\Support\Str;

/**
 * Class TicketService.
 */
class TicketService
{
    public function generate(Reservation $reservation): Ticket
    {
        return Ticket::create([
            'reservation_id' => $reservation->id,
            'ticket_code' => $this->generateUniqueTicketCode(),
            'qr_code' => $this->generateUniqueTicketCode(),
        ]);
    }

    private function generateUniqueTicketCode(): string
    {
        do {
            $code = 'BDE-'.now()->year.'-'.strtoupper(Str::random(5));
        } while (Ticket::where('ticket_code', $code)->exists());

        return $code;
    }
}

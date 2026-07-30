<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Services\ReservationService;

class ReservationController extends Controller
{
    public function store(Event $event , ReservationService $reservationService) {
        try {

        $reservationService->reserve($event);

        return back()->with('success', 'Inscription effectuée avec succès.');

    } catch (\Exception $e) {

        return back()->with('error', $e->getMessage());

    }


    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with([
            'reservation.event',
            'reservation.user'
        ])
        ->whereHas('reservation' , function ($query) {
            $query->where('user_id' , auth()->id());
        })
        ->get();

        return view('tickets.index', compact('tickets'));
    }
}

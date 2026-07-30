<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EventsRequest;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::orderBy('event_date', 'desc')->withCount('reservations')->get();

        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventsRequest $request)
    {
        $validated = $request->validated();

        Event::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'event_date' => $validated['event_date'],
            'event_time' => $validated['event_time'],
            'location' => $validated['location'],
            'price' => $validated['price'],
            'capacity' => $validated['capacity'],
            'user_id' => auth()->id(),

        ]);

        $eventDateTime = Carbon::parse(
            $request->event_date.' '.$request->event_time
        );

        if ($eventDateTime <= now()) {
            return back()->withErrors([
                'event_date' => 'The event must be scheduled in the future.',
            ]);
        }

        return redirect()
            ->route('events.index')
            ->with('success', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        $isRegistered = auth()->check()
    ? $event->reservations()
        ->where('user_id', auth()->id())
        ->exists()
    : false;

        return view('admin.events.show', compact('event', 'isRegistered'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Show all events.
     */
    public function index()
    {
        $events = Event::orderBy('start_time', 'asc')->paginate(10);
        return view('create-events.index', compact('events'));
    }

    /**
     * Show the create event form.
     */
    public function create()
    {
        return view('create-events.create');
    }

    /**
     * Store a new event.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_time' => 'required|date',
            'end_time' => 'nullable|date|after_or_equal:start_time',
            'max_people' => 'nullable|integer|min:1',
            'price' => 'required|numeric|min:0',
            'location' => 'nullable|string|max:255',
            'is_public' => 'boolean',
            'requires_verification' => 'boolean',
            'image_path' => 'nullable|url',
        ]);

        Event::create($validated);

        return redirect()->route('create-events.index')->with('success', 'Event created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

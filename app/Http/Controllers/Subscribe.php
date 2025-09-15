<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Auth;
use Illuminate\Http\Request;

class Subscribe extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            $events = Event::orderBy('start_time', 'asc')
                ->paginate(9); // adjust per page as needed

            return view('events.index', compact('events'));
        }
        else{
            return view('auth.login');
        }
    }

    /**
     * Show the signup (create) form for a single event.
     * We'll implement this page in the next step.
     */
    public function create(Event $event)
    {
        if (Auth::check()) {
            $events = Event::orderBy('start_time', 'asc')
                ->paginate(9); // adjust per page as needed

            return view('events.create', compact('events'));
        }
        else{
            return view('auth.login');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Event $event)
    {
        if (Auth::check()) {
            $user = auth()->user();

            // Check if event is full
            if ($event->isFull()) {
                return back()->with('error', 'This event is already full.');
            }

            // Check if event requires verification
            if ($event->requires_verification && !$user->hasVerifiedEmail()) {
                return back()->with('error', 'You must verify your email before signing up.');
            }

            // Attach user to event (will fail if already signed up because of unique constraint)
            try {
                $event->users()->attach($user->id, [
                    'status' => 'going',
                    'signed_up_at' => now(),
                ]);
            } catch (\Illuminate\Database\QueryException $e) {
                return back()->with('error', 'You are already signed up for this event.');
            }

            return redirect()->route('events.index')->with('success', 'You have successfully signed up for the event.');
        }
        else{
            return view('auth.login');
        }
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

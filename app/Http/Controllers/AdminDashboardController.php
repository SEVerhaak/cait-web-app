<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Get the 2 soonest upcoming events
        $events = Event::orderBy('start_time', 'asc')
            ->take(2)
            ->get();

        // Get all users
        $users = User::all();

        return view('admin.dashboard', compact('events', 'users'));
    }
}

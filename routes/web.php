<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Subscribe;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/events', [Subscribe::class, 'index'])->name('events.index');
Route::get('/events/{event}/signup', [Subscribe::class, 'create'])->name('events.create');
Route::post('/events/{event}/signup', [Subscribe::class, 'store'])->name('events.store');


Route::get('/create-events', [EventController::class, 'index'])->name('create-events.index');
Route::get('/create-events/create', [EventController::class, 'create'])->name('create-events.create');
Route::post('/create-events', [EventController::class, 'store'])->name('create-events.store');


Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin-dashboard');
});

Route::get('/dashboard', function () {
    $user = Auth::user();

    // Get events the user has signed up for
    $events = $user->events()->orderBy('start_time', 'asc')->get();

    return view('dashboard', compact('events'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

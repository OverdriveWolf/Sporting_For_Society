<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/', [EventController::class, 'index'])->name('events.index');

// 1. Specific static routes MUST come FIRST
Route::middleware(['auth'])->group(function () {
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create'); // MUST BE ABOVE {event}
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::post('/events/{event}/register', [EventController::class, 'toggleRegistration'])->name('events.register');
});

// 2. Dynamic parameter routes MUST come AFTER
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
require __DIR__.'/auth.php';

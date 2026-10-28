<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\OrganizerDashboardController;

/*
|--------------------------------------------------------------------------
| Public Routes (Viewable by All, including Guests)
|--------------------------------------------------------------------------
*/
Route::get('/', [EventController::class, 'index'])->name('events.index');

Route::get('/homepage', function () {
    return view('homepage.index');
})->name('homepage.index');
/*
|--------------------------------------------------------------------------
| Guest-Only Routes
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    Route::get('/login', [LoginController::class, 'showRegistrationForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes (Logged-in Users Only)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Organizer Dedicated Management Panel
    Route::prefix('organizer')->name('organizer.')->group(function () {
        Route::get('/dashboard', [OrganizerDashboardController::class, 'index'])->name('dashboard');
    });

    // Security & Password Updates
    Route::put('/password', [PasswordController::class, 'update'])->name('password.update');

    // Dashboard Redirection
    Route::get('/dashboard', function () {
        return redirect()->intended('/');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'index'])
        ->name('profile.index');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::post('/profile/become-organizer', [ProfileController::class, 'makeOrganizer'])
        ->name('profile.become-organizer');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // Event Participation (REQ-03)
    Route::post('/events/{event}/register', [EventController::class, 'toggleRegistration'])
        ->name('events.register');

    /*
    |--------------------------------------------------------------------------
    | Organizer-Only Routes (REQ-09)
    |--------------------------------------------------------------------------
    */
    Route::middleware('organizer')->group(function () {
        Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
        Route::post('/events', [EventController::class, 'store'])->name('events.store');
        Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
        Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
        Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
    });
});

/*
|--------------------------------------------------------------------------
| Dynamic Parameter Routes (MUST come last to avoid route conflicts)
|--------------------------------------------------------------------------
*/
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
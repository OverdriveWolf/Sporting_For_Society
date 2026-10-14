<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Event;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form / dashboard.
     */
    public function index(Request $request)
    {
        $user = $request->user();

        // Fetch upcoming registered events via the defined registeredEvents() relation
        $registeredEvents = $user->registeredEvents()
            ->where('event_date', '>=', now())
            ->with(['category', 'participants'])
            ->get();

        // Fallback for saved events if relationship isn't created yet (e.g., getting latest active events)
        $savedEvents = Event::with(['category', 'participants'])
            ->take(2)
            ->get();

        // Past activity history based on past registered events
        $activityHistory = $user->registeredEvents()
            ->where('event_date', '<', now())
            ->with('category')
            ->latest('event_date')
            ->take(5)
            ->get();

        // Dynamic badge/achievement collection
        $achievements = collect([
            (object)[
                'title' => 'First Event',
                'description' => 'Attended your first matchup'
            ],
            (object)[
                'title' => '10 Events Attended',
                'description' => 'Solid local presence built'
            ],
            (object)[
                'title' => '5 Different Sports',
                'description' => 'Tried 5 athletic disciplines'
            ],
            (object)[
                'title' => 'Community Leader',
                'description' => 'Hosted 3 successful meetups'
            ]
        ]);

        return view('profile.index', compact('user', 'registeredEvents', 'savedEvents', 'activityHistory', 'achievements'));
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function makeOrganizer(Request $request)
    {
        $organizerRole = Role::whereRaw('LOWER(name) = ?', ['organizer'])->first();

        if ($organizerRole) {
            $request->user()->update([
                'role_id' => $organizerRole->id,
            ]);

            return back()->with('success', 'You are now an Event Organizer! You can now create new events.');
        }

        return back()->with('error', 'Organizer role could not be found.');
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
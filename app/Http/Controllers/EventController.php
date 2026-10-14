<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        $query = Event::with(['organizer', 'category', 'participants']);

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('location', 'like', '%' . $request->search . '%');
            });
        }

        $events = $query->orderBy('event_date', 'asc')->get();

        return view('events.index', compact('events', 'categories'));
    }

    /**
     * Display details for a single event.
     */
    public function show(Event $event)
    {
        $event->load(['organizer', 'category', 'participants']);
        return view('events.show', compact('event'));
    }

    /**
     * Show form to create a new event.
     */
    public function create()
    {
        $categories = Category::all();
        return view('events.create', compact('categories'));
    }

    /**
     * Store a newly created event in SQLite database.
     * Fulfills REQ-04, REQ-05 & REQ-10 (CRUD, Persistence, Form Validation)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'max_participants' => ['required', 'integer', 'min:2', 'max:100'],
            'event_date' => ['required', 'date', 'after:now'],
            'location' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'min:5'],
            'status' => 'required|in:ACTIVE,COMPLETED,CANCELLED,DRAFT',
        ]);

        $validated['organizer_id'] = Auth()->id();

        $request->user()->organizedEvents()->create($validated);

        return redirect()->route('events.index')->with('success', 'Event created successfully!');
    }

    public function toggleRegistration(Event $event)
    {
        $user = Auth::user();

        // 1. If user is already registered, allow them to cancel
        if ($event->participants()->where('user_id', $user->id)->exists()) {
            $event->participants()->detach($user->id);
            return back()->with('success', 'You have successfully cancelled your registration.');
        }

        // 2. Prevent sign-up if the event has reached max capacity
        if ($event->isFull()) {
            return back()->with('error', 'Sorry, this event is already full.');
        }

        // 3. Attach user to the event pivot table
        $event->participants()->attach($user->id);

        return back()->with('success', 'You are now registered for this event!');
    }

    public function edit(Event $event)
    {
        // Ensure only the event organizer can edit
        if ($event->organizer_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $categories = Category::all();

        return view('events.edit', compact('event', 'categories'));
    }

    /**
     * Update the specified event in storage.
     */
    public function update(Request $request, Event $event)
    {
        if ($event->organizer_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'max_participants' => ['required', 'integer', 'min:2', 'max:100'],
            'event_date' => ['required', 'date'],
            'location' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'status' => 'required|in:ACTIVE,COMPLETED,CANCELLED,DRAFT',
        ]);

        $event->update($validated);

        return redirect()->route('organizer.dashboard')->with('success', 'Event updated successfully!');
    }

    /**
     * Remove the specified event from storage.
     */
    public function destroy(Event $event)
    {
        if ($event->organizer_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $event->delete();

        return redirect()->route('organizer.dashboard')->with('success', 'Event deleted successfully!');
    }
}
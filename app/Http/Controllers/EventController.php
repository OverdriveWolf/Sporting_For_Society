<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $categories = \App\Models\Category::all();

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
        

        $event->load(['organizer', 'participants']);
        return view('events.show', compact('event'));
    }
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created event in SQLite database.
     * Fulfills REQ-04, REQ-05 & REQ-10 (CRUD, Persistence, Form Validation)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'sport' => 'required|string',
            'location' => 'required|string|max:255',
            'start_time' => 'required|date|after:now',
            'max_athletes' => 'required|integer|min:2|max:100',
            'description' => 'required|string|min:10',
        ]);

        // Attach authenticated user as event host/organizer (REQ-09)
        $validated['user_id'] = Auth::id();
        $validated['status'] = 'active';

        Event::create($validated);

        return redirect()->route('events.index')
            ->with('success', 'Sports event created successfully!');
    }


    public function toggleRegistration(Event $event)
    {
        $user = Auth::user();

        // Check if user is already registered
        if ($event->participants->contains($user->id)) {
            $event->participants()->detach($user->id);
            $message = 'You have successfully unregistered from this event.';
        } else {
            // Check capacity limit
            if ($event->participants()->count() >= $event->max_athletes) {
                return back()->with('error', 'This event is already full.');
            }

            $event->participants()->attach($user->id);
            $message = 'You are registered for ' . $event->title . '!';
        }

        return back()->with('success', $message);
    }
}


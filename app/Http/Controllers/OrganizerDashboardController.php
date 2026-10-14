<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;

class OrganizerDashboardController extends Controller
{
    public function index()
    {
        // Query by 'organizer_id'
        $managedEvents = Event::where('organizer_id', auth()->id())
            ->with('category')
            ->withCount('participants')
            ->latest('event_date')
            ->get();

        $categories = Category::all();
        $totalEvents = $managedEvents->count();
        $activeParticipants = $managedEvents->sum('participants_count');

        return view('organizer.dashboard', compact(
            'managedEvents',
            'categories',
            'totalEvents',
            'activeParticipants'
        ));
    }
}

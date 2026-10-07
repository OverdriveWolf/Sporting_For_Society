@extends('layouts.app')

@section('content')
<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom: 1.5rem;">
    <h2>UPCOMING EVENTS IN BROOKLYN</h2>
    @auth
        <a href="{{ route('events.create') }}" class="btn">+ Create Event</a>
    @endauth
</div>

<!-- Search & Category Filters (REQ-08) -->
<form method="GET" action="{{ route('events.index') }}" style="display:flex; gap:0.75rem; margin-bottom: 2rem;">
    <input type="text" name="search" placeholder="Search by event title or location..." value="{{ request('search') }}" style="flex:1; padding:0.6rem; border:1px solid #cbd5e1; border-radius:6px;">
    
    <select name="category_id" style="padding:0.6rem; border:1px solid #cbd5e1; border-radius:6px; background:#fff;">
        <option value="">All Categories</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    
    <button type="submit" class="btn">Filter</button>
</form>

<!-- Events Card Grid -->
<div class="grid">
    @forelse($events as $event)
        <div class="card" style="display:flex; flex-direction:column; justify-content:space-between;">
            <div>
                <span class="badge" style="text-transform:uppercase; letter-spacing:0.5px;">{{ $event->category->name }}</span>
                <h3 style="margin: 0.75rem 0 0.25rem 0;">{{ $event->title }}</h3>
                <p style="color:#2563eb; font-weight:600; font-size:0.9rem; margin:0 0 0.75rem 0;">
                    🕒 {{ $event->event_date->format('l, g:i A') }}
                </p>
                <p style="color:#64748b; font-size:0.875rem; margin:0.25rem 0;">
                    📍 {{ $event->location }}<br>
                    👤 Hosted by <strong>{{ $event->organizer->name ?? 'Community Host' }}</strong>
                </p>
            </div>

            <div style="margin-top:1.5rem; padding-top:1rem; border-top:1px solid #f1f5f9; display:flex; justify-content:space-between; align-items:center;">
                <span style="font-size:0.85rem; color:#475569;">
                    Spots Filled: <strong>{{ $event->participants->count() }}/{{ $event->max_participants }}</strong>
                </span>
                <a href="{{ route('events.show', $event) }}" class="btn btn-outline" style="font-size:0.85rem;">Register</a>
            </div>
        </div>
    @empty
        <p style="grid-column: 1/-1; text-align:center; color:#64748b; padding: 3rem 0;">
            No events found matching your search.
        </p>
    @endforelse
</div>
@endsection
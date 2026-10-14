@extends('layouts.app')

@section('content')
<!-- Filter & Navigation Bar -->
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <form method="GET" action="{{ route('events.index') }}" style="display: flex; gap: 0.5rem; align-items: center; flex: 1; max-width: 600px;">
        <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}" style="padding: 0.5rem 0.75rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.9rem; width: 220px;">
        
        <select name="category_id" style="padding: 0.5rem 0.75rem; border: 1px solid #cbd5e1; border-radius: 6px; background: #fff; font-size: 0.9rem;">
            <option value="">All Categories</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        
        <button type="submit" style="background: #0f172a; color: #fff; padding: 0.5rem 1rem; border-radius: 6px; font-weight: 600; border: none; cursor: pointer; font-size: 0.875rem;">Filter</button>
    </form>

    @auth
        <a href="{{ route('events.create') }}"
                   style="background-color: #000; color: #ccff00; font-size: 11px; font-weight: 900; text-transform: uppercase; letter-spacing: 0.05em; padding: 0.625rem 1.25rem; border-radius: 10px; text-decoration: none; display: inline-flex; align-items: center; gap: 0.25rem;">
                    + CREATE NEW EVENT
                </a>
    @endauth
</div>

<!-- Main Layout Grid (3-Column Events Grid Left, Sidebar Right) -->
<div style="display: grid; grid-template-columns: 1fr 280px; gap: 1.75rem; align-items: start;">

    <!-- Left Column: 3-Column Cards Grid -->
    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.25rem;">
        <div style="grid-column: 1 / -1; margin-bottom: 0.25rem;">
            <h2 style="font-family: 'Impact', 'Arial Black', sans-serif; font-size: 1.35rem; letter-spacing: 0.5px; margin: 0; color: #0f172a; text-transform: uppercase;">
                UPCOMING EVENTS IN BROOKLYN
            </h2>
        </div>

        @forelse($events as $event)
            <div style="background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; overflow: hidden; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 1px 3px rgba(0,0,0,0.04);">
                
                <!-- Event Image Banner -->
                <div style="height: 125px; background: #1e293b; position: relative; overflow: hidden;">
                    @if(isset($event->image_url) && $event->image_url)
                        <img src="{{ $event->image_url }}" alt="{{ $event->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                    @else
                        <div style="display: flex; align-items: center; justify-content: center; height: 100%; color: #94a3b8; font-size: 0.75rem; font-weight: 700; text-transform: uppercase;">
                            {{ $event->category->name ?? 'Sport' }}
                        </div>
                    @endif
                </div>

                <!-- Card Content -->
                <div style="padding: 0.85rem; display: flex; flex-direction: column; flex: 1; justify-content: space-between;">
                    <div>
                        <!-- Sport Category Pill Tag -->
                        <span style="display: inline-block; background: #d9f99d; color: #1a2e05; padding: 0.15rem 0.45rem; border-radius: 3px; font-size: 0.6rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.4rem;">
                            {{ $event->category->name ?? 'SPORT' }}
                        </span>

                        <!-- Event Title -->
                        <h3 style="font-family: 'Impact', 'Arial Black', sans-serif; margin: 0 0 0.4rem 0; font-size: 0.9rem; letter-spacing: 0.3px; color: #0f172a; text-transform: uppercase; line-height: 1.15; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                            {{ $event->title }}
                        </h3>
                        
                        <!-- Date & Time -->
                        <div style="display: flex; align-items: center; gap: 0.3rem; color: #475569; font-size: 0.725rem; font-weight: 600; margin-bottom: 0.2rem;">
                            <span>📅</span> <span>{{ $event->event_date->format('l, g:i A') }}</span>
                        </div>

                        <!-- Location -->
                        <div style="display: flex; align-items: center; gap: 0.3rem; color: #64748b; font-size: 0.725rem; margin-bottom: 0.4rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            <span>📍</span> <span>{{ $event->location }}</span>
                        </div>

                        <!-- Organizer -->
                        <div style="display: flex; align-items: center; gap: 0.3rem; color: #64748b; font-size: 0.7rem; margin-bottom: 0.75rem;">
                            <span>👤</span> <span>Hosted by <strong>{{ $event->organizer->name ?? 'Community Host' }}</strong></span>
                        </div>
                    </div>

                    <div>
                        <!-- Spots Progress Header -->
                        <div style="display: flex; justify-content: space-between; align-items: center; font-size: 0.65rem; font-weight: 800; color: #475569; text-transform: uppercase; margin-bottom: 0.25rem;">
                            <span>Spots Filled</span>
                            <span>{{ $event->participants->count() }}/{{ $event->max_participants }}</span>
                        </div>
                        
                        <!-- Spots Progress Bar -->
                        <div style="width: 100%; background: #e2e8f0; height: 5px; border-radius: 3px; overflow: hidden; margin-bottom: 0.65rem;">
                            @php
                                $percentage = $event->max_participants > 0 ? min(100, ($event->participants->count() / $event->max_participants) * 100) : 0;
                            @endphp
                            <div style="width: {{ $percentage }}%; background: #a3e635; height: 100%;"></div>
                        </div>

                        <!-- Register Action Button -->
                        <a href="{{ route('events.show', $event) }}" style="display: block; width: 100%; background: #0f172a; color: #a3e635; text-align: center; padding: 0.5rem 0; border-radius: 6px; font-family: 'Arial Black', sans-serif; font-size: 0.75rem; font-weight: 900; text-decoration: none; text-transform: uppercase; letter-spacing: 0.5px;">
                            Register
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <p style="grid-column: 1/-1; text-align: center; color: #64748b; padding: 3rem 0;">
                No events found matching your filter criteria.
            </p>
        @endforelse
    </div>

    <!-- Right Column: Sidebar -->
    <div style="display: flex; flex-direction: column; gap: 1.25rem; margin-top: 2rem;">
        
        <!-- Upcoming My Events Card -->
        <div style="background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 1rem;">
            <h4 style="font-family: 'Impact', 'Arial Black', sans-serif; margin: 0 0 0.85rem 0; font-size: 0.85rem; letter-spacing: 0.5px; text-transform: uppercase; color: #0f172a;">
                UPCOMING MY EVENTS
            </h4>
            
            <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                <div style="display: flex; align-items: center; gap: 0.6rem; padding-bottom: 0.6rem; border-bottom: 1px solid #f1f5f9;">
                    <div style="width: 32px; height: 32px; background: #334155; border-radius: 6px; flex-shrink: 0;"></div>
                    <div>
                        <div style="font-size: 0.75rem; font-weight: 800; color: #0f172a;">Weekend Clay Singles</div>
                        <div style="font-size: 0.675rem; color: #64748b;">Today, 6:00 PM</div>
                    </div>
                </div>
                
                <div style="display: flex; align-items: center; gap: 0.6rem;">
                    <div style="width: 32px; height: 32px; background: #334155; border-radius: 6px; flex-shrink: 0;"></div>
                    <div>
                        <div style="font-size: 0.75rem; font-weight: 800; color: #0f172a;">Metro Elite League Match</div>
                        <div style="font-size: 0.675rem; color: #64748b;">Aug 28, 8:00 PM</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Suggested For You Card -->
        <div style="background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 1rem;">
            <h4 style="font-family: 'Impact', 'Arial Black', sans-serif; margin: 0 0 0.85rem 0; font-size: 0.85rem; letter-spacing: 0.5px; text-transform: uppercase; color: #0f172a;">
                SUGGESTED FOR YOU
            </h4>

            <div style="display: flex; flex-direction: column; gap: 0.85rem;">
                <div>
                    <div style="font-size: 0.75rem; font-weight: 800; color: #0f172a;">Fast-paced 5v5 Soccer</div>
                    <div style="font-size: 0.7rem; color: #64748b; margin-top: 0.1rem;">McCarren Turf • 4 spots left</div>
                    <div style="font-size: 0.625rem; font-weight: 800; color: #16a34a; text-transform: uppercase; margin-top: 0.2rem;">Matches your skill (Level 3)</div>
                </div>

                <div style="border-top: 1px solid #f1f5f9; padding-top: 0.6rem;">
                    <div style="font-size: 0.75rem; font-weight: 800; color: #0f172a;">Advanced Tennis Round-Robin</div>
                    <div style="font-size: 0.7rem; color: #64748b; margin-top: 0.1rem;">Prospect Park Courts • 1 spot left</div>
                    <div style="font-size: 0.625rem; font-weight: 800; color: #2563eb; text-transform: uppercase; margin-top: 0.2rem;">Popular near your location</div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
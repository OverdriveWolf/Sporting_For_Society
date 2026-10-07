@extends('layouts.app')

@section('content')
    <div style="background: #fff; padding: 2rem; border-radius: 8px; border: 1px solid #e2e8f0;">
        <div style="display:flex; justify-size: space-between; align-items: flex-start; margin-bottom: 1rem;">
            <div>
                <span class="badge" style="text-transform: uppercase;">{{ $event->sport }} • MATCH MAKING</span>
                <h1 style="margin: 0.5rem 0 0.25rem 0;">{{ $event->title }}</h1>
                <p style="color: #64748b; margin: 0;">Hosted by
                    <strong>{{ $event->organizer->name ?? 'Marcus Vance' }}</strong></p>
            </div>

            @auth
                <form action="{{ route('events.register', $event) }}" method="POST">
                    @csrf
                    @if($event->participants->contains(auth()->id()))
                        <button type="submit" class="btn" style="background: #dc2626;">Cancel Registration</button>
                    @elseif($event->participants->count() >= $event->max_athletes)
                        <button class="btn" style="background: #94a3b8;" disabled>Event Full</button>
                    @else
                        <button type="submit" class="btn">Register for Event</button>
                    @endif
                </form>
            @else
                <a href="{{ route('login') }}" class="btn">Log in to Register</a>
            @endauth
        </div>

        <hr style="border: 0; border-top: 1px solid #e2e8f0; margin: 1.5rem 0;">

        <!-- Grid Details -->
        <div
            style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 1.5rem;">
            <div>
                <strong style="color: #64748b; font-size: 0.85rem; text-transform: uppercase;">Date & Time</strong>
                <!-- Line 34 in show.blade.php -->
                <p style="margin: 0.25rem 0 0 0; font-weight: 600;">
                    {{ $event->event_date ? $event->event_date->format('l, M j • g:i A') : 'TBD' }}
                </p>
            </div>
            <div>
                <strong style="color: #64748b; font-size: 0.85rem; text-transform: uppercase;">Location</strong>
                <p style="margin: 0.25rem 0 0 0; font-weight: 600;">{{ $event->location }}</p>
            </div>
            <div>
                <strong style="color: #64748b; font-size: 0.85rem; text-transform: uppercase;">Capacity</strong>
                <p style="margin: 0.25rem 0 0 0; font-weight: 600;">{{ $event->participants->count() }} of
                    {{ $event->max_athletes }} spots filled</p>
            </div>
        </div>

        <!-- Session Information -->
        <h3>About the session</h3>
        <p style="color: #334155; line-height: 1.6;">{{ $event->description }}</p>

        <!-- Participants Listing -->
        <h3 style="margin-top: 2rem;">Participants ({{ $event->participants->count() }}/{{ $event->max_athletes }})</h3>
        <div style="display: flex; gap: 0.75rem; flex-wrap: wrap;">
            @forelse($event->participants as $participant)
                <span
                    style="background: #f1f5f9; padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.875rem; font-weight: 500;">
                    👤 {{ $participant->name }}
                </span>
            @empty
                <p style="color: #64748b;">No athletes registered yet. Be the first to join!</p>
            @endforelse
        </div>
    </div>
@endsection
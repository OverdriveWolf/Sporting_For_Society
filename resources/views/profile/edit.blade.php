@extends('layouts.app')

@section('content')
<div style="max-width: 800px; margin: 0 auto; padding: 1rem 0;">
    <h1 style="font-size: 1.875rem; font-weight: 700; color: #0f172a; margin-bottom: 1.5rem;">
        Account Settings
    </h1>

    <!-- 1. Profile Information Form -->
    @include('profile.partials.update-profile-information-form')

    <!-- 2. Update Password Form -->
    @include('profile.partials.update-password-form')

    <!-- 3. Become an Organizer Upgrade Section -->
    @if(! auth()->user()->isOrganizer())
        <section style="background: #f0fdf4; padding: 1.5rem; border-radius: 8px; border: 1px solid #bbf7d0; margin-bottom: 1.5rem;">
            <header style="margin-bottom: 1rem;">
                <h2 style="font-size: 1.125rem; font-weight: 600; color: #166534; margin: 0 0 0.25rem 0;">
                    Become an Event Organizer
                </h2>
                <p style="font-size: 0.875rem; color: #15803d; margin: 0;">
                    Want to host your own sports sessions, manage capacity limits, and post new events?
                </p>
            </header>

            <form method="POST" action="{{ route('profile.become-organizer') }}">
                @csrf
                <button type="submit" style="background-color: #16a34a; color: #ffffff; padding: 0.5rem 1rem; border: none; border-radius: 6px; font-weight: 500; cursor: pointer;">
                    Upgrade Account to Organizer
                </button>
            </form>
        </section>
    @else
        <div style="background: #f8fafc; padding: 1rem 1.5rem; border-radius: 8px; border: 1px solid #e2e8f0; margin-bottom: 1.5rem;">
            <p style="margin: 0; color: #334155; font-size: 0.875rem;">
                <strong>Role:</strong> <span style="color: #16a34a; font-weight: 600;">Event Organizer</span> — You have permission to create and manage sports events.
            </p>
        </div>
    @endif
</div>
@endsection
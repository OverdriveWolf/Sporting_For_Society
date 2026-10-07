@extends('layouts.app')

@section('content')
    <div
        style="max-width: 650px; margin: 0 auto; background: #fff; padding: 2rem; border-radius: 8px; border: 1px solid #e2e8f0;">
        <h2 style="margin-top: 0;">Create New Sports Event</h2>

        <form action="{{ route('events.store') }}" method="POST">
            @csrf

            <div style="margin-bottom: 1rem;">
                <label style="display:block; font-weight:600; margin-bottom:0.25rem;">Event Title</label>
                <input type="text" name="title" value="{{ old('title') }}" placeholder="e.g., Sunset Co-ed Singles Match"
                    style="width:100%; padding:0.5rem; border:1px solid #cbd5e1; border-radius:6px;" required>
                @error('title') <span style="color:#dc2626; font-size:0.8rem;">{{ $message }}</span> @enderror
            </div>

            <div style="display:flex; gap:1rem; margin-bottom: 1rem;">
                <div style="flex:1;">
                    <label style="display:block; font-weight:600; margin-bottom:0.25rem;">Sport Category</label>
                    <select name="category_id"
                        style="width:100%; padding:0.5rem; border:1px solid #cbd5e1; border-radius:6px;" required>
                        <option value="">Select a Category</option>
                        {{-- Pass $categories from EventController@create to dynamically list them --}}
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id') <span style="color:#dc2626; font-size:0.8rem;">{{ $message }}</span> @enderror
                </div>
                <div style="flex:1;">
                    <label style="display:block; font-weight:600; margin-bottom:0.25rem;">Max Participants</label>
                    <!-- Updated name from max_athletes to max_participants -->
                    <input type="number" name="max_participants" value="{{ old('max_participants', 16) }}" min="2" max="100"
                        style="width:100%; padding:0.5rem; border:1px solid #cbd5e1; border-radius:6px;" required>
                    @error('max_participants') <span style="color:#dc2626; font-size:0.8rem;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div style="display:flex; gap:1rem; margin-bottom: 1rem;">
                <div style="flex:1;">
                    <label style="display:block; font-weight:600; margin-bottom:0.25rem;">Date & Time</label>
                    <!-- Updated name from start_time to event_date -->
                    <input type="datetime-local" name="event_date" value="{{ old('event_date') }}"
                        style="width:100%; padding:0.5rem; border:1px solid #cbd5e1; border-radius:6px;" required>
                    @error('event_date') <span style="color:#dc2626; font-size:0.8rem;">{{ $message }}</span> @enderror
                </div>
                <div style="flex:1;">
                    <label style="display:block; font-weight:600; margin-bottom:0.25rem;">Location</label>
                    <input type="text" name="location" value="{{ old('location') }}"
                        placeholder="e.g., McCarren Park Courts"
                        style="width:100%; padding:0.5rem; border:1px solid #cbd5e1; border-radius:6px;" required>
                    @error('location') <span style="color:#dc2626; font-size:0.8rem;">{{ $message }}</span> @enderror
                </div>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display:block; font-weight:600; margin-bottom:0.25rem;">Description & Rules</label>
                <textarea name="description" rows="4"
                    style="width:100%; padding:0.5rem; border:1px solid #cbd5e1; border-radius:6px;"
                    placeholder="Describe required skill level, equipment to bring, format..."
                    required>{{ old('description') }}</textarea>
                @error('description') <span style="color:#dc2626; font-size:0.8rem;">{{ $message }}</span> @enderror
            </div>

            <div style="display:flex; gap:1rem;">
                <button type="submit" class="btn"
                    style="flex:1; background-color:#2563eb; color:#fff; padding:0.5rem 1rem; border:none; border-radius:6px; font-weight:600; cursor:pointer;">Publish
                    Event</button>
                <a href="{{ route('events.index') }}" class="btn btn-outline"
                    style="text-align:center; padding:0.5rem 1rem; border:1px solid #cbd5e1; border-radius:6px; text-decoration:none; color:#334155;">Cancel</a>
            </div>
        </form>
    </div>
@endsection
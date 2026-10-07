@extends('layouts.app')

@section('content')
<div style="max-width: 650px; margin: 0 auto; background: #fff; padding: 2rem; border-radius: 8px; border: 1px solid #e2e8f0;">
    <h2 style="margin-top: 0;">Create New Sports Event</h2>
    
    <form action="{{ route('events.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 1rem;">
            <label style="display:block; font-weight:600; margin-bottom:0.25rem;">Event Title</label>
            <input type="text" name="title" value="{{ old('title') }}" placeholder="e.g., Sunset Co-ed Singles Match" style="width:100%; padding:0.5rem; border:1px solid #cbd5e1; border-radius:6px;" required>
            @error('title') <span style="color:#dc2626; font-size:0.8rem;">{{ $message }}</span> @enderror
        </div>

        <div style="display:flex; gap:1rem; margin-bottom: 1rem;">
            <div style="flex:1;">
                <label style="display:block; font-weight:600; margin-bottom:0.25rem;">Sport Category</label>
                <select name="sport" style="width:100%; padding:0.5rem; border:1px solid #cbd5e1; border-radius:6px;" required>
                    <option value="Tennis">Tennis</option>
                    <option value="Soccer">Soccer</option>
                    <option value="Basketball">Basketball</option>
                    <option value="Running">Running</option>
                    <option value="Cycling">Cycling</option>
                    <option value="Volleyball">Volleyball</option>
                </select>
            </div>
            <div style="flex:1;">
                <label style="display:block; font-weight:600; margin-bottom:0.25rem;">Max Athletes</label>
                <input type="number" name="max_athletes" value="{{ old('max_athletes', 16) }}" min="2" max="100" style="width:100%; padding:0.5rem; border:1px solid #cbd5e1; border-radius:6px;" required>
            </div>
        </div>

        <div style="display:flex; gap:1rem; margin-bottom: 1rem;">
            <div style="flex:1;">
                <label style="display:block; font-weight:600; margin-bottom:0.25rem;">Date & Time</label>
                <input type="datetime-local" name="start_time" value="{{ old('start_time') }}" style="width:100%; padding:0.5rem; border:1px solid #cbd5e1; border-radius:6px;" required>
            </div>
            <div style="flex:1;">
                <label style="display:block; font-weight:600; margin-bottom:0.25rem;">Location</label>
                <input type="text" name="location" value="{{ old('location') }}" placeholder="e.g., McCarren Park Courts" style="width:100%; padding:0.5rem; border:1px solid #cbd5e1; border-radius:6px;" required>
            </div>
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label style="display:block; font-weight:600; margin-bottom:0.25rem;">Description & Rules</label>
            <textarea name="description" rows="4" style="width:100%; padding:0.5rem; border:1px solid #cbd5e1; border-radius:6px;" placeholder="Describe required skill level, equipment to bring, format..." required>{{ old('description') }}</textarea>
            @error('description') <span style="color:#dc2626; font-size:0.8rem;">{{ $message }}</span> @enderror
        </div>

        <div style="display:flex; gap:1rem;">
            <button type="submit" class="btn" style="flex:1;">Publish Event</button>
            <a href="{{ route('events.index') }}" class="btn btn-outline" style="text-align:center;">Cancel</a>
        </div>
    </form>
</div>
@endsection
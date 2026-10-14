@extends('layouts.app')

@section('content')
    <div class="bg-[#f8f9fa] min-h-screen py-10 text-gray-900">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="mb-6 flex justify-between items-center">
                <div>
                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block">EVENT
                        MANAGEMENT</span>
                    <h1 class="text-2xl font-black uppercase italic text-black">Edit Event Details</h1>
                </div>
                <a href="{{ route('organizer.dashboard') }}" class="text-xs font-bold text-gray-600 hover:text-black">
                    &larr; Back to Dashboard
                </a>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-xl border border-gray-200/80 p-6 shadow-sm">
                <form method="POST" action="{{ route('events.update', $event->id) }}" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <!-- Row 1: Title & Category -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="md:col-span-2">
                            <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-wider mb-1">EVENT
                                NAME *</label>
                            <input type="text" name="title" value="{{ old('title', $event->title) }}" required
                                class="w-full bg-gray-50/80 border border-gray-200 rounded-lg px-3 py-2 text-xs text-gray-800 focus:outline-none focus:bg-white focus:border-black transition-colors">
                            @error('title') <span class="text-red-500 text-[10px] mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-wider mb-1">SPORT
                                CATEGORY *</label>
                            <select name="category_id" required
                                class="w-full bg-gray-50/80 border border-gray-200 rounded-lg px-3 py-2 text-xs text-gray-800 focus:outline-none focus:bg-white focus:border-black transition-colors">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $event->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id') <span class="text-red-500 text-[10px] mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Row 2: Date, Location, Max Participants -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-wider mb-1">DATE &
                                TIME *</label>
                            <input type="datetime-local" name="event_date"
                                value="{{ old('event_date', $event->event_date ? $event->event_date->format('Y-m-d\TH:i') : '') }}"
                                required
                                class="w-full bg-gray-50/80 border border-gray-200 rounded-lg px-3 py-2 text-xs text-gray-800 focus:outline-none focus:bg-white focus:border-black transition-colors">
                            @error('event_date') <span class="text-red-500 text-[10px] mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-wider mb-1">LOCATION
                                *</label>
                            <input type="text" name="location" value="{{ old('location', $event->location) }}" required
                                class="w-full bg-gray-50/80 border border-gray-200 rounded-lg px-3 py-2 text-xs text-gray-800 focus:outline-none focus:bg-white focus:border-black transition-colors">
                            @error('location') <span class="text-red-500 text-[10px] mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-wider mb-1">MAX
                                PARTICIPANTS *</label>
                            <input type="number" name="max_participants"
                                value="{{ old('max_participants', $event->max_participants) }}" min="2" max="100" required
                                class="w-full bg-gray-50/80 border border-gray-200 rounded-lg px-3 py-2 text-xs text-gray-800 focus:outline-none focus:bg-white focus:border-black transition-colors">
                            @error('max_participants') <span
                            class="text-red-500 text-[10px] mt-1 block">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div style="margin-bottom: 1rem;">
                        <label style="display:block; font-size:0.8rem; font-weight:700; margin-bottom:0.3rem;">EVENT
                            STATUS</label>
                        <select name="status"
                            style="width:100%; padding:0.6rem; border:1px solid #cbd5e1; border-radius:6px; background:#fff;">
                            <option value="ACTIVE" {{ (isset($event) && $event->status == 'ACTIVE') ? 'selected' : '' }}>
                                ACTIVE</option>
                            <option value="COMPLETED" {{ (isset($event) && $event->status == 'COMPLETED') ? 'selected' : '' }}>COMPLETED</option>
                            <option value="CANCELLED" {{ (isset($event) && $event->status == 'CANCELLED') ? 'selected' : '' }}>CANCELLED</option>
                            <option value="DRAFT" {{ (isset($event) && $event->status == 'DRAFT') ? 'selected' : '' }}>DRAFT
                            </option>
                        </select>
                    </div>
                    <!-- Row 3: Description -->
                    <div>
                        <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-wider mb-1">DESCRIPTION &
                            RULES *</label>
                        <textarea name="description" rows="4" required
                            class="w-full bg-gray-50/80 border border-gray-200 rounded-lg p-3 text-xs text-gray-800 focus:outline-none focus:bg-white focus:border-black transition-colors">{{ old('description', $event->description) }}</textarea>
                        @error('description') <span class="text-red-500 text-[10px] mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Actions -->
                    <div class="flex justify-end items-center gap-3 pt-4 border-t border-gray-100">
                        <a href="{{ route('organizer.dashboard') }}"
                            class="text-xs font-bold text-gray-500 hover:text-black px-4 py-2">
                            Cancel
                        </a>
                        <button type="submit"
                            style="background-color: #000; color: #ccff00; font-size: 11px; font-weight: 900; text-transform: uppercase; letter-spacing: 0.05em; padding: 0.625rem 1.25rem; border-radius: 10px; text-decoration: none; display: inline-flex; align-items: center; gap: 0.25rem;">
                    Update Event
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
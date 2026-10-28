@extends('layouts.app')

@section('content')

<div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800" style="border-radius: 16px; padding: 1.5rem; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);">
                <h2 class="text-black dark:text-white" style="font-size: 1.125rem; font-weight: 900; text-transform: uppercase; font-style: italic; letter-spacing: -0.025em; margin-bottom: 1rem;">
                    CREATE NEW EVENT
                </h2>
    <form method="POST" action="{{ route('events.store') }}" style="display: flex; flex-direction: column; gap: 1rem;">
                    @csrf

                    <!-- ROW 1: Event Name & Sport Category -->
                    <div style="display: flex; gap: 1rem; width: 100%;">
                        <div style="flex: 3;">
                            <label style="display: block; font-size: 10px; font-weight: 700; color: #6b7280; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">
                                EVENT NAME
                            </label>
                            <input type="text" name="title" value="{{ old('title') }}" required
                                placeholder="e.g., Casual Saturday morning play"
                                class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white placeholder-gray-400"
                                style="width: 100%; border-radius: 8px !important; padding: 0.5rem 0.75rem !important; font-size: 0.75rem !important; outline: none !important;">
                            @error('title') <span style="color: #ef4444; font-size: 10px; display: block; margin-top: 0.25rem;">{{ $message }}</span> @enderror
                        </div>
                        <div style="flex: 1;">
                            <label style="display: block; font-size: 10px; font-weight: 700; color: #6b7280; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">
                                SPORT CATEGORY
                            </label>
                            <select name="category_id" required
                                class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white"
                                style="width: 100%; border-radius: 8px !important; padding: 0.5rem 0.75rem !important; font-size: 0.75rem !important; outline: none !important;">
                                <option value="" class="bg-white dark:bg-gray-800 text-gray-900 dark:text-white">Select Category</option>
                                @foreach($categories ?? [] as $category)
                                    <option value="{{ $category->id }}" class="bg-white dark:bg-gray-800 text-gray-900 dark:text-white" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>         
                                @endforeach
                            </select>
                            @error('category_id') <span style="color: #ef4444; font-size: 10px; display: block; margin-top: 0.25rem;">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- ROW 2: Date & Time, Location, Max Participants -->
                    <div style="display: flex; gap: 1rem; width: 100%;">
                        <div style="flex: 5;">
                            <label style="display: block; font-size: 10px; font-weight: 700; color: #6b7280; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">
                                DATE & TIME
                            </label>
                            <input type="datetime-local" name="event_date" value="{{ old('event_date') }}" required
                                class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white"
                                style="width: 100%; border-radius: 8px !important; padding: 0.5rem 0.75rem !important; font-size: 0.75rem !important; outline: none !important;">
                            @error('event_date') <span style="color: #ef4444; font-size: 10px; display: block; margin-top: 0.25rem;">{{ $message }}</span> @enderror
                        </div>
                        <div style="flex: 5;">
                            <label style="display: block; font-size: 10px; font-weight: 700; color: #6b7280; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">
                                LOCATION
                            </label>
                            <input type="text" name="location" value="{{ old('location') }}" required
                                placeholder="McCarren Park Courts, Brooklyn"
                                class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white placeholder-gray-400"
                                style="width: 100%; border-radius: 8px !important; padding: 0.5rem 0.75rem !important; font-size: 0.75rem !important; outline: none !important;">
                            @error('location') <span style="color: #ef4444; font-size: 10px; display: block; margin-top: 0.25rem;">{{ $message }}</span> @enderror
                        </div>
                        <div style="flex: 2;">
                            <label style="display: block; font-size: 10px; font-weight: 700; color: #6b7280; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">
                                MAX ATHLETES
                            </label>
                            <input type="number" name="max_participants" value="{{ old('max_participants', 16) }}" min="2" max="100" required
                                class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white"
                                style="width: 100%; border-radius: 8px !important; padding: 0.5rem 0.75rem !important; font-size: 0.75rem !important; outline: none !important;">
                            @error('max_participants') <span style="color: #ef4444; font-size: 10px; display: block; margin-top: 0.25rem;">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div style="margin-bottom: 1rem;">
                        <label class="text-gray-700 dark:text-gray-300" style="display:block; font-size:0.8rem; font-weight:700; margin-bottom:0.3rem;">EVENT STATUS</label>
                        <select name="status" class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 text-gray-900 dark:text-white" style="width:100%; padding:0.6rem; border-radius:6px;">
                            <option value="ACTIVE" class="bg-white dark:bg-gray-800 text-gray-900 dark:text-white" {{ (isset($event) && $event->status == 'ACTIVE') ? 'selected' : '' }}>ACTIVE</option>
                            <option value="COMPLETED" class="bg-white dark:bg-gray-800 text-gray-900 dark:text-white" {{ (isset($event) && $event->status == 'COMPLETED') ? 'selected' : '' }}>COMPLETED</option>
                            <option value="CANCELLED" class="bg-white dark:bg-gray-800 text-gray-900 dark:text-white" {{ (isset($event) && $event->status == 'CANCELLED') ? 'selected' : '' }}>CANCELLED</option>
                            <option value="DRAFT" class="bg-white dark:bg-gray-800 text-gray-900 dark:text-white" {{ (isset($event) && $event->status == 'DRAFT') ? 'selected' : '' }}>DRAFT</option>
                        </select>
                    </div>
                    <!-- ROW 3: Description -->
                    <div style="width: 100%;">
                        <label style="display: block; font-size: 10px; font-weight: 700; color: #6b7280; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">
                            DESCRIPTION
                        </label>
                        <textarea name="description" rows="3" required
                            placeholder="Enter schedule details, required gear, skill level guidelines, and event information..."
                            class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white placeholder-gray-400"
                            style="width: 100%; border-radius: 8px !important; padding: 0.5rem 0.75rem !important; font-size: 0.75rem !important; outline: none !important; resize: none !important;">{{ old('description') }}</textarea>
                        @error('description') <span style="color: #ef4444; font-size: 10px; display: block; margin-top: 0.25rem;">{{ $message }}</span> @enderror
                    </div>

                    <!-- Submit Buttons Row -->
                    <div style="display: flex; justify-content: flex-end; align-items: center; gap: 0.75rem; padding-top: 0.5rem;">
                        <button type="button" class="bg-white dark:bg-gray-800 text-black dark:text-white border border-gray-200 dark:border-gray-700" style="border-radius: 8px !important; padding: 0.5rem 1.25rem !important; font-size: 0.75rem !important; font-weight: 700 !important; cursor: pointer !important; white-space: nowrap !important; box-shadow: none !important;">
                            Save as Draft
                        </button>

                        <button type="submit" style="background-color: #000000 !important; color: #CCFF00 !important; border: none !important; border-radius: 8px !important; padding: 0.5rem 1.25rem !important; font-size: 0.75rem !important; font-weight: 900 !important; text-transform: uppercase !important; cursor: pointer !important; white-space: nowrap !important; box-shadow: none !important;">
                            PUBLISH EVENT
                        </button>
                    </div>
                </form>
            </div>
@endsection
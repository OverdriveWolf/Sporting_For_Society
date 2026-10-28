@extends('layouts.app')

@section('content')
    <div class="bg-[#f8f9fa] dark:bg-gray-950 min-h-screen flex text-gray-900 dark:text-gray-100 font-sans w-full -mx-4 -mt-6 transition-colors duration-200">

        <!-- Left Sidebar (Organizer Management) -->
        <aside class="w-64 bg-white dark:bg-gray-900 border-r border-gray-100 dark:border-gray-800 min-h-screen px-5 py-6 flex-shrink-0 transition-colors duration-200">
            <div class="mb-8">
                <span style="font-size: 11px; font-weight: 800; color: #6b7280; text-transform: uppercase; letter-spacing: 0.025em; display: block; margin-bottom: 1.25rem;">
                    ORGANIZER MANAGEMENT
                </span>

                <nav style="display: flex; flex-direction: column; gap: 0.35rem;">
                    <!-- Dashboard (Active Item) -->
                    <a href="{{ route('organizer.dashboard') }}"
                        class="dark:bg-gray-800 dark:text-white"
                        style="background-color: #f4fbe4; color: #000000; border-radius: 12px; padding: 0.65rem 0.85rem; font-size: 0.875rem; font-weight: 700; display: flex; align-items: center; gap: 0.75rem; text-decoration: none;">
                        <svg class="dark:text-white" style="width: 1.125rem; height: 1.125rem; color: #000000; flex-shrink: 0;" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M3 3h7v7H3V3zm11 0h7v7h-7V3zm0 11h7v7h-7v-7zM3 14h7v7H3v-7z"/>
                        </svg>
                        Dashboard
                    </a>

                    <!-- My Events -->
                    <a href="#"
                        style="color: #6b7280; border-radius: 12px; padding: 0.65rem 0.85rem; font-size: 0.875rem; font-weight: 600; display: flex; align-items: center; gap: 0.75rem; text-decoration: none; transition: background-color 0.15s ease;"
                        onmouseover="this.style.backgroundColor=document.documentElement.classList.contains('dark') ? '#374151' : '#f9fafb'; this.style.color=document.documentElement.classList.contains('dark') ? '#ffffff' : '#000000';"
                        onmouseout="this.style.backgroundColor='transparent'; this.style.color='#6b7280';">
                        <svg style="width: 1.125rem; height: 1.125rem; stroke-width: 2; flex-shrink: 0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        My Events
                    </a>

                    <!-- Create Event -->
                    <a href="{{ route('events.create') }}"
                        style="color: #6b7280; border-radius: 12px; padding: 0.65rem 0.85rem; font-size: 0.875rem; font-weight: 600; display: flex; align-items: center; gap: 0.75rem; text-decoration: none; transition: background-color 0.15s ease;"
                        onmouseover="this.style.backgroundColor=document.documentElement.classList.contains('dark') ? '#374151' : '#f9fafb'; this.style.color=document.documentElement.classList.contains('dark') ? '#ffffff' : '#000000';"
                        onmouseout="this.style.backgroundColor='transparent'; this.style.color='#6b7280';">
                        <svg style="width: 1.125rem; height: 1.125rem; stroke-width: 2; flex-shrink: 0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        Create Event
                    </a>

                    <!-- Participants -->
                    <a href="#"
                        style="color: #6b7280; border-radius: 12px; padding: 0.65rem 0.85rem; font-size: 0.875rem; font-weight: 600; display: flex; align-items: center; gap: 0.75rem; text-decoration: none; transition: background-color 0.15s ease;"
                        onmouseover="this.style.backgroundColor=document.documentElement.classList.contains('dark') ? '#374151' : '#f9fafb'; this.style.color=document.documentElement.classList.contains('dark') ? '#ffffff' : '#000000';"
                        onmouseout="this.style.backgroundColor='transparent'; this.style.color='#6b7280';">
                        <svg style="width: 1.125rem; height: 1.125rem; stroke-width: 2; flex-shrink: 0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        Participants
                    </a>

                    <!-- Settings -->
                    <a href="#"
                        style="color: #6b7280; border-radius: 12px; padding: 0.65rem 0.85rem; font-size: 0.875rem; font-weight: 600; display: flex; align-items: center; gap: 0.75rem; text-decoration: none; transition: background-color 0.15s ease;"
                        onmouseover="this.style.backgroundColor=document.documentElement.classList.contains('dark') ? '#374151' : '#f9fafb'; this.style.color=document.documentElement.classList.contains('dark') ? '#ffffff' : '#000000';"
                        onmouseout="this.style.backgroundColor='transparent'; this.style.color='#6b7280';">
                        <svg style="width: 1.125rem; height: 1.125rem; stroke-width: 2; flex-shrink: 0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Settings
                    </a>
                </nav>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 p-6 lg:p-10 w-full" style="max-width: 100%;">

            <!-- Top Section Header -->
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1.5rem;">
                <div>
                    <h1 class="text-black dark:text-white" style="font-size: 1.75rem; font-weight: 900; text-transform: uppercase; font-style: italic; letter-spacing: -0.025em; line-height: 1;">
                        ORGANIZER DASHBOARD
                    </h1>
                    <p style="font-size: 0.75rem; color: #9ca3af; margin-top: 0.25rem;">
                        Manage your matches, review players, and program upcoming events.
                    </p>
                </div>
                <a href="{{ route('events.create') }}"
                   style="background-color: #000; color: #ccff00; font-size: 11px; font-weight: 900; text-transform: uppercase; letter-spacing: 0.05em; padding: 0.625rem 1.25rem; border-radius: 10px; text-decoration: none; display: inline-flex; align-items: center; gap: 0.25rem;">
                    + CREATE NEW EVENT
                </a>
            </div>

            <!-- Stat Cards Row -->
            <div style="display: flex; gap: 1rem; width: 100%; margin-bottom: 2rem;">
                <!-- Total Events -->
                <div class="bg-white dark:bg-gray-900 border-gray-100 dark:border-gray-800" style="flex: 1; border: 1px solid; border-radius: 16px; padding: 1.25rem; box-shadow: 0 1px 2px rgba(0,0,0,0.03);">
                    <span style="font-size: 10px; font-weight: 800; color: #9ca3af; text-transform: uppercase; letter-spacing: 0.05em; display: block;">
                        TOTAL EVENTS
                    </span>
                    <div class="text-black dark:text-white" style="font-size: 1.875rem; font-weight: 900; margin-top: 0.5rem; line-height: 1;">
                        {{ $totalEvents ?? count($managedEvents ?? []) ?? 24 }}
                    </div>
                    <span style="font-size: 11px; color: #9ca3af; margin-top: 0.5rem; display: block;">
                        Managed events
                    </span>
                </div>

                <!-- Active Participants -->
                <div class="bg-white dark:bg-gray-900 border-gray-100 dark:border-gray-800" style="flex: 1; border: 1px solid; border-radius: 16px; padding: 1.25rem; box-shadow: 0 1px 2px rgba(0,0,0,0.03);">
                    <span style="font-size: 10px; font-weight: 800; color: #9ca3af; text-transform: uppercase; letter-spacing: 0.05em; display: block;">
                        ACTIVE PARTICIPANTS
                    </span>
                    <div class="text-black dark:text-white" style="font-size: 1.875rem; font-weight: 900; margin-top: 0.5rem; line-height: 1;">
                        {{ number_format($activeParticipants ?? 1240) }}
                    </div>
                    <span style="font-size: 11px; color: #9ca3af; margin-top: 0.5rem; display: block;">
                        Verified athletes
                    </span>
                </div>

                <!-- Upcoming This Week -->
                <div class="bg-white dark:bg-gray-900 border-gray-100 dark:border-gray-800" style="flex: 1; border: 1px solid; border-radius: 16px; padding: 1.25rem; box-shadow: 0 1px 2px rgba(0,0,0,0.03);">
                    <span style="font-size: 10px; font-weight: 800; color: #9ca3af; text-transform: uppercase; letter-spacing: 0.05em; display: block;">
                        UPCOMING THIS WEEK
                    </span>
                    <div class="text-black dark:text-white" style="font-size: 1.875rem; font-weight: 900; margin-top: 0.5rem; line-height: 1;">
                        8
                    </div>
                    <span style="font-size: 11px; color: #9ca3af; margin-top: 0.5rem; display: block;">
                        Scheduled matches
                    </span>
                </div>

                <!-- Avg Attendance -->
                <div class="bg-white dark:bg-gray-900 border-gray-100 dark:border-gray-800" style="flex: 1; border: 1px solid; border-radius: 16px; padding: 1.25rem; box-shadow: 0 1px 2px rgba(0,0,0,0.03);">
                    <span style="font-size: 10px; font-weight: 800; color: #9ca3af; text-transform: uppercase; letter-spacing: 0.05em; display: block;">
                        AVG ATTENDANCE
                    </span>
                    <div class="text-black dark:text-white" style="font-size: 1.875rem; font-weight: 900; margin-top: 0.5rem; line-height: 1;">
                        92%
                    </div>
                    <span style="font-size: 11px; color: #9ca3af; margin-top: 0.5rem; display: block;">
                        Completed spots
                    </span>
                </div>
            </div>

            <!-- Flash Alerts -->
            @if(session('success'))
                <div class="mb-6 p-4 bg-emerald-100 dark:bg-emerald-950 border border-emerald-300 dark:border-emerald-800 text-emerald-800 dark:text-emerald-200 rounded-xl text-xs font-bold">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-6 p-4 bg-red-100 dark:bg-red-950 border border-red-300 dark:border-red-800 text-red-800 dark:text-red-200 rounded-xl text-xs font-semibold">
                    <p class="font-bold mb-1">Please fix the following errors:</p>
                    <ul class="list-disc pl-4 space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Managed Events Table Card -->
            <div class="bg-white dark:bg-gray-900 rounded-2xl border border-gray-200/80 dark:border-gray-800 p-6 shadow-sm mb-10 transition-colors duration-200" style="margin-bottom: 2.5rem;">
                <div class="flex justify-between items-center mb-5">
                    <h2 class="text-xl font-black text-black dark:text-white uppercase italic tracking-tight">MANAGED EVENTS</h2>
                    <button type="button"
                        class="border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-300 text-xs font-bold px-3 py-1.5 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors shadow-2xs">
                        Export CSV
                    </button>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50/70 dark:bg-gray-800/50 text-[10px] font-bold text-gray-400 uppercase tracking-wider">
                                <th class="py-3 px-4 rounded-l-lg">EVENT NAME</th>
                                <th class="py-3 px-3">SPORT</th>
                                <th class="py-3 px-3">DATE & TIME</th>
                                <th class="py-3 px-3">LOCATION</th>
                                <th class="py-3 px-3">SPOTS</th>
                                <th class="py-3 px-3">STATUS</th>
                                <th class="py-3 px-4 text-right rounded-r-lg">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-800 text-xs">
                            @forelse($managedEvents as $event)
                                <tr class="hover:bg-gray-50/50 dark:hover:bg-gray-800/40 transition-colors">
                                    <td class="py-4 px-4 font-bold text-black dark:text-white">{{ $event->title }}</td>
                                    <td class="py-4 px-3 text-gray-400">
                                        {{ $event->category->name ?? $event->sport_category ?? 'General' }}
                                    </td>
                                    <td class="py-4 px-3 text-gray-400">
                                        {{ \Carbon\Carbon::parse($event->event_date ?? $event->date_time)->format('M d, g:i A') }}
                                    </td>
                                    <td class="py-4 px-3 text-gray-400">{{ $event->location }}</td>
                                    <td class="py-4 px-3 font-extrabold text-black dark:text-white">
                                        {{ $event->participants_count ?? 0 }}/{{ $event->max_participants ?? $event->max_athletes ?? 16 }}
                                    </td>
                                    <td class="py-4 px-3">
                                        @php
                                            $status = strtolower($event->status ?? 'active');
                                        @endphp

                                        @if($status === 'completed')
                                            <span class="bg-emerald-50 dark:bg-emerald-950 text-emerald-600 dark:text-emerald-300 border border-emerald-200 dark:border-emerald-800 font-extrabold text-[9px] px-2.5 py-1 rounded-md uppercase tracking-wider">
                                                COMPLETED
                                            </span>
                                        @elseif($status === 'draft')
                                            <span class="bg-gray-100 dark:bg-gray-800 text-gray-500 dark:text-gray-400 border border-gray-200 dark:border-gray-700 font-extrabold text-[9px] px-2.5 py-1 rounded-md uppercase tracking-wider">
                                                DRAFT
                                            </span>
                                        @elseif($status === 'canceled' || $status === 'cancelled')
                                            <span class="bg-red-50 dark:bg-red-950 text-red-500 dark:text-red-300 border border-red-200 dark:border-red-800 font-extrabold text-[9px] px-2.5 py-1 rounded-md uppercase tracking-wider">
                                                CANCELLED
                                            </span>
                                        @else
                                            <span class="bg-sky-50 dark:bg-sky-950 text-sky-500 dark:text-sky-300 border border-sky-200 dark:border-sky-800 font-extrabold text-[9px] px-2.5 py-1 rounded-md uppercase tracking-wider">
                                                ACTIVE
                                            </span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-4 text-right">
                                        <div class="flex items-center justify-end gap-1.5">
                                            <a href="{{ route('events.show', $event->id) }}"
                                               class="w-7 h-7 flex items-center justify-center rounded-lg bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300 transition-colors">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                            <a href="{{ route('events.edit', $event->id) }}"
                                               class="w-7 h-7 flex items-center justify-center rounded-lg bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300 transition-colors">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>
                                            <form method="POST" action="{{ route('events.destroy', $event->id) }}" class="inline" onsubmit="return confirm('Delete this event?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="w-7 h-7 flex items-center justify-center rounded-lg bg-red-50 dark:bg-red-950 hover:bg-red-100 dark:hover:bg-red-900 text-red-500 transition-colors cursor-pointer">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="py-8 text-center text-gray-400">
                                        No managed events available. Use the form below to create one!
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Quick Create New Event Card -->
            <div class="bg-white dark:bg-gray-900 border-gray-200 dark:border-gray-800 transition-colors duration-200" style="border: 1px solid; border-radius: 16px; padding: 1.5rem; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);">
                <h2 class="text-black dark:text-white" style="font-size: 1.125rem; font-weight: 900; text-transform: uppercase; font-style: italic; letter-spacing: -0.025em; margin-bottom: 1rem;">
                    QUICK CREATE NEW EVENT
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
                                class="dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:placeholder-gray-400"
                                style="width: 100%; background-color: #f9fafb !important; border: 1px solid #e5e7eb !important; border-radius: 8px !important; padding: 0.5rem 0.75rem !important; font-size: 0.75rem !important; color: #1f2937 !important; outline: none !important;">
                            @error('title') <span style="color: #ef4444; font-size: 10px; display: block; margin-top: 0.25rem;">{{ $message }}</span> @enderror
                        </div>
                        <div style="flex: 1;">
                            <label style="display: block; font-size: 10px; font-weight: 700; color: #6b7280; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">
                                SPORT CATEGORY
                            </label>
                            <select name="category_id" required
                                class="dark:bg-gray-800 dark:border-gray-700 dark:text-white"
                                style="width: 100%; background-color: #f9fafb !important; border: 1px solid #e5e7eb !important; border-radius: 8px !important; padding: 0.5rem 0.75rem !important; font-size: 0.75rem !important; color: #1f2937 !important; outline: none !important;">
                                <option value="" class="dark:bg-gray-800">Select Category</option>
                                @foreach($categories ?? [] as $category)
                                    <option value="{{ $category->id }}" class="dark:bg-gray-800" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                                class="dark:bg-gray-800 dark:border-gray-700 dark:text-white"
                                style="width: 100%; background-color: #f9fafb !important; border: 1px solid #e5e7eb !important; border-radius: 8px !important; padding: 0.5rem 0.75rem !important; font-size: 0.75rem !important; color: #1f2937 !important; outline: none !important;">
                            @error('event_date') <span style="color: #ef4444; font-size: 10px; display: block; margin-top: 0.25rem;">{{ $message }}</span> @enderror
                        </div>
                        <div style="flex: 5;">
                            <label style="display: block; font-size: 10px; font-weight: 700; color: #6b7280; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">
                                LOCATION
                            </label>
                            <input type="text" name="location" value="{{ old('location') }}" required
                                placeholder="McCarren Park Courts, Brooklyn"
                                class="dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:placeholder-gray-400"
                                style="width: 100%; background-color: #f9fafb !important; border: 1px solid #e5e7eb !important; border-radius: 8px !important; padding: 0.5rem 0.75rem !important; font-size: 0.75rem !important; color: #1f2937 !important; outline: none !important;">
                            @error('location') <span style="color: #ef4444; font-size: 10px; display: block; margin-top: 0.25rem;">{{ $message }}</span> @enderror
                        </div>
                        <div style="flex: 2;">
                            <label style="display: block; font-size: 10px; font-weight: 700; color: #6b7280; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">
                                MAX ATHLETES
                            </label>
                            <input type="number" name="max_participants" value="{{ old('max_participants', 16) }}" min="2" max="100" required
                                class="dark:bg-gray-800 dark:border-gray-700 dark:text-white"
                                style="width: 100%; background-color: #f9fafb !important; border: 1px solid #e5e7eb !important; border-radius: 8px !important; padding: 0.5rem 0.75rem !important; font-size: 0.75rem !important; color: #1f2937 !important; outline: none !important;">
                            @error('max_participants') <span style="color: #ef4444; font-size: 10px; display: block; margin-top: 0.25rem;">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    
                    <div style="margin-bottom: 1rem;">
                        <label class="dark:text-gray-300" style="display:block; font-size:0.8rem; font-weight:700; margin-bottom:0.3rem;">EVENT STATUS</label>
                        <select name="status" class="dark:bg-gray-800 dark:border-gray-700 dark:text-white" style="width:100%; padding:0.6rem; border:1px solid #cbd5e1; border-radius:6px; background:#fff;">
                            <option value="ACTIVE" class="dark:bg-gray-800" {{ (isset($event) && $event->status == 'ACTIVE') ? 'selected' : '' }}>ACTIVE</option>
                            <option value="COMPLETED" class="dark:bg-gray-800" {{ (isset($event) && $event->status == 'COMPLETED') ? 'selected' : '' }}>COMPLETED</option>
                            <option value="CANCELLED" class="dark:bg-gray-800" {{ (isset($event) && $event->status == 'CANCELLED') ? 'selected' : '' }}>CANCELLED</option>
                            <option value="DRAFT" class="dark:bg-gray-800" {{ (isset($event) && $event->status == 'DRAFT') ? 'selected' : '' }}>DRAFT</option>
                        </select>
                    </div>

                    <!-- ROW 3: Description -->
                    <div style="width: 100%;">
                        <label style="display: block; font-size: 10px; font-weight: 700; color: #6b7280; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">
                            DESCRIPTION
                        </label>
                        <textarea name="description" rows="3" required
                            placeholder="Enter schedule details, required gear, skill level guidelines, and event information..."
                            class="dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:placeholder-gray-400"
                            style="width: 100%; background-color: #f9fafb !important; border: 1px solid #e5e7eb !important; border-radius: 8px !important; padding: 0.5rem 0.75rem !important; font-size: 0.75rem !important; color: #1f2937 !important; outline: none !important; resize: none !important;">{{ old('description') }}</textarea>
                        @error('description') <span style="color: #ef4444; font-size: 10px; display: block; margin-top: 0.25rem;">{{ $message }}</span> @enderror
                    </div>

                    <!-- Submit Buttons Row -->
                    <div style="display: flex; justify-content: flex-end; align-items: center; gap: 0.75rem; padding-top: 0.5rem;">
                        <button type="button" class="dark:bg-gray-800 dark:text-white dark:border-gray-700" style="background-color: #ffffff !important; color: #000000 !important; border: 1px solid #e5e7eb !important; border-radius: 8px !important; padding: 0.5rem 1.25rem !important; font-size: 0.75rem !important; font-weight: 700 !important; cursor: pointer !important; white-space: nowrap !important; box-shadow: none !important;">
                            Save as Draft
                        </button>

                        <button type="submit" style="background-color: #000000 !important; color: #CCFF00 !important; border: none !important; border-radius: 8px !important; padding: 0.5rem 1.25rem !important; font-size: 0.75rem !important; font-weight: 900 !important; text-transform: uppercase !important; cursor: pointer !important; white-space: nowrap !important; box-shadow: none !important;">
                            PUBLISH EVENT
                        </button>
                    </div>
                </form>
            </div>

        </main>
    </div>
@endsection
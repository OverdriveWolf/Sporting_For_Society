@extends('layouts.app')

@section('content')
    <div class="bg-[#f8f9fa] min-h-screen flex text-gray-900">

        <!-- Left Sidebar (Organizer Management) -->
        <aside class="w-64 bg-white border-r border-gray-200 min-h-screen p-6 hidden md:block flex-shrink-0">
            <div class="mb-8">
                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block mb-4">ORGANIZER
                    MANAGEMENT</span>
                <nav class="space-y-1">
                    <!-- Active Sidebar Item -->
                    <a href="{{ route('organizer.dashboard') }}" style="background-color: #f3f9d2;"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl font-bold text-xs text-black border border-[#dce8a3]">
                        <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                        Dashboard
                    </a>

                    <a href="#"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl font-semibold text-xs text-gray-500 hover:bg-gray-50 hover:text-black transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        My Events
                    </a>

                    <a href="{{ route('events.create') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl font-semibold text-xs text-gray-500 hover:bg-gray-50 hover:text-black transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        Create Event
                    </a>

                    <a href="#"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl font-semibold text-xs text-gray-500 hover:bg-gray-50 hover:text-black transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        Participants
                    </a>

                    <a href="#"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl font-semibold text-xs text-gray-500 hover:bg-gray-50 hover:text-black transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Settings
                    </a>
                </nav>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 p-6 lg:p-10 max-w-6xl">

            <!-- Top Section Header -->
            <div class="flex justify-between items-start mb-8">
                <div>
                    <h1 class="text-3xl font-black uppercase italic tracking-tight text-black">ORGANIZER DASHBOARD</h1>
                    <p class="text-xs text-gray-500 mt-1">Manage your matches, review players, and program upcoming events.
                    </p>
                </div>
                <a href="{{ route('events.create') }}"
                    class="bg-black text-white text-xs font-bold uppercase tracking-wider px-4 py-2.5 rounded-lg hover:bg-gray-800 transition-colors shadow-sm">
                    + CREATE NEW EVENT
                </a>
            </div>

            <!-- 4 Stat Cards Row -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                <div class="bg-white p-5 rounded-xl border border-gray-200/80 shadow-sm">
                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">TOTAL EVENTS</span>
                    <div class="text-2xl font-black text-black mt-1">{{ $totalEvents ?? 24 }}</div>
                    <span class="text-[10px] text-gray-400 mt-1 block">Managed events</span>
                </div>

                <div class="bg-white p-5 rounded-xl border border-gray-200/80 shadow-sm">
                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">ACTIVE PARTICIPANTS</span>
                    <div class="text-2xl font-black text-black mt-1">{{ number_format($activeParticipants ?? 1240) }}</div>
                    <span class="text-[10px] text-gray-400 mt-1 block">Verified athletes</span>
                </div>

                <div class="bg-white p-5 rounded-xl border border-gray-200/80 shadow-sm">
                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">UPCOMING THIS WEEK</span>
                    <div class="text-2xl font-black text-black mt-1">8</div>
                    <span class="text-[10px] text-gray-400 mt-1 block">Scheduled matches</span>
                </div>

                <div class="bg-white p-5 rounded-xl border border-gray-200/80 shadow-sm">
                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">AVG ATTENDANCE</span>
                    <div class="text-2xl font-black text-black mt-1">92%</div>
                    <span class="text-[10px] text-gray-400 mt-1 block">Completed spots</span>
                </div>
            </div>

            <!-- Managed Events Table Card -->
            <div class="bg-white rounded-xl border border-gray-200/80 p-6 shadow-sm mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-base font-extrabold text-black uppercase italic tracking-tight">MANAGED EVENTS</h2>
                    <button type="button"
                        class="border border-gray-200 text-gray-700 text-xs font-bold px-3 py-1.5 rounded-lg hover:bg-gray-50 transition-colors">
                        Export CSV
                    </button>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr
                                class="text-[10px] font-bold text-gray-400 uppercase tracking-wider border-b border-gray-100">
                                <th class="pb-3 px-2">EVENT NAME</th>
                                <th class="pb-3 px-2">SPORT</th>
                                <th class="pb-3 px-2">DATE & TIME</th>
                                <th class="pb-3 px-2">LOCATION</th>
                                <th class="pb-3 px-2">SPOTS</th>
                                <th class="pb-3 px-2">STATUS</th>
                                <th class="pb-3 px-2 text-right">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-xs text-gray-600">
                            @forelse($managedEvents as $event)
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="py-3.5 px-2 font-bold text-black">{{ $event->title }}</td>
                                    <td class="py-3.5 px-2 text-gray-500">{{ $event->category->name ?? 'General' }}</td>
                                    <td class="py-3.5 px-2 text-gray-500">
                                        {{ \Carbon\Carbon::parse($event->event_date)->format('M d, g:i A') }}</td>
                                    <td class="py-3.5 px-2 text-gray-500">{{ $event->location }}</td>
                                    <td class="py-3.5 px-2 font-bold text-black">
                                        {{ $event->participants_count ?? 0 }}/{{ $event->max_participants ?? 16 }}</td>
                                    <td class="py-3.5 px-2">
                                        <span
                                            class="bg-sky-100 text-sky-700 font-bold text-[9px] px-2 py-0.5 rounded-full uppercase">
                                            ACTIVE
                                        </span>
                                    </td>
                                    <td class="py-3.5 px-2 text-right">
                                        <div class="flex items-center justify-end gap-2">
                                            <!-- View Icon -->
                                            <a href="{{ route('events.show', $event->id) }}"
                                                class="text-gray-400 hover:text-black">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                            <!-- Edit Icon -->
                                            <a href="{{ route('events.edit', $event->id) }}"
                                                class="text-gray-400 hover:text-black">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>
                                            <!-- Delete Icon -->
                                            <form method="POST" action="{{ route('events.destroy', $event->id) }}"
                                                class="inline" onsubmit="return confirm('Delete this event?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-400 hover:text-red-600">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
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

            <!-- Quick Create New Event Card (Updated Field Names) -->
            <div class="bg-white rounded-xl border border-gray-200/80 p-6 shadow-sm">
                <h2 class="text-base font-extrabold text-black uppercase italic tracking-tight mb-4">QUICK CREATE NEW EVENT
                </h2>

                <form method="POST" action="{{ route('events.store') }}" class="space-y-4">
                    @csrf

                    <!-- Row 1: Title & Category -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="md:col-span-2">
                            <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-wider mb-1">EVENT
                                NAME *</label>
                            <input type="text" name="title" value="{{ old('title') }}" required
                                placeholder="e.g., Sunset Co-ed Singles Match"
                                class="w-full bg-gray-50/80 border border-gray-200 rounded-lg px-3 py-2 text-xs text-gray-800 placeholder-gray-400 focus:outline-none focus:bg-white focus:border-black transition-colors">
                            @error('title') <span class="text-red-500 text-[10px] mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-wider mb-1">SPORT
                                CATEGORY *</label>
                            <select name="category_id" required
                                class="w-full bg-gray-50/80 border border-gray-200 rounded-lg px-3 py-2 text-xs text-gray-800 focus:outline-none focus:bg-white focus:border-black transition-colors">
                                <option value="">Select a Category</option>
                                @foreach($categories ?? [] as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div style="margin-bottom: 1rem;">
                                <label style="display:block; font-size:0.8rem; font-weight:700; margin-bottom:0.3rem;">EVENT STATUS</label>
                                <select name="status" style="width:100%; padding:0.6rem; border:1px solid #cbd5e1; border-radius:6px; background:#fff;">
                                    <option value="ACTIVE" {{ (isset($event) && $event->status == 'ACTIVE') ? 'selected' : '' }}>ACTIVE</option>
                                    <option value="COMPLETED" {{ (isset($event) && $event->status == 'COMPLETED') ? 'selected' : '' }}>COMPLETED</option>
                                    <option value="CANCELLED" {{ (isset($event) && $event->status == 'CANCELLED') ? 'selected' : '' }}>CANCELLED</option>
                                    <option value="DRAFT" {{ (isset($event) && $event->status == 'DRAFT') ? 'selected' : '' }}>DRAFT</option>
                                </select>
                            </div>
                            @error('category_id') <span class="text-red-500 text-[10px] mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Row 2: Date, Location, Max Participants -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-wider mb-1">DATE &
                                TIME *</label>
                            <input type="datetime-local" name="event_date" value="{{ old('event_date') }}" required
                                class="w-full bg-gray-50/80 border border-gray-200 rounded-lg px-3 py-2 text-xs text-gray-800 focus:outline-none focus:bg-white focus:border-black transition-colors">
                            @error('event_date') <span class="text-red-500 text-[10px] mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-wider mb-1">LOCATION
                                *</label>
                            <input type="text" name="location" value="{{ old('location') }}" required
                                placeholder="e.g., McCarren Park Courts"
                                class="w-full bg-gray-50/80 border border-gray-200 rounded-lg px-3 py-2 text-xs text-gray-800 placeholder-gray-400 focus:outline-none focus:bg-white focus:border-black transition-colors">
                            @error('location') <span class="text-red-500 text-[10px] mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-wider mb-1">MAX
                                PARTICIPANTS *</label>
                            <input type="number" name="max_participants" value="{{ old('max_participants', 16) }}" min="2"
                                max="100" required
                                class="w-full bg-gray-50/80 border border-gray-200 rounded-lg px-3 py-2 text-xs text-gray-800 focus:outline-none focus:bg-white focus:border-black transition-colors">
                            @error('max_participants') <span
                            class="text-red-500 text-[10px] mt-1 block">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Row 3: Description -->
                    <div>
                        <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-wider mb-1">DESCRIPTION &
                            RULES *</label>
                        <textarea name="description" rows="3" required
                            placeholder="Describe required skill level, equipment to bring, format..."
                            class="w-full bg-gray-50/80 border border-gray-200 rounded-lg p-3 text-xs text-gray-800 placeholder-gray-400 focus:outline-none focus:bg-white focus:border-black transition-colors">{{ old('description') }}</textarea>
                        @error('description') <span class="text-red-500 text-[10px] mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Buttons Row -->
                    <div class="flex justify-end items-center gap-3 pt-2">
                        <button type="button"
                            class="text-xs font-bold text-gray-600 hover:text-black px-4 py-2 rounded-lg transition-colors">
                            Save as Draft
                        </button>
                        <button type="submit"
                            class="bg-black text-white text-xs font-extrabold uppercase tracking-wider px-5 py-2.5 rounded-lg hover:bg-gray-800 transition-colors shadow-sm">
                            PUBLISH EVENT
                        </button>
                    </div>
                </form>
            </div>

        </main>
    </div>
@endsection
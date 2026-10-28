@extends('layouts.app')

@section('content')
    @php
        $getSportImage = function ($sportName) {
            $sportName = strtolower($sportName ?? '');
            if (str_contains($sportName, 'tennis')) {
                return 'https://images.unsplash.com/photo-1595435934249-5df7ed86e1c0?q=80&w=800&auto=format&fit=crop';
            } elseif (str_contains($sportName, 'soccer')) {
                return 'https://images.unsplash.com/photo-1574629810360-7efbbe195018?q=80&w=800&auto=format&fit=crop';
            } elseif (str_contains($sportName, 'football')) {
                return 'https://images.unsplash.com/photo-1574629810360-7efbbe195018?q=80&w=800&auto=format&fit=crop';
            } elseif (str_contains($sportName, 'run') || str_contains($sportName, 'track')) {
                return 'https://images.unsplash.com/photo-1452626038306-9aae5e071dd3?q=80&w=800&auto=format&fit=crop';
            } elseif (str_contains($sportName, 'basket')) {
                return 'https://images.unsplash.com/photo-1546519638-68e109498ffc?q=80&w=800&auto=format&fit=crop';
            } elseif (str_contains($sportName, 'cycl')) {
                return 'https://images.unsplash.com/photo-1541625602330-2277a4c46182?q=80&w=800&auto=format&fit=crop';
            } elseif (str_contains($sportName, 'swim')) {
                return 'https://images.unsplash.com/photo-1530549387789-4c1017266635?q=80&w=800&auto=format&fit=crop';
            }
            return 'https://images.unsplash.com/photo-1461896836934-ffe607ba8211?q=80&w=800&auto=format&fit=crop';
        };
    @endphp

    <div class="min-h-screen transition-colors duration-200">

        <!-- Filter & Navigation Bar -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
            <form method="GET" action="{{ route('events.index') }}"
                style="display: flex; gap: 0.5rem; align-items: center; flex: 1; max-width: 600px;">
                
                <!-- Search Input -->
                <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}"
                    :style="darkMode ? 'background-color: #1f2937 !important; border-color: #374151 !important; color: #ffffff !important;' : 'background-color: #ffffff !important; border-color: #cbd5e1 !important; color: #0f172a !important;'"
                    style="padding: 0.5rem 0.75rem; border: 1px solid; border-radius: 6px; font-size: 0.9rem; width: 220px; outline: none;">

                <!-- Category Select Dropdown -->
                <select name="category_id"
                    :style="darkMode ? 'background-color: #1f2937 !important; border-color: #374151 !important; color: #ffffff !important;' : 'background-color: #ffffff !important; border-color: #cbd5e1 !important; color: #0f172a !important;'"
                    style="padding: 0.5rem 0.75rem; border: 1px solid; border-radius: 6px; font-size: 0.9rem; outline: none;">
                    <option value="" :style="darkMode ? 'background-color: #1f2937; color: #ffffff;' : 'background-color: #ffffff; color: #0f172a;'">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" :style="darkMode ? 'background-color: #1f2937; color: #ffffff;' : 'background-color: #ffffff; color: #0f172a;'" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                <button type="submit"
                    :style="darkMode ? 'background: #334155; color: #ffffff;' :  color: #fff;'"
                    style="padding: 0.5rem 1rem; border-radius: 6px; font-weight: 600; border: none; cursor: pointer; font-size: 0.875rem;">Filter</button>
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
                    <h2
                        class="font-['Impact','Arial_Black',sans-serif] text-[1.35rem] tracking-[0.5px] m-0 text-slate-900 dark:text-white uppercase">
                        UPCOMING EVENTS IN BROOKLYN
                    </h2>
                </div>

                @forelse($events as $event)
                    @php
                        $sportLabel = $event->category->name ?? $event->sport ?? 'SPORT';
                        $cardImageUrl = $event->image_url ?? $getSportImage($sportLabel);
                    @endphp

                    <!-- PROFILE-STYLED CARD -->
                    <div :style="darkMode ? 'background-color: #1f2937; border-color: #374151;' : 'background-color: #fff; border-color: #f3f4f6;'"
                        style="border-radius: 16px; overflow: hidden; border-width: 1px; border-style: solid; box-shadow: 0 1px 2px rgba(0,0,0,0.03); display: flex; flex-direction: column; justify-content: space-between;">
                        
                        <div>
                            <!-- Banner Image -->
                            <div style="height: 160px; background-color: #1e293b; overflow: hidden;">
                                <img src="{{ $cardImageUrl }}" alt="{{ $event->title }}"
                                    style="width: 100%; height: 100%; object-fit: cover;">
                            </div>

                            <!-- Card Details Body -->
                            <div style="padding: 1.25rem;">
                                <!-- Sport Badge -->
                                <span
                                    style="background-color: #ccff00; color: #000; font-size: 9px; font-weight: 900; text-transform: uppercase; padding: 0.2rem 0.5rem; border-radius: 4px; display: inline-block; margin-bottom: 0.5rem;">
                                    {{ $sportLabel }}
                                </span>

                                <!-- Title (Bold Italic Uppercase) -->
                                <h3 :style="darkMode ? 'color: #ffffff;' : 'color: #000;'"
                                    style="font-size: 1.125rem; font-weight: 900; text-transform: uppercase; font-style: italic; line-height: 1.2; margin-bottom: 0.5rem; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                    {{ $event->title }}
                                </h3>

                                <!-- Date & Location -->
                                <div style="font-size: 0.75rem; color: #6b7280; display: flex; flex-direction: column; gap: 0.25rem; margin-bottom: 1rem;">
                                    <span>📅 {{ $event->event_date->format('M d, g:i A') }}</span>
                                    <span>📍 {{ $event->location }}</span>
                                </div>

                                <!-- Progress Header -->
                                @php
                                    $count = $event->participants->count();
                                    $max = $event->max_participants > 0 ? $event->max_participants : 20;
                                    $pct = min(100, ($count / $max) * 100);
                                @endphp
                                <div :style="darkMode ? 'color: #ffffff;' : 'color: #000;'"
                                    style="display: flex; justify-content: space-between; align-items: center; font-size: 10px; font-weight: 800; margin-bottom: 0.25rem;">
                                    <span style="color: #9ca3af;">Spots</span>
                                    <span>{{ $count }} / {{ $max }}</span>
                                </div>

                                <!-- Progress Bar -->
                                <div :style="darkMode ? 'background-color: #374151;' : 'background-color: #f3f4f6;'"
                                    style="width: 100%; height: 6px; border-radius: 9999px; overflow: hidden; margin-bottom: 1rem;">
                                    <div style="width: {{ $pct }}%; height: 100%; background-color: #ccff00;"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Card Action Footer -->
                        <div style="padding: 0 1.25rem 1.25rem 1.25rem;">
                            <a href="{{ route('events.show', $event) }}"
                                style="display: block; width: 100%; background-color: #000000; color: #ccff00; text-align: center; padding: 0.6rem 0; border-radius: 8px; font-size: 0.75rem; font-weight: 900; text-decoration: none; text-transform: uppercase; letter-spacing: 0.05em;">
                                View Event
                            </a>
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
                <div :style="darkMode ? 'background: #111827; border-color: #1f2937;' : 'background: #fff; border-color: #e2e8f0;'"
                    style="border: 1px solid; border-radius: 12px; padding: 1rem;">
                    <h4 :style="darkMode ? 'color: #ffffff;' : 'color: #0f172a;'"
                        style="font-family: 'Impact', 'Arial Black', sans-serif; margin: 0 0 0.85rem 0; font-size: 0.85rem; letter-spacing: 0.5px; text-transform: uppercase;">
                        UPCOMING MY EVENTS
                    </h4>

                    <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                        <div :style="darkMode ? 'border-bottom-color: #1f2937;' : 'border-bottom-color: #f1f5f9;'"
                            style="display: flex; align-items: center; gap: 0.6rem; padding-bottom: 0.6rem; border-bottom-width: 1px; border-bottom-style: solid;">
                            <div style="width: 32px; height: 32px; background: #334155; border-radius: 6px; flex-shrink: 0;">
                            </div>
                            <div>
                                <div :style="darkMode ? 'color: #ffffff;' : 'color: #0f172a;'" style="font-size: 0.75rem; font-weight: 800;">Weekend Clay Singles</div>
                                <div style="font-size: 0.675rem; color: #64748b;">Today, 6:00 PM</div>
                            </div>
                        </div>

                        <div style="display: flex; align-items: center; gap: 0.6rem;">
                            <div style="width: 32px; height: 32px; background: #334155; border-radius: 6px; flex-shrink: 0;">
                            </div>
                            <div>
                                <div :style="darkMode ? 'color: #ffffff;' : 'color: #0f172a;'" style="font-size: 0.75rem; font-weight: 800;">Metro Elite League Match
                                </div>
                                <div style="font-size: 0.675rem; color: #64748b;">Aug 28, 8:00 PM</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Suggested For You Card -->
                <div :style="darkMode ? 'background: #111827; border-color: #1f2937;' : 'background: #fff; border-color: #e2e8f0;'"
                    style="border: 1px solid; border-radius: 12px; padding: 1rem;">
                    <h4 :style="darkMode ? 'color: #ffffff;' : 'color: #0f172a;'"
                        style="font-family: 'Impact', 'Arial Black', sans-serif; margin: 0 0 0.85rem 0; font-size: 0.85rem; letter-spacing: 0.5px; text-transform: uppercase;">
                        SUGGESTED FOR YOU
                    </h4>

                    <div style="display: flex; flex-direction: column; gap: 0.85rem;">
                        <div>
                            <div :style="darkMode ? 'color: #ffffff;' : 'color: #0f172a;'" style="font-size: 0.75rem; font-weight: 800;">Fast-paced 5v5 Soccer</div>
                            <div style="font-size: 0.7rem; color: #64748b; margin-top: 0.1rem;">McCarren Turf • 4 spots left
                            </div>
                            <div
                                style="font-size: 0.625rem; font-weight: 800; color: #16a34a; text-transform: uppercase; margin-top: 0.2rem;">
                                Matches your skill (Level 3)</div>
                        </div>

                        <div :style="darkMode ? 'border-top-color: #1f2937;' : 'border-top-color: #f1f5f9;'"
                            style="border-top-width: 1px; border-top-style: solid; padding-top: 0.6rem;">
                            <div :style="darkMode ? 'color: #ffffff;' : 'color: #0f172a;'" style="font-size: 0.75rem; font-weight: 800;">Advanced Tennis Round-Robin</div>
                            <div style="font-size: 0.7rem; color: #64748b; margin-top: 0.1rem;">Prospect Park Courts • 1 spot
                                left</div>
                            <div
                                style="font-size: 0.625rem; font-weight: 800; color: #2563eb; text-transform: uppercase; margin-top: 0.2rem;">
                                Popular near your location</div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
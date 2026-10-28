@extends('layouts.app')

@section('content')
    <div
        style="max-width: 1200px; margin: 0 auto; padding: 20px; font-family: 'Inter', system-ui, -apple-system, sans-serif;">

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
            $mainSportLabel = $event->category->name ?? $event->sport ?? 'TENNIS';
            $heroImageUrl = $event->image_url ?? $getSportImage($mainSportLabel);
        @endphp

        <!-- Panoramic Hero Banner Image -->
        <div
            style="width: 100%; height: 280px; border-radius: 12px; overflow: hidden; margin-bottom: 24px; position: relative; background: #1e293b; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
            <img src="{{ $heroImageUrl }}" alt="{{ $event->title }}" style="width: 100%; height: 100%; object-fit: cover;">
        </div>

        <!-- Main Grid: Event Details (Left) + Action Cards (Right) -->
        <div style="display: grid; grid-template-columns: 1fr 300px; gap: 32px; align-items: start; margin-bottom: 48px;">

            <!-- Left Main Content Area -->
            <div>
                <!-- Category Tag -->
                <span
                    style="display: inline-block; background-color: #d9f99d; color: #1a2e05; padding: 3px 8px; border-radius: 4px; font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;">
                    {{ $mainSportLabel }} • MATCH MAKING
                </span>

                <!-- Main Title -->
                <h1 :style="darkMode ? 'color: #ffffff;' : 'color: #0f172a;'"
                    style="font-family: 'Impact', 'Arial Black', sans-serif; font-size: 32px; letter-spacing: 0.5px; text-transform: uppercase; margin: 0 0 20px 0; line-height: 1.1;">
                    {{ $event->title }}
                </h1>

                <!-- Meta Row: Date, Location, Organizer -->
                <div :style="darkMode ? 'border-bottom-color: #374151;' : 'border-bottom-color: #e2e8f0;'"
                    style="display: flex; gap: 24px; align-items: center; border-bottom-width: 1px; border-bottom-style: solid; padding-bottom: 20px; margin-bottom: 24px; flex-wrap: wrap;">
                    <div style="display: flex; align-items: center; gap: 8px; font-size: 13px;">
                        <span style="font-size: 16px;">📅</span>
                        <div>
                            <div style="font-size: 10px; font-weight: 800; color: #64748b; text-transform: uppercase;">Date
                                & Time</div>
                            <div :style="darkMode ? 'color: #ffffff;' : 'color: #334155;'" style="font-weight: 700;">
                                {{ $event->event_date ? $event->event_date->format('l, M j • g:i A') : 'Saturday, Jan 28 • 5:00 PM' }}
                            </div>
                        </div>
                    </div>

                    <div style="display: flex; align-items: center; gap: 8px; font-size: 13px;">
                        <span style="font-size: 16px;">📍</span>
                        <div>
                            <div style="font-size: 10px; font-weight: 800; color: #64748b; text-transform: uppercase;">
                                Location</div>
                            <div :style="darkMode ? 'color: #ffffff;' : 'color: #334155;'" style="font-weight: 700;">
                                {{ $event->location }}</div>
                        </div>
                    </div>

                    <div style="display: flex; align-items: center; gap: 8px; font-size: 13px;">
                        <span style="font-size: 16px;">👤</span>
                        <div>
                            <div style="font-size: 10px; font-weight: 800; color: #64748b; text-transform: uppercase;">
                                Organized by</div>
                            <div :style="darkMode ? 'color: #ffffff;' : 'color: #334155;'" style="font-weight: 700;">
                                {{ $event->organizer->name ?? 'Community Host' }}</div>
                        </div>
                    </div>
                </div>

                <!-- About Session Section -->
                <div style="margin-bottom: 32px;">
                    <h3 :style="darkMode ? 'color: #ffffff;' : 'color: #0f172a;'"
                        style="font-family: 'Impact', 'Arial Black', sans-serif; font-size: 16px; text-transform: uppercase; margin: 0 0 12px 0;">
                        ABOUT THE SESSION
                    </h3>
                    <p :style="darkMode ? 'color: #cbd5e1;' : 'color: #475569;'"
                        style="font-size: 13px; line-height: 1.6; margin: 0;">
                        {{ $event->description ?? 'Join us for a friendly, high-energy match session. Open to all players looking to test their skills and connect with other local athletes. Please bring your own gear.' }}
                    </p>
                </div>

                <!-- Participants Section -->
                <div>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                        <h3 :style="darkMode ? 'color: #ffffff;' : 'color: #0f172a;'"
                            style="font-family: 'Impact', 'Arial Black', sans-serif; font-size: 16px; text-transform: uppercase; margin: 0;">
                            PARTICIPANTS
                        </h3>
                        <span style="font-size: 11px; font-weight: 800; color: #64748b;">
                            {{ $event->participants->count() }} of {{ $event->max_participants ?? '∞' }} Spots Filled
                        </span>
                    </div>

                    <!-- Progress Line -->
                    <div :style="darkMode ? 'background-color: #374151;' : 'background-color: #e2e8f0;'"
                        style="width: 100%; height: 6px; border-radius: 3px; overflow: hidden; margin-bottom: 16px;">
                        @php
                            $percentage = ($event->max_participants && $event->max_participants > 0) ? min(100, ($event->participants->count() / $event->max_participants) * 100) : 0;
                        @endphp
                        <div style="width: {{ $percentage }}%; background: #a3e635; height: 100%;"></div>
                    </div>

                    <!-- Avatar List (Original Layout Preserved, Colors Adapted for Dark Mode) -->
                    <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                        @forelse($event->participants as $participant)
                            <div class="bg-slate-50 dark:bg-gray-800 border border-slate-200 dark:border-gray-700 text-slate-700 dark:text-gray-200"
                                style="display: flex; align-items: center; gap: 6px; padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: 700;">
                                <div
                                    style="width: 20px; height: 20px; border-radius: 50%; background: #0f172a; color: #ccff00; display: flex; align-items: center; justify-content: center; font-size: 9px;">
                                    {{ substr($participant->name, 0, 1) }}
                                </div>
                                {{ $participant->name }}
                            </div>
                        @empty
                            <p style="color: #94a3b8; font-size: 12px; margin: 0;">No players registered yet. Be the first to
                                register!</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Right Side Widgets (CTA Box & Map) -->
            <div style="display: flex; flex-direction: column; gap: 20px;">

                <!-- Registration CTA Card -->
                <div :style="darkMode ? 'background-color: #1f2937; border-color: #374151;' : 'background-color: #ffffff; border-color: #e2e8f0;'"
                    style="border-width: 1px; border-style: solid; border-radius: 12px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); text-align: center;">
                    <div
                        style="font-size: 11px; font-weight: 800; color: #64748b; text-transform: uppercase; margin-bottom: 6px;">
                        Registration Closes In
                    </div>
                    <div :style="darkMode ? 'color: #ffffff;' : 'color: #0f172a;'"
                        style="font-family: 'Impact', 'Arial Black', sans-serif; font-size: 22px; margin-bottom: 16px;">
                        2 DAYS : 14 HOURS
                    </div>

                    @auth
                        <form action="{{ route('events.register', $event) }}" method="POST">
                            @csrf
                            @if($event->participants->contains(auth()->id()))
                                <button type="submit"
                                    style="width: 100%; background: #ef4444; color: #ffffff; border: none; padding: 12px; border-radius: 8px; font-family: 'Arial Black', sans-serif; font-size: 12px; font-weight: 900; text-transform: uppercase; cursor: pointer;">
                                    Cancel Registration
                                </button>
                            @elseif($event->max_participants && $event->participants->count() >= (int) $event->max_participants)
                                <button type="button" disabled
                                    style="width: 100%; background: #94a3b8; color: #ffffff; border: none; padding: 12px; border-radius: 8px; font-family: 'Arial Black', sans-serif; font-size: 12px; font-weight: 900; text-transform: uppercase; cursor: not-allowed;">
                                    Event Full
                                </button>
                            @else
                                <button type="submit"
                                    style="width: 100%; background: #000000; color: #ccff00; border: none; padding: 12px; border-radius: 8px; font-family: 'Arial Black', sans-serif; font-size: 12px; font-weight: 900; text-transform: uppercase; cursor: pointer; letter-spacing: 0.5px;">
                                    Register Event
                                </button>
                            @endif
                        </form>
                    @else
                        <a href="{{ route('login') }}"
                            style="display: block; width: 100%; background: #000000; color: #ccff00; text-decoration: none; padding: 12px; border-radius: 8px; font-family: 'Arial Black', sans-serif; font-size: 12px; font-weight: 900; text-transform: uppercase; box-sizing: border-box;">
                            Log In to Register
                        </a>
                    @endauth

                    <!-- Secondary Share Action -->
                    <button type="button"
                        :style="darkMode ? 'background-color: #374151; border-color: #4b5563; color: #ffffff;' : 'background-color: #ffffff; border-color: #e2e8f0; color: #334155;'"
                        style="width: 100%; border-width: 1px; border-style: solid; padding: 8px; border-radius: 8px; font-weight: 700; font-size: 11px; margin-top: 10px; cursor: pointer;">
                        🔗 Share Event
                    </button>

                    <!-- Bullet Perks -->
                    <ul
                        style="text-align: left; padding-left: 16px; margin: 16px 0 0 0; font-size: 11px; color: #64748b; line-height: 1.5;">
                        <li>Verified Host & Player Badge</li>
                        <li>Free Cancellation up to 24 hours prior</li>
                        <li>Direct messaging with participants</li>
                    </ul>
                </div>

                <!-- Location Map Widget Placeholder -->
                <div :style="darkMode ? 'background-color: #1f2937; border-color: #374151;' : 'background-color: #ffffff; border-color: #e2e8f0;'"
                    style="border-width: 1px; border-style: solid; border-radius: 12px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                    <div
                        style="height: 120px; background: #e2e8f0; display: flex; align-items: center; justify-content: center; position: relative;">
                        <img src="https://images.unsplash.com/photo-1524661135-423995f22d0b?q=80&w=400&auto=format&fit=crop"
                            alt="Map Preview" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.8;">
                        <div
                            style="position: absolute; background: #000; color: #ccff00; padding: 4px 8px; border-radius: 4px; font-size: 10px; font-weight: 900; text-transform: uppercase;">
                            📍 Event Location
                        </div>
                    </div>
                    <div style="padding: 12px;">
                        <div :style="darkMode ? 'color: #ffffff;' : 'color: #0f172a;'"
                            style="font-size: 11px; font-weight: 800;">{{ $event->location }}</div>
                        <div style="font-size: 10px; color: #64748b; margin-top: 2px;">Verified Court Grounds</div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Bottom Section: Other Events You Might Like -->
        <div :style="darkMode ? 'border-top-color: #374151;' : 'border-top-color: #e2e8f0;'"
            style="border-top-width: 1px; border-top-style: solid; padding-top: 32px; margin-top: 16px;">
            <h3 :style="darkMode ? 'color: #ffffff;' : 'color: #0f172a;'"
                style="font-family: 'Impact', 'Arial Black', sans-serif; font-size: 20px; text-transform: uppercase; margin: 0 0 20px 0;">
                OTHER EVENTS YOU MIGHT LIKE
            </h3>

            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
                @php
                    $relatedEvents = $relatedEvents ?? \App\Models\Event::where('id', '!=', $event->id)->latest()->take(3)->get();
                @endphp

                @forelse($relatedEvents as $relatedEvent)
                    @php
                        $sportLabel = $relatedEvent->category->name ?? $relatedEvent->sport ?? 'SPORT';
                        $imageUrl = $relatedEvent->image_url ?? $getSportImage($sportLabel);
                    @endphp
                    <div :style="darkMode ? 'background-color: #1f2937; border-color: #374151;' : 'background-color: #ffffff; border-color: #e2e8f0;'"
                        style="border-width: 1px; border-style: solid; border-radius: 12px; overflow: hidden; display: flex; flex-direction: column; justify-content: space-between;">
                        <div>
                            <div style="height: 120px; background: #1e293b; position: relative; overflow: hidden;">
                                <img src="{{ $imageUrl }}" alt="{{ $relatedEvent->title }}"
                                    style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div style="padding: 12px;">
                                <span
                                    style="background: #ccff00; color: #000; padding: 2px 6px; border-radius: 3px; font-size: 9px; font-weight: 900; text-transform: uppercase; display: inline-block; margin-bottom: 4px;">
                                    {{ $sportLabel }}
                                </span>
                                <h4 :style="darkMode ? 'color: #ffffff;' : 'color: #0f172a;'"
                                    style="font-family: 'Impact', 'Arial Black', sans-serif; font-size: 13px; text-transform: uppercase; font-style: italic; margin: 4px 0 6px 0; line-height: 1.2;">
                                    {{ $relatedEvent->title }}
                                </h4>
                                <div style="font-size: 11px; color: #64748b; margin-bottom: 4px;">
                                    📅
                                    {{ $relatedEvent->event_date ? $relatedEvent->event_date->format('M d, g:i A') : 'Coming Soon' }}
                                </div>
                            </div>
                        </div>
                        <div style="padding: 0 12px 12px 12px;">
                            <a href="{{ route('events.show', $relatedEvent) }}"
                                style="display: block; width: 100%; background: #000; color: #ccff00; text-align: center; padding: 8px 0; border-radius: 6px; font-family: 'Arial Black', sans-serif; font-size: 10px; font-weight: 900; text-decoration: none; text-transform: uppercase; box-sizing: border-box;">
                                View Event
                            </a>
                        </div>
                    </div>
                @empty
                    <p style="grid-column: 1/-1; color: #64748b; font-size: 13px;">No other events available right now.</p>
                @endforelse
            </div>
        </div>

    </div>
@endsection
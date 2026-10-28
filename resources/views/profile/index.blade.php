@extends('layouts.app')

@section('content')
    <div class="bg-[#f8f9fa] dark:bg-gray-950 min-h-screen text-gray-900 dark:text-gray-100 font-sans w-full pb-16 transition-colors duration-200">

        <!-- Top Profile Header Card -->
        <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800"
            style="border-radius: 24px; padding: 2rem; margin-bottom: 2rem; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1.5rem;">

                <!-- User Info Left Section -->
                <div style="display: flex; align-items: center; gap: 1.5rem;">
                    <img src="{{ $user->avatar_url ?? 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80' }}"
                        alt="{{ $user->name ?? 'Sarah Jenkins' }}"
                        style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover;">

                    <div>
                        <h1 class="text-black dark:text-white"
                            style="font-size: 2rem; font-weight: 900; text-transform: uppercase; letter-spacing: -0.025em; line-height: 1.1;">
                            {{ $user->name ?? 'SARAH JENKINS' }}
                        </h1>

                        <div
                            style="display: flex; align-items: center; gap: 1rem; color: #9ca3af; font-size: 0.75rem; margin-top: 0.5rem;">
                            <span style="display: flex; align-items: center; gap: 0.25rem;">
                                <svg style="width: 0.875rem; height: 0.875rem;" fill="none" stroke="currentColor"
                                    stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Member since {{ $user->created_at ? $user->created_at->format('F Y') : 'April 2024' }}
                            </span>
                            <span style="display: flex; align-items: center; gap: 0.25rem;">
                                <svg style="width: 0.875rem; height: 0.875rem;" fill="none" stroke="currentColor"
                                    stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ $user->location ?? 'Netherlands, North-Brabant' }}
                            </span>
                        </div>

                        <!-- Preferred Sport Badges -->
                        <div style="display: flex; gap: 0.5rem; margin-top: 0.75rem; flex-wrap: wrap;">
                            @foreach($sports ?? ['Tennis', 'Soccer', 'Running', 'Volleyball'] as $sport)
                                <span class="bg-[#f3f4f6] dark:bg-gray-800 text-[#1f2937] dark:text-gray-200"
                                    style="font-size: 0.7rem; font-weight: 700; padding: 0.25rem 0.75rem; border-radius: 9999px;">
                                    {{ $sport }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Header Stats Right Section -->
                <div style="display: flex; align-items: center; gap: 2rem;">
                    <div style="text-align: center;">
                        <span class="text-black dark:text-white"
                            style="font-size: 1.75rem; font-weight: 900; line-height: 1; display: block;">{{ $registeredEvents->count() ?? 28 }}</span>
                        <span
                            style="font-size: 10px; font-weight: 800; color: #9ca3af; text-transform: uppercase;">EVENTS</span>
                    </div>
                    <div style="text-align: center;">
                        <span class="text-black dark:text-white"
                            style="font-size: 1.75rem; font-weight: 900; line-height: 1; display: block;">6</span>
                        <span
                            style="font-size: 10px; font-weight: 800; color: #9ca3af; text-transform: uppercase;">SPORTS</span>
                    </div>
                    <div style="text-align: center;">
                        <span class="text-black dark:text-white"
                            style="font-size: 1.75rem; font-weight: 900; line-height: 1; display: block;">4</span>
                        <span
                            style="font-size: 10px; font-weight: 800; color: #9ca3af; text-transform: uppercase;">CREWS</span>
                    </div>
                    <div style="text-align: center;">
                        <span class="text-black dark:text-white" style="font-size: 1.75rem; font-weight: 900; line-height: 1; display: block;">5
                            wks</span>
                        <span
                            style="font-size: 10px; font-weight: 800; color: #9ca3af; text-transform: uppercase;">STREAK</span>
                    </div>

                    
                    <a href="{{ route('profile.edit') }}" class="border border-gray-200 dark:border-gray-700 text-black dark:text-white"
                        style="font-size: 0.75rem; font-weight: 700; padding: 0.5rem 1rem; border-radius: 8px; text-decoration: none; margin-left: 0.5rem;">
                        Edit Profile
                    </a>
                </div>

            </div>
        </div>

        <!-- Tab Navigation -->
        <div class="border-b border-gray-200 dark:border-gray-800" style="margin-bottom: 2rem; display: flex; gap: 2rem;">
            <a href="#" class="border-b-2 border-black dark:border-white text-black dark:text-white"
                style="font-weight: 800; font-size: 0.875rem; padding-bottom: 0.75rem; text-decoration: none;">My
                Events</a>
            <a href="#"
                style="font-weight: 600; font-size: 0.875rem; padding-bottom: 0.75rem; color: #6b7280; text-decoration: none;">Activity
                History</a>
            <a href="#"
                style="font-weight: 600; font-size: 0.875rem; padding-bottom: 0.75rem; color: #6b7280; text-decoration: none;">Achievements</a>
            <a href="#"
                style="font-weight: 600; font-size: 0.875rem; padding-bottom: 0.75rem; color: #6b7280; text-decoration: none;">Saved
                Events</a>
        </div>

        <!-- Main Content Layout (2 Columns) -->
        <div style="display: flex; gap: 2rem; align-items: flex-start; flex-wrap: wrap;">

            <!-- Left Column: Registered & Bookmarked Events -->
            <div style="flex: 2; min-width: 320px; display: flex; flex-direction: column; gap: 2.5rem;">

                <!-- SECTION 1: MY REGISTERED EVENTS (UPCOMING) -->
                <div>
                    <h2 class="text-black dark:text-white"
                        style="font-size: 1.25rem; font-weight: 900; text-transform: uppercase; font-style: italic; margin-bottom: 1.25rem; letter-spacing: -0.025em;">
                        MY REGISTERED EVENTS (UPCOMING)
                    </h2>

                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.25rem;">

                        @forelse($registeredEvents ?? [] as $event)
                            <div class="bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-800"
                                style="border-radius: 16px; overflow: hidden; box-shadow: 0 1px 2px rgba(0,0,0,0.03);">
                                <div style="height: 160px; background-color: #1e293b; overflow: hidden;">
                                    @if(isset($event->image_url) && $event->image_url)
                                        <img src="{{ $event->image_url }}" alt="{{ $event->title }}"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    @else
                                        <div
                                            style="display: flex; align-items: center; justify-content: center; height: 100%; color: #94a3b8; font-size: 0.8rem; font-weight: 700; text-transform: uppercase;">
                                            {{ $event->category->name ?? 'Sport' }}
                                        </div>
                                    @endif
                                </div>
                                <div style="padding: 1.25rem;">
                                    <span
                                        style="background-color: #ccff00; color: #000; font-size: 9px; font-weight: 900; text-transform: uppercase; padding: 0.2rem 0.5rem; border-radius: 4px; display: inline-block; margin-bottom: 0.5rem;">
                                        {{ $event->category->name ?? 'SPORT' }}
                                    </span>
                                    <h3 class="text-black dark:text-white"
                                        style="font-size: 1.125rem; font-weight: 900; text-transform: uppercase; font-style: italic; line-height: 1.2; margin-bottom: 0.5rem;">
                                        {{ $event->title }}
                                    </h3>
                                    <div
                                        style="font-size: 0.75rem; color: #6b7280; display: flex; flex-direction: column; gap: 0.25rem; margin-bottom: 1rem;">
                                        <span>📅 {{ $event->event_date->format('M d, g:i A') }}</span>
                                        <span>📍 {{ $event->location }}</span>
                                    </div>
                                    <!-- Progress Bar -->
                                    @php
                                        $count = $event->participants->count();
                                        $max = $event->max_participants > 0 ? $event->max_participants : 20;
                                        $pct = min(100, ($count / $max) * 100);
                                    @endphp
                                    <div class="text-black dark:text-white"
                                        style="display: flex; justify-content: space-between; align-items: center; font-size: 10px; font-weight: 800; margin-bottom: 0.25rem;">
                                        <span style="color: #9ca3af;">Spots</span>
                                        <span>{{ $count }} / {{ $max }}</span>
                                    </div>
                                    <div class="bg-gray-100 dark:bg-gray-800"
                                        style="width: 100%; height: 6px; border-radius: 9999px; overflow: hidden;">
                                        <div style="width: {{ $pct }}%; height: 100%; background-color: #ccff00;"></div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p style="color: #6b7280; font-size: 0.85rem;">No registered upcoming events found.</p>
                        @endforelse

                    </div>
                </div>

                <!-- SECTION 2: BOOKMARKED & SAVED -->
                <div>
                    <h2 class="text-black dark:text-white"
                        style="font-size: 1.25rem; font-weight: 900; text-transform: uppercase; font-style: italic; margin-bottom: 1.25rem; letter-spacing: -0.025em;">
                        BOOKMARKED & SAVED
                    </h2>

                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.25rem;">

                        @forelse($savedEvents ?? [] as $event)
                            <div class="bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-800"
                                style="border-radius: 16px; overflow: hidden; box-shadow: 0 1px 2px rgba(0,0,0,0.03);">
                                <div style="height: 160px; background-color: #1e293b; overflow: hidden;">
                                    @if(isset($event->image_url) && $event->image_url)
                                        <img src="{{ $event->image_url }}" alt="{{ $event->title }}"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    @else
                                        <div
                                            style="display: flex; align-items: center; justify-content: center; height: 100%; color: #94a3b8; font-size: 0.8rem; font-weight: 700; text-transform: uppercase;">
                                            {{ $event->category->name ?? 'Sport' }}
                                        </div>
                                    @endif
                                </div>
                                <div style="padding: 1.25rem;">
                                    <span
                                        style="background-color: #ccff00; color: #000; font-size: 9px; font-weight: 900; text-transform: uppercase; padding: 0.2rem 0.5rem; border-radius: 4px; display: inline-block; margin-bottom: 0.5rem;">
                                        {{ $event->category->name ?? 'SPORT' }}
                                    </span>
                                    <h3 class="text-black dark:text-white"
                                        style="font-size: 1.125rem; font-weight: 900; text-transform: uppercase; font-style: italic; line-height: 1.2; margin-bottom: 0.5rem;">
                                        {{ $event->title }}
                                    </h3>
                                    <div
                                        style="font-size: 0.75rem; color: #6b7280; display: flex; flex-direction: column; gap: 0.25rem; margin-bottom: 1rem;">
                                        <span>📅 {{ $event->event_date->format('M d, g:i A') }}</span>
                                        <span>📍 {{ $event->location }}</span>
                                    </div>
                                    @php
                                        $count = $event->participants->count();
                                        $max = $event->max_participants > 0 ? $event->max_participants : 20;
                                        $pct = min(100, ($count / $max) * 100);
                                    @endphp
                                    <div class="text-black dark:text-white"
                                        style="display: flex; justify-content: space-between; align-items: center; font-size: 10px; font-weight: 800; margin-bottom: 0.25rem;">
                                        <span style="color: #9ca3af;">Spots</span>
                                        <span>{{ $count }} / {{ $max }}</span>
                                    </div>
                                    <div class="bg-gray-100 dark:bg-gray-800"
                                        style="width: 100%; height: 6px; border-radius: 9999px; overflow: hidden;">
                                        <div style="width: {{ $pct }}%; height: 100%; background-color: #ccff00;"></div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p style="color: #6b7280; font-size: 0.85rem;">No bookmarked events found.</p>
                        @endforelse

                    </div>
                </div>

            </div>

            <!-- Right Column: Sidebar Panels (Activity History & Achievements) -->
            <div style="flex: 1; min-width: 280px; display: flex; flex-direction: column; gap: 1.5rem;">

                <!-- PANEL 1: ACTIVITY HISTORY -->
                <div class="bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-800"
                    style="border-radius: 20px; padding: 1.5rem; box-shadow: 0 1px 2px rgba(0,0,0,0.02);">
                    <h3 class="text-black dark:text-white"
                        style="font-size: 1.125rem; font-weight: 900; text-transform: uppercase; font-style: italic; margin-bottom: 1rem; letter-spacing: -0.025em;">
                        ACTIVITY HISTORY
                    </h3>

                    <div style="display: flex; flex-direction: column; gap: 0.75rem;">

                        @forelse($activityHistory ?? [] as $history)
                            <div class="bg-[#f9fafb] dark:bg-gray-800"
                                style="display: flex; align-items: center; gap: 0.85rem; padding: 0.6rem 0.75rem; border-radius: 12px;">
                                <span class="bg-white dark:bg-gray-900 text-black dark:text-white border border-gray-200 dark:border-gray-700"
                                    style="font-size: 10px; font-weight: 800; padding: 0.4rem 0.5rem; border-radius: 8px; white-space: nowrap;">
                                    {{ $history->event_date->format('M d') }}
                                </span>
                                <div>
                                    <div class="text-black dark:text-white" style="font-size: 0.8rem; font-weight: 800; line-height: 1.2;">
                                        {{ $history->title }}</div>
                                    <div style="font-size: 0.7rem; color: #9ca3af; margin-top: 2px;">⚡
                                        {{ $history->category->name ?? 'Activity' }}</div>
                                </div>
                            </div>
                        @empty
                            <p style="color: #6b7280; font-size: 0.8rem;">No past activity recorded yet.</p>
                        @endforelse

                    </div>
                </div>

                <!-- PANEL 2: ACHIEVEMENTS & BADGES -->
                <div class="bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-800"
                    style="border-radius: 20px; padding: 1.5rem; box-shadow: 0 1px 2px rgba(0,0,0,0.02);">
                    <h3 class="text-black dark:text-white"
                        style="font-size: 1.125rem; font-weight: 900; text-transform: uppercase; font-style: italic; margin-bottom: 1rem; letter-spacing: -0.025em;">
                        ACHIEVEMENTS & BADGES
                    </h3>

                    <div style="display: flex; flex-direction: column; gap: 0.75rem;">

                        @forelse($achievements ?? [] as $achievement)
                            <div class="bg-[#f9fafb] dark:bg-gray-800"
                                style="display: flex; align-items: center; gap: 0.85rem; padding: 0.75rem; border-radius: 14px;">
                                <div
                                    style="width: 36px; height: 36px; border-radius: 50%; background-color: #ccff00; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                    <svg style="width: 18px; height: 18px; color: #000;" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-black dark:text-white" style="font-size: 0.8rem; font-weight: 800;">{{ $achievement->title }}
                                    </div>
                                    <div style="font-size: 0.7rem; color: #9ca3af;">{{ $achievement->description }}</div>
                                </div>
                            </div>
                        @empty
                            <div class="bg-[#f9fafb] dark:bg-gray-800"
                                style="display: flex; align-items: center; gap: 0.85rem; padding: 0.75rem; border-radius: 14px;">
                                <div
                                    style="width: 36px; height: 36px; border-radius: 50%; background-color: #ccff00; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                    <svg style="width: 18px; height: 18px; color: #000;" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-black dark:text-white" style="font-size: 0.8rem; font-weight: 800;">First Event</div>
                                    <div style="font-size: 0.7rem; color: #9ca3af;">Attended your first matchup</div>
                                </div>
                            </div>
                        @endforelse

                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
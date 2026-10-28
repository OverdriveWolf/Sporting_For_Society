<nav style="background-color: #000000 !important; color: #ffffff;" class="border-b border-gray-800 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center" style="gap: 1.5rem;">

            <!-- Left: Lime Icon + SPORT FOR SOCIETY Title -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('homepage.index') }}" class="flex items-center" style="gap: 0.75rem;">
                    <!-- Lime Icon Box -->
                    <div style="background-color: #CCFF00; min-width: 36px; min-height: 36px;"
                        class="p-2 rounded-lg flex items-center justify-center font-bold flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="#000000" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <!-- Bold White Title -->
                    <span class="font-extrabold text-xl tracking-tight text-white uppercase italic whitespace-nowrap">
                        SPORT FOR SOCIETY
                    </span>
                </a>
            </div>
            <button @click="darkMode = !darkMode"
                class="p-2 rounded-lg bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 focus:outline-none transition-colors">
                <!-- Sun icon (Visible in Dark Mode) -->
                <svg x-show="darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                    </path>
                </svg>
                <!-- Moon icon (Visible in Light Mode) -->
                <svg x-show="!darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                </svg>
            </button>
            <!-- Middle Navigation Links with Explicit Inline Gaps -->
            <div class="flex items-center" style="gap: 2rem;">
                @auth
                    @if(auth()->user()->isOrganizer())
                        <a href="{{ route('organizer.dashboard') }}"
                            style="{{ request()->routeIs('organizer.*') ? 'color: #CCFF00; font-weight: 700;' : 'color: #d1d5db;' }}"
                            class="text-sm font-bold transition-colors">
                            discover
                        </a>
                    @endif
                    <a href="{{ route('events.index') }}" class="text-sm transition-colors whitespace-nowrap"
                        style="{{ request()->routeIs('events.*') || request()->is('/') ? 'color: #CCFF00; font-weight: 700;' : 'color: #d1d5db;' }}">
                        Events
                    </a>
                    <a href="#" class="text-sm font-medium transition-colors whitespace-nowrap"
                        style="{{ request()->routeIs('communities.*') ? 'color: #CCFF00; font-weight: 700;' : 'color: #d1d5db;' }}">
                        Communities
                    </a>
                    <a href="{{ route('profile.index') }}" class="text-sm font-medium transition-colors whitespace-nowrap"
                        style="{{ request()->routeIs('profile.*') ? 'color: #CCFF00; font-weight: 700;' : 'color: #d1d5db;' }}">
                        My Profile
                    </a>

                @else
                    <a href="{{ route('events.index') }}" class="text-sm font-medium transition-colors whitespace-nowrap"
                        style="{{ request()->routeIs('events.*') || request()->is('/') ? 'color: #CCFF00; font-weight: 700;' : 'color: #d1d5db;' }}">
                        Discover
                    </a>
                    <a href="#how-it-works"
                        class="text-sm font-medium text-gray-300 hover:text-white transition-colors whitespace-nowrap">
                        How it Works
                    </a>
                    <a href="#"
                        class="text-sm font-medium text-gray-300 hover:text-white transition-colors whitespace-nowrap">
                        Find Communities
                    </a>
                    <a href="#about"
                        class="text-sm font-medium text-gray-300 hover:text-white transition-colors whitespace-nowrap">
                        About Us
                    </a>
                @endauth
            </div>

            <!-- Right Actions: Search, Notifications, Avatar & Auth -->
            <div class="flex items-center" style="gap: 1.25rem;">
                @auth
                    <!-- Notification Bell Icon -->
                    <button type="button"
                        class="text-gray-300 hover:text-white transition-colors focus:outline-none flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>

                    <!-- Search Input Field with Properly Styled Icon -->
                    <div class="relative flex-shrink-0 flex items-center">
                        <span class="absolute left-3 flex items-center pointer-events-none text-gray-400">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </span>
                        <input type="text" placeholder="Search..."
                            style="background-color: #111827 !important; color: #e5e7eb !important; border: 1px solid #1f2937 !important; outline: none !important; border-radius: 8px !important; padding-left: 2.25rem !important; padding-right: 1rem !important; padding-top: 0.375rem !important; padding-bottom: 0.375rem !important; width: 160px !important;"
                            class="text-sm appearance-none">
                    </div>

                    <!-- User Profile Avatar & Logout Link -->
                    <div class="flex items-center flex-shrink-0" style="gap: 0.75rem;">
                        <a href="{{ route('profile.index') }}" class="block flex-shrink-0">
                            @if(auth()->user()->avatar)
                                <img class="h-9 w-9 rounded-full object-cover border border-gray-700 flex-shrink-0"
                                    style="width: 36px !important; height: 36px !important;"
                                    src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="{{ auth()->user()->name }}">
                            @else
                                <div class="rounded-full bg-gray-700 border border-gray-600 flex items-center justify-center text-xs font-bold text-white uppercase flex-shrink-0"
                                    style="width: 36px !important; height: 36px !important; min-width: 36px !important; min-height: 36px !important;">
                                    {{ substr(auth()->user()->name ?? 'U', 0, 2) }}
                                </div>
                            @endif
                        </a>

                        <!-- Logout Button -->
                        <form method="POST" action="{{ route('logout') }}" class="inline flex-shrink-0">
                            @csrf
                            <button type="submit"
                                class="text-xs font-bold uppercase tracking-wider text-gray-400 hover:text-red-400 transition-colors cursor-pointer whitespace-nowrap">
                                LOGOUT
                            </button>
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}"
                        class="text-sm font-medium text-gray-300 hover:text-white transition-colors whitespace-nowrap">
                        Sign In
                    </a>
                    <a href="{{ route('register') }}" style="background-color: #CCFF00; color: #000000;"
                        class="font-extrabold text-xs uppercase px-4 py-2 rounded-lg transition-opacity hover:opacity-90 tracking-wide whitespace-nowrap">
                        JOIN FREE
                    </a>
                @endauth
            </div>

        </div>
    </div>
</nav>
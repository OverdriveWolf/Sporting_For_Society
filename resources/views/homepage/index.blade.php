@extends('layouts.app')

@section('content')
    @php
        $getSportImage = function ($sportName) {
            $sportName = strtolower($sportName ?? '');
            if (str_contains($sportName, 'tennis')) {
                return 'https://images.unsplash.com/photo-1595435934249-5df7ed86e1c0?q=80&w=800&auto=format&fit=crop';
            } elseif (str_contains($sportName, 'soccer') || str_contains($sportName, 'football')) {
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

    <!-- Added pb-0 to remove trailing bottom spacing inside the main view wrapper -->
    <div class="bg-[#0b0f19] min-h-screen text-gray-100 font-sans selection:bg-[#ccff00] selection:text-black pb-0">

        <!-- Hero Section -->
        <section class="relative bg-[#111827] border-b border-gray-800 overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <span class="inline-block bg-[#1f2937] text-[#ccff00] text-[11px] font-black uppercase tracking-widest px-3 py-1 rounded-md border border-gray-700">
                        2024 VINTAGE SERIES 007
                    </span>
                    <h1 class="text-4xl sm:text-6xl font-black uppercase italic tracking-tighter text-white leading-none">
                        SPORT HUB <span class="text-[#ccff00]">MATCHUP</span>
                    </h1>
                    <p class="text-gray-400 text-xs sm:text-sm max-w-lg leading-relaxed font-medium">
                        Securely organize games, connect with elite local athletes, and elevate your competitive play style today.
                    </p>
                    <div class="flex flex-wrap items-center gap-4 pt-2">
                        <a href="{{ route('events.index') }}" class="bg-[#ccff00] text-black text-xs font-black uppercase tracking-wider px-6 py-3.5 rounded-xl hover:bg-[#b3e600] transition-colors shadow-lg shadow-[#ccff00]/10">
                            EXPLORE MATCHUP NOW
                        </a>
                        @auth
                            <a href="{{ route('events.create') }}" class="bg-gray-800 text-white text-xs font-bold uppercase tracking-wider px-6 py-3.5 rounded-xl border border-gray-700 hover:bg-gray-700 transition-colors">
                                BOOK MATCH
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="bg-gray-800 text-white text-xs font-bold uppercase tracking-wider px-6 py-3.5 rounded-xl border border-gray-700 hover:bg-gray-700 transition-colors">
                                GET STARTED
                            </a>
                        @endauth
                    </div>
                    <div class="flex items-center gap-3 pt-4 text-xs text-gray-400">
                        <div class="flex -space-x-2">
                            <img class="w-7 h-7 rounded-full border-2 border-gray-900 object-cover" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100" alt="User">
                            <img class="w-7 h-7 rounded-full border-2 border-gray-900 object-cover" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100" alt="User">
                            <img class="w-7 h-7 rounded-full border-2 border-gray-900 object-cover" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100" alt="User">
                        </div>
                        <span>Trusted by <strong class="text-white">10,000+</strong> active players worldwide</span>
                    </div>
                </div>
                <div class="relative h-72 sm:h-96 rounded-2xl overflow-hidden shadow-2xl border border-gray-800">
                    <img src="https://images.unsplash.com/photo-1546519638-68e109498ffc?q=80&w=1200&auto=format&fit=crop" alt="Basketball Action" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#111827] via-transparent opacity-60"></div>
                </div>
            </div>
        </section>

        <!-- Stats Bar -->
        <section class="bg-[#0f172a] border-b border-gray-800 py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-3xl sm:text-4xl font-black text-[#ccff00]">50K+</div>
                    <div class="text-[11px] font-bold text-gray-400 uppercase tracking-wider mt-1">ACTIVE PLAYERS</div>
                </div>
                <div>
                    <div class="text-3xl sm:text-4xl font-black text-[#ccff00]">120+</div>
                    <div class="text-[11px] font-bold text-gray-400 uppercase tracking-wider mt-1">CITIES MATCHED</div>
                </div>
                <div>
                    <div class="text-3xl sm:text-4xl font-black text-[#ccff00]">32</div>
                    <div class="text-[11px] font-bold text-gray-400 uppercase tracking-wider mt-1">PRO CATEGORIES</div>
                </div>
                <div>
                    <div class="text-3xl sm:text-4xl font-black text-[#ccff00]">180K+</div>
                    <div class="text-[11px] font-bold text-gray-400 uppercase tracking-wider mt-1">MATCHES PLAYED</div>
                </div>
            </div>
        </section>

        <!-- Matchup Mechanics Section -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-[11px] font-bold text-[#ccff00] uppercase tracking-widest block mb-2">MATCHUP MECHANICS</span>
                <h2 class="text-2xl sm:text-3xl font-black uppercase italic text-white">SIMPLE STEP-BY-STEP PLAYBOOK</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-[#111827] border border-gray-800 rounded-2xl p-6 relative">
                    <div class="text-[#ccff00] font-black text-xl mb-4">01</div>
                    <h3 class="font-extrabold text-base uppercase text-white mb-2">CREATE YOUR BATTLE</h3>
                    <p class="text-gray-400 text-xs leading-relaxed">Setup custom tournaments or casual matches with flexible capacity limits and location markers.</p>
                </div>
                <div class="bg-[#111827] border border-gray-800 rounded-2xl p-6 relative">
                    <div class="text-[#ccff00] font-black text-xl mb-4">02</div>
                    <h3 class="font-extrabold text-base uppercase text-white mb-2">MATCH & JOIN</h3>
                    <p class="text-gray-400 text-xs leading-relaxed">Find participants matching your skill tier and fill slots quickly through our notification system.</p>
                </div>
                <div class="bg-[#111827] border border-gray-800 rounded-2xl p-6 relative">
                    <div class="text-[#ccff00] font-black text-xl mb-4">03</div>
                    <h3 class="font-extrabold text-base uppercase text-white mb-2">OFFICIAL PLAY</h3>
                    <p class="text-gray-400 text-xs leading-relaxed">Track your win-loss ratios, climbing tiers as you complete scheduled league games and events.</p>
                </div>
            </div>
        </section>

        <!-- Popular Disciplines (Sport Categories Grid) -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <span class="text-[11px] font-bold text-[#ccff00] uppercase tracking-widest block">SPORT CATEGORIES</span>
                    <h2 class="text-2xl font-black uppercase italic text-white mt-1">DISCOVER YOUR PASSION</h2>
                </div>
                <a href="{{ route('events.index') }}" class="text-xs font-bold text-gray-400 hover:text-white uppercase tracking-wider">VIEW ALL SPORTS</a>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
                @foreach($categories ?? [] as $category)
                    @php
                        $catImage = $getSportImage($category->name);
                    @endphp
                    <a href="{{ route('events.index', ['category_id' => $category->id]) }}" class="group relative h-40 rounded-xl overflow-hidden border border-gray-800 block">
                        <img src="{{ $catImage }}" alt="{{ $category->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent flex items-end p-3">
                            <span class="font-extrabold text-xs uppercase text-white tracking-wider">{{ $category->name }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>

        <!-- Live Events Section -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
                <div>
                    <span class="text-[11px] font-bold text-[#ccff00] uppercase tracking-widest block">LIVE ACTION</span>
                    <h2 class="text-2xl font-black uppercase italic text-white mt-1">UPCOMING EVENTS IN BROOKLYN</h2>
                </div>
                <form method="GET" action="{{ route('events.index') }}" class="flex items-center gap-2 w-full md:w-auto">
                    <input type="text" name="search" placeholder="Search event or location..." value="{{ request('search') }}" class="bg-[#111827] border border-gray-700 text-xs rounded-xl px-3 py-2 text-white placeholder-gray-500 focus:outline-none focus:border-[#ccff00]">
                    <button type="submit" class="bg-[#ccff00] text-black text-xs font-bold uppercase px-4 py-2 rounded-xl hover:bg-[#b3e600] transition-colors">
                        Filter
                    </button>
                </form>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($events ?? [] as $event)
                    @php
                        $sportLabel = $event->category->name ?? 'SPORT';
                        $cardImg = $event->image_url ?? $getSportImage($sportLabel);
                        $percentage = $event->max_participants > 0 ? min(100, ($event->participants->count() / $event->max_participants) * 100) : 0;
                    @endphp
                    <div class="bg-[#111827] border border-gray-800 rounded-2xl overflow-hidden flex flex-col justify-between shadow-xl">
                        <div class="h-40 relative bg-gray-900">
                            <img src="{{ $cardImg }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
                        </div>
                        <div class="p-5 flex flex-col flex-1 justify-between space-y-4">
                            <div>
                                <span class="inline-block bg-[#ccff00]/10 text-[#ccff00] text-[10px] font-extrabold uppercase px-2.5 py-0.5 rounded mb-2 border border-[#ccff00]/20">
                                    {{ $sportLabel }}
                                </span>
                                <h3 class="font-black uppercase text-base text-white tracking-tight line-clamp-2">
                                    {{ $event->title }}
                                </h3>
                                <div class="text-xs text-gray-400 mt-2 flex items-center gap-2">
                                    <span>📅</span> {{ \Carbon\Carbon::parse($event->event_date)->format('M d, g:i A') }}
                                </div>
                                <div class="text-xs text-gray-400 mt-1 flex items-center gap-2">
                                    <span>📍</span> {{ $event->location }}
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between items-center text-[11px] font-bold text-gray-400 uppercase mb-1">
                                    <span>Spots Filled</span>
                                    <span>{{ $event->participants->count() }}/{{ $event->max_participants }}</span>
                                </div>
                                <div class="w-full bg-gray-800 h-1.5 rounded-full overflow-hidden mb-4">
                                    <div class="bg-[#ccff00] h-full" style="width: {{ $percentage }}%;"></div>
                                </div>
                                <a href="{{ route('events.show', $event) }}" class="block w-full text-center bg-white text-black font-black text-xs uppercase tracking-wider py-2.5 rounded-xl hover:bg-[#ccff00] transition-colors">
                                    Register Now
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16 text-center text-gray-500 bg-[#111827] border border-gray-800 rounded-2xl">
                        No active events found. Be the first to create one!
                    </div>
                @endforelse
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-[11px] font-bold text-[#ccff00] uppercase tracking-widest block mb-2">TESTIMONIALS</span>
                <h2 class="text-2xl sm:text-3xl font-black uppercase italic text-white">HEAR FROM ATHLETES</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-[#111827] border border-gray-800 rounded-2xl p-6 flex flex-col justify-between">
                    <p class="text-gray-300 text-xs leading-relaxed mb-6">"Finding local games has never been this seamless. The ability to coordinate matches with nearby players transformed our weekend schedule completely."</p>
                    <div class="flex items-center gap-3 border-t border-gray-800 pt-4">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100" alt="David Miller" class="w-9 h-9 rounded-full object-cover">
                        <div>
                            <div class="text-xs font-bold text-white uppercase">David Miller</div>
                            <div class="text-[10px] text-gray-500">Pro Athlete</div>
                        </div>
                    </div>
                </div>
                <div class="bg-[#111827] border border-gray-800 rounded-2xl p-6 flex flex-col justify-between">
                    <p class="text-gray-300 text-xs leading-relaxed mb-6">"Organizing community tournaments used to take hours of manual tracking. Now I publish an event and all slots fill up within a day."</p>
                    <div class="flex items-center gap-3 border-t border-gray-800 pt-4">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100" alt="Sarah Jenkins" class="w-9 h-9 rounded-full object-cover">
                        <div>
                            <div class="text-xs font-bold text-white uppercase">Sarah Jenkins</div>
                            <div class="text-[10px] text-gray-500">Organizer</div>
                        </div>
                    </div>
                </div>
                <div class="bg-[#111827] border border-gray-800 rounded-2xl p-6 flex flex-col justify-between">
                    <p class="text-gray-300 text-xs leading-relaxed mb-6">"This platform has given our local running group the structure it needed. Real-time participant counters make headcounts completely effortless."</p>
                    <div class="flex items-center gap-3 border-t border-gray-800 pt-4">
                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100" alt="Mark Davis" class="w-9 h-9 rounded-full object-cover">
                        <div>
                            <div class="text-xs font-bold text-white uppercase">Mark Davis</div>
                            <div class="text-[10px] text-gray-500">Club Lead</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call to Action Banner (Changed py-16 to pt-16 pb-0 to flush with footer) -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-0">
            <div class="bg-[#ccff00] rounded-3xl p-8 sm:p-12 text-black flex flex-col lg:flex-row justify-between items-center gap-8">
                <div class="space-y-3 max-w-xl">
                    <h2 class="text-3xl sm:text-4xl font-black uppercase italic tracking-tighter">
                        READY TO CRUSH YOUR ACTIVE GOALS? JOIN MATCHUP TODAY
                    </h2>
                    <p class="text-xs sm:text-sm font-medium text-gray-900">
                        Join thousands of local players. Sign up in seconds to manage games, join leagues, and track statistics.
                    </p>
                </div>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('register') }}" class="bg-black text-[#ccff00] text-xs font-black uppercase tracking-wider px-6 py-3.5 rounded-xl hover:bg-gray-900 transition-colors">
                        Get Started
                    </a>
                    <a href="{{ route('events.index') }}" class="bg-white/80 text-black text-xs font-black uppercase tracking-wider px-6 py-3.5 rounded-xl hover:bg-white transition-colors">
                        Browse Events
                    </a>
                </div>
            </div>
        </section>
    </div>
@endsection
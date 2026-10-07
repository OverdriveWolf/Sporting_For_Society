<nav class="container mx-auto px-4 py-3 flex justify-between items-center">
    <a href="{{ route('events.index') }}" class="text-xl font-bold text-blue-600">
        Sporting for Society
    </a>

    <!-- Navigation Links -->
    <div class="flex items-center space-x-4">
        <a href="{{ route('events.index') }}" class="text-gray-600 hover:text-blue-600">Events</a>

        @auth
            <!-- Link to Profile Edit View -->
            <a href="{{ route('profile.edit') }}" class="text-gray-600 hover:text-blue-600">My Profile</a>

            <!-- Show 'Create Event' link strictly for Organizers -->
            @if(auth()->user()->isOrganizer())
                <a href="{{ route('events.create') }}" class="text-green-600 hover:text-green-700 font-medium">+ Create
                    Event</a>
            @endif

            <!-- Logout Form submitting to POST /logout -->
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="text-red-600 hover:underline cursor-pointer">Logout</button>
            </form>
        @else
            <!-- Zichtbaar voor gasten/uitgelogde gebruikers -->
            <a href="{{ route('login') }}"
                style="color: #475569; text-decoration: none; font-weight: 500; padding: 0.5rem 0.75rem;">
                Login
            </a>
            <a href="{{ route('register') }}"
                style="background-color: #2563eb; color: #ffffff; text-decoration: none; font-weight: 500; padding: 0.5rem 1rem; border-radius: 6px; display: inline-block;">
                Register
            </a>
        @endauth
    </div>
</nav>
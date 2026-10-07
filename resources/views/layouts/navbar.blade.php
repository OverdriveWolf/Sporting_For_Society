<nav class="container mx-auto px-4 py-3 flex justify-between items-center">
    <a href="{{ url('/') }}" class="text-xl font-bold text-blue-600">
        Sporting for Society
    </a>

    <!-- Navigation Links -->
    <div class="flex items-center space-x-4">
        <a href="{{ url('/') }}" class="text-gray-600 hover:text-blue-600">Events</a>
        
        <!-- Placeholder checks for authentication (Day 8 focus) -->
        @auth
            <a href="#" class="text-gray-600 hover:text-blue-600">My Profile</a>
            <form method="POST" action="#" class="inline">
                @csrf
                <button type="submit" class="text-red-600 hover:underline">Logout</button>
            </form>
        @else
            <a href="#" class="text-gray-600 hover:text-blue-600">Login</a>
            <a href="#" class="bg-blue-600 text-white px-3 py-1.5 rounded hover:bg-blue-700">Register</a>
        @endauth
    </div>
</nav>
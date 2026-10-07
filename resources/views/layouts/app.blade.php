<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Sporting for Society')</title>

    <!-- Vite CSS & JS Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col justify-between">

    <!-- Navigation Header -->
    <header class="bg-white shadow-sm">
        @include('layouts.navbar')
    </header>

    <!-- Global Alert / Session Flash Messages (REQ-10) -->
    <main class="container mx-auto px-4 py-6 flex-grow">
        @if (session('success'))
            <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 p-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <!-- Dynamic Main Content Placeholder -->
        @yield('content')
    </main>

    <!-- Global Footer -->
    <footer class="bg-gray-800 text-white text-center py-4 mt-8">
        <p class="text-sm">&copy; {{ date('Y') }} Sporting for Society. All rights reserved.</p>
    </footer>

</body>
</html>
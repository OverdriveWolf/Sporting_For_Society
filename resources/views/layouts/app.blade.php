<!DOCTYPE html>
<html lang="en" 
      x-data="{ 
          darkMode: localStorage.getItem('darkMode') === 'true' || (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) 
      }" 
      x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" 
      :class="{ 'dark': darkMode }">

<head>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Sporting for Society')</title>

    <!-- Vite CSS & JS Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-100 min-h-screen flex flex-col justify-between transition-colors duration-200">

    <!-- Navigation Header (Hidden on login/register route) -->
    @unless(request()->routeIs('login') || request()->routeIs('register'))
        <header class="bg-white dark:bg-gray-800 shadow-sm transition-colors duration-200">
            @include('layouts.navbar')
        </header>
    @endunless

    <!-- Global Alert / Session Flash Messages (REQ-10) -->
    <main class="w-full flex-grow">
        @if (session('success'))
            <div class="mb-4 p-4 text-sm text-green-700 dark:text-green-300 bg-green-100 dark:bg-green-950 rounded-lg" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 p-4 text-sm text-red-700 dark:text-red-300 bg-red-100 dark:bg-red-950 rounded-lg" role="alert">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Global Footer -->
    @unless(request()->routeIs('login') || request()->routeIs('register'))
    <footer class="bg-gray-800 dark:bg-gray-950 text-white text-center py-4 mt-0 transition-colors duration-200">
        <p class="text-sm">&copy; {{ date('Y') }} Sporting for Society. All rights reserved.</p>
    </footer>
    @endunless

</body>

</html>
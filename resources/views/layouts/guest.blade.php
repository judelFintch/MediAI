<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('assets/app.css') }}
    

</head>

<body class="font-sans text-gray-900 antialiased">
    <header class="bg-white shadow">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ url('/') }}" class="text-2xl font-semibold text-blue-600">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <!-- Navigation Links -->
                <nav class="hidden md:flex space-x-8">
                    <a href="{{ url('/') }}" class="text-gray-700 hover:text-blue-600">Accueil</a>
                    <a href="{{ route('chat.assistant') }}" class="text-gray-700 hover:text-blue-600">Assistant</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600">Services</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600">Contact</a>
                </nav>

                <!-- Call to Action -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600">Connexion</a>
                    <a href="{{ route('register') }}"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-500 transition">
                        Inscription
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="md:hidden text-gray-700 hover:text-blue-600 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-gray-100">
            <a href="{{ url('/') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-100">Accueil</a>
            <a href="{{ route('chat.assistant') }}"
                class="block px-4 py-2 text-gray-700 hover:bg-blue-100">Assistant</a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-100">Services</a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-100">Contact</a>
            <a href="{{ route('login') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-100">Connexion</a>
            <a href="{{ route('register') }}"
                class="block px-4 py-2 bg-blue-600 text-white hover:bg-blue-500 text-center rounded">
                Inscription
            </a>
        </div>
    </header>

    <main class="mt-6">
        {{ $slot }}
    </main>

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
    </body>

    <script type="text/javascript" src="{{ asset('assets/app.js') }}"></script>

</html>

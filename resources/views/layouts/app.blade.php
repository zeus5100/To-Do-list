<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-gray-800">
    <div id="app" class="min-h-screen flex flex-col">
        <nav class="bg-white shadow-sm">
            <div class="container mx-auto px-4 py-3 flex items-center justify-between">
                <a href="{{ url('/') }}" class="text-xl font-semibold text-gray-900">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <button id="nav-toggle" class="md:hidden focus:outline-none">
                    <!-- Hamburger icon -->
                    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <div id="nav-menu" class="hidden md:flex space-x-4 items-center">
                    <ul class="flex space-x-4">
                        <!-- Left Side Of Navbar (empty) -->
                    </ul>

                    <ul class="flex space-x-4">
                        @guest
                        @if (Route::has('login'))
                        <li>
                            <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900">
                                {{ __('Login') }}
                            </a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}" class="text-gray-700 hover:text-gray-900">
                                {{ __('Register') }}
                            </a>
                        </li>
                        @endif
                        @else
                        <li>
                            <a href="{{ route('tasks.index') }}" class="text-gray-700 hover:text-gray-900">
                                {{ __('Tasks') }}
                            </a>
                        </li>
                        <li>

                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-gray-700 hover:text-gray-900">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="flex-grow container mx-auto px-4 py-6">
            @yield('content')
        </main>
    </div>

    <script>
        const toggleBtn = document.getElementById('nav-toggle');
        const menu = document.getElementById('nav-menu');
        toggleBtn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });

    </script>
</body>
</html>

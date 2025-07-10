<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Strona główna</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <main class="flex flex-col items-center text-center space-y-6 px-4">
                <h1 class="text-4xl lg:text-5xl font-bold text-black dark:text-white">To-Do List App</h1>
                <p class="text-lg text-gray-700 dark:text-gray-300 max-w-xl">
                    Prosta aplikacja do zarządzania zadaniami — z synchronizacją z Google Calendar, historią edycji i możliwością udostępniania.
                </p>

                @auth
                <a href="{{ url('/home') }}" class="inline-block px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-600/90 transition">
                    Przejdź do aplikacji
                </a>
                @else
                <div class="flex space-x-4">
                    <a href="{{ route('login') }}" class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-600/90 transition">
                        Zaloguj się
                    </a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="px-6 py-3 bg-white text-black border border-gray-300 rounded-lg hover:bg-gray-100 transition dark:bg-gray-800 dark:text-white dark:border-gray-600">
                        Zarejestruj się
                    </a>
                    @endif
                </div>
                @endauth
            </main>

            <footer class="py-10 text-center text-sm text-black dark:text-white/70">
                © 2025 To-Do App
            </footer>
        </div>
    </div>
</body>

</html>

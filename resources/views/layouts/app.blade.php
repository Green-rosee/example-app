

<!DOCTYPE html>
<html lang="ru" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Моё приложение')</title>

    <!-- Подключение Tailwind и ваших скриптов через Vite npm run dev -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex flex-col bg-gray-50 dark:bg-gray-500 text-gray-900 dark:text-gray-100 antialiased">

<!-- Header -->
<header class="bg-gray-900 border-b border-gray-800 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Логотип / название проекта -->
            <a href="{{ route('home') }}" class="text-2xl font-bold text-white tracking-tight">
                <li> My Home Application</li>
            </a>

            <!-- Навигация (можно расширить) -->
            <nav class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}"
                   class="text-gray-300 hover:text-white transition font-medium">
                    Главная
                </a>
                <a href="{{route('users.index')}}"
                   class="text-gray-300 hover:text-white transition font-medium">
                    Пользователи
                </a>
                <a href="#"
                   class="text-gray-300 hover:text-white transition font-medium">
                    О проекте
                </a>
            </nav>

            <!-- Правая часть (авторизация / профиль) -->
            <div class="flex items-center space-x-4">
                @guest
                    <!-- {{--                    <a href="{{ route('login') }}" --}} -->
                    <a href="#"
                       class="text-gray-300 hover:text-white transition">
                        <li>Войти</li>
                    </a>
                    <!-- {{--                    <a href="{{ route('register') }}"--}} -->
                    <a href="#"
                       class="px-4 py-2 bg-indigo-700 hover:bg-indigo-700 text-white rounded-xl transition">
                        <li>Регистрация</li>
                    </a>
                @else
                    <span class="text-gray-300">
                            {{ auth()->user()->name }}
                        </span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit"
                                class="text-gray-300 hover:text-white transition">
                            Выйти
                        </button>
                    </form>
                @endguest
            </div>
        </div>
    </div>
</header>

<!-- Основной контент -->
<main class="flex-grow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @yield('content')
    </div>
</main>

<!-- Footer -->
<footer class="bg-gray-900 border-t border-gray-800 mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-center text-sm text-gray-400">
        <p>© {{ date('Y') }} My Application Home Works  — все права защищены</p>
        <p class="mt-1">
            Create Home Works с ❤️ на Php + Laravel + Tailwind CSS
        </p>
    </div>
</footer>

</body>
</html>


{{--
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
--}}

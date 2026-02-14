<!--
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title','My Application')</title> -->
    <!-- Подключение Tailwind и ваших скриптов через Vite -->
<!--
    @vite(['resources/css/app.css', 'resources/js/app.js']) -->
<!--
</head>
<body class="min-h-screen flex flex-col bg-gray-50 dark:bg-gray-950 text-gray-900 dark:text-gray-100 antialiased">
{{--HEDER--}}
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}">Top navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
@yield('content')
{{--FOOTER--}}
<footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
        <div class="col-12 col-md">
            <img class="mb-2" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="24" height="19">
            <small class="d-block mb-3 text-body-secondary">© 2017–2023</small>
        </div>
        <div class="col-6 col-md">
            <h5>Features</h5>
            <ul class="list-unstyled text-small">
                <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Cool stuff</a></li>
                <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Random feature</a></li>
                <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Team feature</a></li>
                <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Stuff for developers</a></li>
                <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Another one</a></li>
                <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Last time</a></li>
            </ul>
        </div>
        <div class="col-6 col-md">
            <h5>Resources</h5>
            <ul class="list-unstyled text-small">
                <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Resource</a></li>
                <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Resource name</a></li>
                <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Another resource</a></li>
                <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Final resource</a></li>
            </ul>
        </div>
        <div class="col-6 col-md">
            <h5>About</h5>
            <ul class="list-unstyled text-small">
                <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Team</a></li>
                <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Locations</a></li>
                <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Privacy</a></li>
                <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Terms</a></li>
            </ul>
        </div>
    </div>
</footer>
</body>
</html>
-->

<!DOCTYPE html>
<html lang="ru" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Моё приложение')</title>

    <!-- Подключение Tailwind и ваших скриптов через Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex flex-col bg-gray-50 dark:bg-gray-950 text-gray-900 dark:text-gray-100 antialiased">

<!-- Header -->
<header class="bg-gray-900 border-b border-gray-800 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Логотип / название проекта -->
            <a href="{{ route('home') }}" class="text-2xl font-bold text-white tracking-tight">
                My App
            </a>

            <!-- Навигация (можно расширить) -->
            <nav class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}"
                   class="text-gray-300 hover:text-white transition font-medium">
                    Главная
                </a>
                <a href="#"
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
                        Войти
                    </a>
                    <!-- {{--                    <a href="{{ route('register') }}"--}} -->
                    <a href="#"
                       class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md transition">
                        Регистрация
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
        <p>© {{ date('Y') }} My App — все права защищены</p>
        <p class="mt-1">
            Сделано с ❤️ на Laravel + Tailwind CSS
        </p>
    </div>
</footer>

</body>
</html>

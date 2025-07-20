<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'JobFair') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite('resources/css/app.css')

    <!-- Vue + Alpine Scripts (compiled via Vite) -->
    @vite('resources/js/app.js')
</head>
<body class="h-full font-sans antialiased text-gray-800 bg-gray-100">
    <div class="min-h-screen">
        @include('layouts.navigation')

        <!-- Optional Page Header -->
        @hasSection('header')
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    @yield('header')
                </div>
            </header>
        @endif

        <!-- Main Page Content -->
        <main>
            @yield('content')
        </main>
    </div>

    <!-- Floating Chat Component -->
    @include('components.floating-chat')
</body>
</html>

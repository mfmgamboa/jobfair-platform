<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- ✅ CSRF Token (for Axios) -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- ✅ Page Title -->
    <title>JobFair</title>

    <!-- ✅ Vite Scripts -->
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- ✅ Optional: Add this for better password manager support -->
    <meta name="description" content="JobFair Platform - Private Messaging Chat">
</head>
<body class="font-sans antialiased bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-100">

    <div class="min-h-screen">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @hasSection('header')
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    @yield('header')
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="py-6 px-4 sm:px-6 lg:px-8">
            @yield('content')
        </main>
    </div>

    <!-- ✅ Vue Chat Mount Point (Moved to bottom for faster rendering) -->
    <div id="chat-app" data-username="{{ Auth::user() ? Auth::user()->email : '' }}"></div>

</body>
</html>
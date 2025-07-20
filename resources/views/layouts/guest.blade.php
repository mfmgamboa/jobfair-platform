@props(['title' => config('app.name', 'JobQuest')])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f4f6fa] font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col items-center justify-center px-4 py-8">
        
        <!-- ✅ Logo -->
        <div class="mb-4">
            <img src="{{ asset('images/jobquest-logo.png') }}"
                 alt="JobQuest Logo"
                 class="h-16 w-auto object-contain" />
        </div>

        <!-- ✅ Welcome Message -->
        <div class="text-center mb-6">
            <h1 class="text-2xl font-semibold text-[#004080]">
                Welcome back to <span class="font-bold text-[#0074cc]">JobQuest.ph</span>
            </h1>
            <p class="text-gray-600 text-sm mt-1">Please log in to continue</p>
        </div>

        <!-- ✅ Login Card -->
        <div class="w-full max-w-md p-8 bg-white rounded-2xl shadow-md border border-gray-200">
            {{ $slot }}
        </div>
    </div>
</body>
</html>

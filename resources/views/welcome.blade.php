<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>JobQuest - Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .bg-gradient {
            background: linear-gradient(to bottom right, #3B82F6, #9333EA);
        }
    </style>
</head>
<body class="bg-gradient text-white min-h-screen flex flex-col">

    <header class="bg-white shadow-md text-gray-800 px-4 py-3 flex items-center justify-between">
        <div class="flex items-center space-x-2">
            <img src="/images/jobquest-logo.png" alt="JobQuest Logo" class="h-10">
            <h1 class="text-lg font-bold">JobQuest</h1>
        </div>

        @auth
            <div class="flex items-center space-x-4 text-sm">
                <span>👤 {{ Auth::user()->name }}</span>
                <span class="bg-purple-100 text-purple-700 px-2 py-1 rounded">{{ Auth::user()->role ?? 'User' }}</span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded transition">
                        Logout
                    </button>
                </form>
            </div>
        @endauth

        @guest
            <div class="text-sm">
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a>
            </div>
        @endguest
    </header>

    <main class="flex-1 flex flex-col items-center justify-center text-center px-4">
        <h2 class="text-4xl font-bold mb-4">Welcome to JobQuest</h2>
        <p class="text-lg max-w-xl">Your gateway to virtual job fairs. Explore, apply, and connect with employers.</p>
    </main>

    <footer class="text-center py-4 text-sm bg-white text-gray-500">
        &copy; {{ date('Y') }} JobQuest. All rights reserved.
    </footer>

</body>
</html>

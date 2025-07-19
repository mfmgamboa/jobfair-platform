<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jobseeker Dashboard - JobQuest</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background: linear-gradient(to bottom right, #3B82F6, #9333EA);
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-6">
    <div class="bg-white w-full max-w-4xl rounded-2xl shadow-lg p-8">
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center space-x-4">
                <img src="/images/jobquest-logo.png" alt="JobQuest Logo" class="h-12 w-auto">
                <h1 class="text-2xl font-bold text-gray-700">Jobseeker Dashboard</h1>
            </div>
            <div class="text-right">
                <p class="text-sm text-gray-600">Welcome, {{ Auth::user()->name }}</p>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm text-blue-500 hover:underline">Logout</button>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-gray-100 rounded-xl p-6 shadow-sm">
                <h2 class="text-lg font-semibold text-gray-700 mb-2">My Profile</h2>
                <p class="text-sm text-gray-600">Update your personal information, education, and experience.</p>
                <a href="/profile" class="inline-block mt-4 text-blue-600 font-medium hover:underline">Go to Profile</a>
            </div>

            <div class="bg-gray-100 rounded-xl p-6 shadow-sm">
                <h2 class="text-lg font-semibold text-gray-700 mb-2">Upload Resume</h2>
                <p class="text-sm text-gray-600">Upload your resume and let employers find you faster.</p>
                <a href="/resume/upload" class="inline-block mt-4 text-blue-600 font-medium hover:underline">Upload Now</a>
            </div>

            <div class="bg-gray-100 rounded-xl p-6 shadow-sm">
                <h2 class="text-lg font-semibold text-gray-700 mb-2">My Applications</h2>
                <p class="text-sm text-gray-600">Track the jobs you have applied to and their status.</p>
                <a href="#" class="inline-block mt-4 text-blue-600 font-medium hover:underline">View Applications</a>
            </div>

            <div class="bg-gray-100 rounded-xl p-6 shadow-sm">
                <h2 class="text-lg font-semibold text-gray-700 mb-2">Messages</h2>
                <p class="text-sm text-gray-600">Chat with employers you’ve applied to.</p>
                <a href="/chat-ui" class="inline-block mt-4 text-blue-600 font-medium hover:underline">Go to Chat</a>
            </div>
        </div>
    </div>
</body>
</html>

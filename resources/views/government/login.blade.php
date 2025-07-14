@extends('layouts.guest')

@section('content')
<div class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-br from-blue-50 to-blue-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md space-y-8">
        <div class="text-center">
            <img src="{{ asset('images/jobquest-logo.png') }}" alt="JobQuest Logo" class="mx-auto h-20 w-auto mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Government Portal Login</h2>
            <p class="mt-2 text-sm text-gray-600">Access your government dashboard</p>
        </div>

        @if(session('error'))
            <div class="bg-red-100 text-red-700 border border-red-400 px-4 py-3 rounded mb-4 text-sm">
                {{ session('error') }}
            </div>
        @endif

        <form class="mt-8 space-y-6 bg-white p-6 rounded-lg shadow-md" method="POST" action="{{ route('government.login.submit') }}">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input id="email" name="email" type="email" autocomplete="email" required autofocus
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                       value="{{ old('email') }}">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" autocomplete="current-password" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 transition">
                    Log In
                </button>
            </div>
        </form>

        <div class="text-center text-sm text-gray-500">
            <a href="{{ url('/') }}" class="hover:underline text-blue-600">Back to Home</a>
        </div>
    </div>
</div>
@endsection

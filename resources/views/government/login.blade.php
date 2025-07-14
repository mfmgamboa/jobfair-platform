@extends('layouts.guest')

@section('content')
    <h1 class="text-2xl font-bold text-center mb-4">Government Login</h1>

    @if (session('error'))
        <div class="mb-4 text-sm text-red-600">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('government.login.submit') }}">
        @csrf

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
            <input id="email" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:text-white" type="email" name="email" value="{{ old('email') }}" required autofocus />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
            <input id="password" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:text-white" type="password" name="password" required />
        </div>

        <!-- Submit -->
        <div class="flex items-center justify-end mt-4">
            <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Login
            </button>
        </div>
    </form>
@endsection

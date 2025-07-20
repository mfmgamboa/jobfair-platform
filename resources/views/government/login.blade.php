@extends('layouts.guest')

@section('content')
    <div class="min-h-screen flex items-center justify-center px-4 bg-gradient-to-br from-blue-500 to-purple-600">
        <div class="bg-white rounded-2xl shadow-lg w-full max-w-md p-8">
            <div class="text-center mb-6">
                <img src="/images/jobquest-logo.png" alt="JobQuest Logo" class="mx-auto w-24 mb-4">
                <h1 class="text-2xl font-bold text-gray-700">Government Login</h1>
                <p class="text-sm text-gray-500">Sign in with your government credentials</p>
            </div>

            @if (session('error'))
                <div class="mb-4 text-sm text-red-600">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 text-sm text-red-600">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('government.login.submit') }}" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" type="password" name="password" required
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <!-- Submit -->
                <div class="flex items-center justify-end mt-4">
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

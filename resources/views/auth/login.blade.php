<x-guest-layout>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Email -->
        <div>
            <x-input id="email"
                     class="block mt-1 w-full"
                     type="email"
                     name="email"
                     :value="old('email')"
                     required
                     autofocus
                     autocomplete="username"
                     placeholder="Email Address" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input id="password"
                     class="block mt-1 w-full"
                     type="password"
                     name="password"
                     required
                     autocomplete="current-password"
                     placeholder="Password" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me"
                       type="checkbox"
                       class="rounded border-gray-300 text-[#0074cc] shadow-sm focus:ring-[#0074cc]"
                       name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Remember me') }}
                </span>
            </label>
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-[#0074cc] hover:text-[#004080]"
                   href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-button class="ml-3 bg-[#0074cc] hover:bg-[#005fa3]">
                {{ __('Log in') }}
            </x-button>
        </div>
    </form>
</x-guest-layout>

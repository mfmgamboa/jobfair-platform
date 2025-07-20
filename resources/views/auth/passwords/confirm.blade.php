<x-auth-card>
    <x-slot name="title">
        {{ __('Confirm Password') }}
    </x-slot>

    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf
        @method('post')

        <!-- Hidden username field -->
        <input type="hidden" name="username" value="{{ Auth::user()->email }}" autocomplete="username">

        <!-- Password -->
        <div class="mt-4">
            <x-label for="password" value="Password" />
            <x-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password" />
        </div>

        <div class="flex justify-end mt-4">
            <x-button>
                {{ __('Confirm') }}
            </x-button>
        </div>
    </form>
</x-auth-card>
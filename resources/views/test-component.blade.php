@php
    $errors = \Illuminate\Support\Facades\Validator::make([], [])->errors();
    $errors->add('test', 'This is a test error')
@endphp

<x-guest-layout>
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
</x-guest-layout>
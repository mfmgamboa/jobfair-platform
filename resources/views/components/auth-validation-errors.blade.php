@props(['errors'])

@if ($errors->any())
    <div {{ $attributes->merge(['class' => 'font-medium text-red-600 dark:text-red-400 text-sm']) }}>
        {{ __('Whoops! Something went wrong.') }}
    </div>

    <ul class="mt-3 list-disc list-inside text-sm text-red-600 dark:text-red-400">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
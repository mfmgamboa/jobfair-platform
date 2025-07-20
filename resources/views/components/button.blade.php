@props(['type' => 'submit'])

<button type="{{ $type }}"
    {{ $attributes->merge(['class' =>
        'inline-flex items-center px-4 py-2 bg-[#0074cc] border border-transparent rounded-md 
        font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#005fa3] 
        focus:outline-none focus:ring-2 focus:ring-[#0074cc] focus:ring-offset-2 
        transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

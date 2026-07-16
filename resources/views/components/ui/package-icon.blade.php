@props([
    'icon' => 'bolt',
])

@php
    $paths = [
        'bolt' => '<path stroke-linecap="round" stroke-linejoin="round" d="M13 2 4.5 13.5H11l-1 8.5 8.5-11.5H12l1-8.5Z" />',
        'rocket' => '<path stroke-linecap="round" stroke-linejoin="round" d="M5 15c-1.5 1.5-2 5-2 5s3.5-.5 5-2m2.5-2.5 6-6a6 6 0 0 0 2-4.5V3h-2a6 6 0 0 0-4.5 2l-6 6m4.5 2.5-4.5-2.5m4.5 2.5V19m-4.5-6.5H5" /><circle cx="15" cy="9" r="1.25" />',
        'flame' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 3s5 4 5 9a5 5 0 0 1-10 0c0-1.8 1-3.3 1.8-4.2C9 9.8 9.5 11 11 11c0-2 1-4-.5-6.5C11 4 12 3 12 3Z" />',
        'diamond' => '<path stroke-linecap="round" stroke-linejoin="round" d="m6 3h12l3 6-9 12L3 9l3-6Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M3 9h18M9 3 6 9l6 12 6-12-3-6" />',
    ];

    $svg = $paths[$icon] ?? $paths['bolt'];
@endphp

<svg {{ $attributes->merge(['class' => 'h-6 w-6']) }} viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
    {!! $svg !!}
</svg>

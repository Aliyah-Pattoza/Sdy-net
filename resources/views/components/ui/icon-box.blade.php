@props([
    'size' => 'md',
])

@php
    $sizes = [
        'sm' => 'h-10 w-10',
        'md' => 'h-12 w-12',
        'lg' => 'h-14 w-14',
    ];
@endphp

<div {{ $attributes->merge([
    'class' => 'flex items-center justify-center border border-brand text-brand transition-all duration-200 hover:bg-brand hover:text-white '.($sizes[$size] ?? $sizes['md']),
]) }}>
    {{ $slot }}
</div>

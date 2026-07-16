@props([
    'variant' => 'full', // full | mark
    'alt' => 'SDY NET — High Speed Internet Provider',
])

@php
    $src = $variant === 'mark'
        ? asset('images/sdy-net-logo-mark.png')
        : asset('images/sdy-net-logo.png');
@endphp

<img
    src="{{ $src }}"
    alt="{{ $alt }}"
    {{ $attributes->merge([
        'class' => 'block max-w-full select-none',
        'decoding' => 'async',
    ]) }}
>

@props([
    'interactive' => false,
    'hardShadow' => false,
    'padding' => 'md',
])

@php
    $paddings = [
        'sm' => 'p-4',
        'md' => 'p-6',
        'lg' => 'p-8',
        'none' => 'p-0',
    ];

    $classes = 'border border-foreground bg-background '.($paddings[$padding] ?? $paddings['md']);

    if ($interactive) {
        $classes .= ' hover:bg-neutral-100 transition-colors duration-200 cursor-pointer';
    }

    if ($hardShadow) {
        $classes .= ' hard-shadow-hover';
    }
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>

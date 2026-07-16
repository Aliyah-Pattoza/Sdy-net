@props([
    'variant' => 'default',
])

@php
    $variants = [
        'default' => 'border border-foreground bg-background text-foreground',
        'accent' => 'bg-accent text-background border border-accent',
        'inverted' => 'bg-foreground text-background border border-foreground',
        'muted' => 'border border-muted bg-muted text-neutral-700',
    ];
@endphp

<span {{ $attributes->merge([
    'class' => 'inline-flex items-center px-2 py-1 font-mono text-xs uppercase tracking-widest '.($variants[$variant] ?? $variants['default']),
]) }}>
    {{ $slot }}
</span>

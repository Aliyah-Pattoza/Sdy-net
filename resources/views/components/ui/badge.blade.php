@props([
    'variant' => 'default',
])

@php
    $variants = [
        'default' => 'border border-brand bg-background text-brand',
        'accent' => 'bg-accent text-foreground border border-accent',
        'inverted' => 'bg-brand-gradient text-white border border-transparent',
        'muted' => 'border border-muted bg-muted text-neutral-700',
    ];
@endphp

<span {{ $attributes->merge([
    'class' => 'inline-flex items-center px-2 py-1 font-mono text-xs uppercase tracking-widest '.($variants[$variant] ?? $variants['default']),
]) }}>
    {{ $slot }}
</span>

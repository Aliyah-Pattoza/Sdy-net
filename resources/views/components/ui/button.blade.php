@props([
    'variant' => 'primary',
    'type' => 'button',
    'href' => null,
    'size' => 'md',
])

@php
    $base = 'inline-flex items-center justify-center gap-2 font-sans uppercase tracking-widest text-xs font-semibold transition-all duration-200 ease-out min-h-[44px] min-w-[44px] sharp-corners focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand focus-visible:ring-offset-2 focus-visible:ring-offset-background disabled:opacity-50 disabled:pointer-events-none';

    $sizes = [
        'sm' => 'px-4 py-2',
        'md' => 'px-6 py-3',
        'lg' => 'px-8 py-4 text-sm',
    ];

    $variants = [
        'primary' => 'bg-brand-gradient text-white border border-transparent hover:brightness-110 hover:shadow-[4px_4px_0_0_#0B1F3A]',
        'secondary' => 'border border-brand bg-transparent text-brand hover:bg-brand hover:text-white',
        'ghost' => 'bg-transparent text-foreground hover:bg-muted hover:text-brand',
        'link' => 'bg-transparent text-foreground underline-offset-4 decoration-2 decoration-accent hover:underline hover:text-brand px-0 min-w-0',
        'accent' => 'bg-accent text-foreground border border-transparent hover:bg-brand hover:text-white',
    ];

    $classes = $base.' '.($sizes[$size] ?? $sizes['md']).' '.($variants[$variant] ?? $variants['primary']);
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif

@props([
    'as' => 'p',
])

<{{ $as }} {{ $attributes->merge([
    'class' => 'font-mono text-xs uppercase tracking-widest text-neutral-500',
]) }}>
    {{ $slot }}
</{{ $as }}>

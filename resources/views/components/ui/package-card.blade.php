@props([
    'package' => [],
])

@php
    $accent = $package['accent'] ?? '#0056D6';
    $accentSoft = $package['accent_soft'] ?? '#E6EEFB';
    $price = number_format($package['price'] ?? 0, 0, ',', '.');
    $popular = $package['popular'] ?? false;

    $registerLink = route('register', ['paket' => $package['slug'] ?? null]);
@endphp

<a
    href="{{ $registerLink }}"
    style="--accent: {{ $accent }}; --accent-soft: {{ $accentSoft }};"
    @class([
        'package-card group relative flex h-full flex-col border border-foreground bg-background p-6 transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2',
        'is-popular' => $popular,
    ])
    aria-label="Pilih {{ $package['name'] }} dan lanjut ke pendaftaran"
>
    {{-- Top accent bar --}}
    <span class="absolute inset-x-0 top-0 h-1 origin-left transition-transform duration-200 group-hover:h-1.5" style="background-color: var(--accent);" aria-hidden="true"></span>

    @if ($popular)
        <span class="absolute right-4 top-5 inline-flex items-center gap-1 px-2 py-1 font-mono text-[10px] font-bold uppercase tracking-widest text-white" style="background-color: var(--accent);">
            ★ Populer
        </span>
    @endif

    {{-- Icon --}}
    <span
        class="flex h-14 w-14 items-center justify-center border transition-all duration-200 group-hover:scale-110 group-hover:rotate-3"
        style="border-color: var(--accent); color: var(--accent); background-color: var(--accent-soft);"
    >
        <x-ui.package-icon :icon="$package['icon'] ?? 'bolt'" class="h-7 w-7" />
    </span>

    {{-- Name --}}
    <h3 class="mt-5 font-serif text-2xl font-black italic leading-tight text-foreground">
        {{ $package['name'] }}
    </h3>

    {{-- Price --}}
    <p class="mt-3 flex items-baseline gap-1">
        <span class="font-mono text-sm text-neutral-500">Rp</span>
        <span class="font-mono text-4xl font-medium tabular-nums tracking-tighter transition-colors duration-200" style="color: var(--accent);">{{ $price }}</span>
        <span class="font-mono text-xs uppercase tracking-widest text-neutral-500">/bln</span>
    </p>

    {{-- Tagline (grows to align buttons) --}}
    <p class="mt-3 flex-1 font-body text-sm leading-relaxed text-neutral-600">
        {{ $package['tagline'] }}
    </p>

    {{-- CTA --}}
    <span
        class="mt-6 inline-flex min-h-[46px] items-center justify-center gap-2 px-4 py-2 font-sans text-xs font-bold uppercase tracking-widest text-white transition-all duration-200"
        style="background-color: var(--accent);"
    >
        <span>Pilih paket</span>
        <svg class="h-4 w-4 -translate-x-1 opacity-0 transition-all duration-200 group-hover:translate-x-0 group-hover:opacity-100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6 6 6-6 6"/></svg>
    </span>
</a>

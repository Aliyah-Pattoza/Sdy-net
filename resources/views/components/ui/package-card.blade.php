@props([
    'package' => [],
])

@php
    $accent = $package['accent'] ?? '#0056D6';
    $accentSoft = $package['accent_soft'] ?? '#E6EEFB';
    $price = number_format($package['price'] ?? 0, 0, ',', '.');
    $popular = $package['popular'] ?? false;

    $wa = config('sdynet.whatsapp');
    $message = "Halo SDY NET, saya mau daftar *{$package['name']}* (Rp {$price}/bulan). Mohon info ketersediaan di lokasi saya.";
    $waLink = 'https://wa.me/'.$wa.'?text='.rawurlencode($message);
@endphp

<a
    href="{{ $waLink }}"
    target="_blank"
    rel="noopener"
    class="group relative flex flex-col border border-foreground bg-background p-6 transition-all duration-200 hard-shadow-hover focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand focus-visible:ring-offset-2"
    style="border-top: 4px solid {{ $accent }};"
    aria-label="Daftar {{ $package['name'] }} via WhatsApp"
>
    @if ($popular)
        <span
            class="absolute -top-px right-4 -translate-y-full px-2 py-1 font-mono text-[10px] font-semibold uppercase tracking-widest text-white"
            style="background-color: {{ $accent }};"
        >
            Populer
        </span>
    @endif

    <span
        class="flex h-12 w-12 items-center justify-center border transition-colors duration-200"
        style="border-color: {{ $accent }}; color: {{ $accent }}; background-color: {{ $accentSoft }};"
    >
        <x-ui.package-icon :icon="$package['icon'] ?? 'bolt'" />
    </span>

    <h3 class="mt-5 font-serif text-2xl font-black italic leading-tight text-foreground">
        {{ $package['name'] }}
    </h3>

    <p class="mt-2 flex items-baseline gap-1">
        <span class="font-mono text-sm text-neutral-500">Rp</span>
        <span class="font-mono text-4xl font-medium tracking-tighter" style="color: {{ $accent }};">{{ $price }}</span>
        <span class="font-mono text-xs uppercase tracking-widest text-neutral-500">/bln</span>
    </p>

    <p class="mt-3 font-body text-sm leading-relaxed text-neutral-600">
        {{ $package['tagline'] }}
    </p>

    <span
        class="mt-6 inline-flex min-h-[44px] items-center justify-center gap-2 border px-4 py-2 font-sans text-xs font-semibold uppercase tracking-widest text-white transition-transform duration-200 group-hover:-translate-y-0.5"
        style="background-color: {{ $accent }}; border-color: {{ $accent }};"
    >
        <x-ui.wa-icon class="h-4 w-4" />
        Daftar sekarang
    </span>
</a>

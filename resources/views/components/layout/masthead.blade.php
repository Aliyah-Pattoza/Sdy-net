@php
    $navLinks = [
        ['label' => 'Beranda', 'href' => '#front'],
        ['label' => 'Paket', 'href' => '#paket'],
        ['label' => 'Keunggulan', 'href' => '#keunggulan'],
        ['label' => 'Cara Daftar', 'href' => '#cara-daftar'],
        ['label' => 'FAQ', 'href' => '#faq'],
        ['label' => 'Kontak', 'href' => '#kontak'],
    ];

    $waDisplay = config('sdynet.whatsapp_display');
    $waLink = 'https://wa.me/'.config('sdynet.whatsapp').'?text='.rawurlencode('Halo SDY NET, saya ingin daftar internet.');
@endphp

<header class="sticky top-0 z-40 border-b-4 border-brand bg-background/90 backdrop-blur-sm">
    <div class="border-b border-muted bg-brand-gradient text-white">
        <div class="mx-auto flex max-w-screen-xl items-center justify-between gap-4 px-4 py-2 font-mono text-xs uppercase tracking-widest">
            <span class="inline-flex items-center gap-2">
                <span class="inline-block h-2 w-2 animate-pulse bg-accent" aria-hidden="true"></span>
                Fiber Online
            </span>
            <span class="hidden sm:inline">Internet Cepat &amp; Handal</span>
            <a href="{{ $waLink }}" target="_blank" rel="noopener" class="hover:text-accent transition-colors">WA {{ $waDisplay }}</a>
        </div>
    </div>

    <div class="mx-auto max-w-screen-xl px-4">
        <div class="flex items-center justify-between gap-4 py-3 lg:py-4">
            <a
                href="/"
                class="group block shrink-0 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand focus-visible:ring-offset-2"
                aria-label="SDY NET beranda"
            >
                <x-ui.logo variant="mark" class="h-12 w-auto sm:h-14 lg:h-16 transition-transform duration-200 group-hover:-translate-x-0.5" />
            </a>

            <nav class="hidden items-center gap-1 lg:flex" aria-label="Primary">
                @foreach ($navLinks as $link)
                    <a
                        href="{{ $link['href'] }}"
                        class="inline-flex min-h-[44px] items-center px-3 font-sans text-xs font-semibold uppercase tracking-widest text-foreground transition-colors duration-200 hover:text-brand"
                    >
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </nav>

            <div class="hidden lg:block">
                <x-ui.button href="{{ $waLink }}" target="_blank" rel="noopener" size="sm">
                    <x-ui.wa-icon class="h-4 w-4" />
                    Pasang Sekarang
                </x-ui.button>
            </div>

            <button
                type="button"
                id="mobile-nav-toggle"
                class="inline-flex h-11 w-11 items-center justify-center border border-brand text-brand transition-all duration-200 hover:bg-brand hover:text-white lg:hidden"
                aria-expanded="false"
                aria-controls="mobile-nav"
                aria-label="Open menu"
            >
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                    <path stroke-linecap="square" d="M4 7h16M4 12h16M4 17h16" />
                </svg>
            </button>
        </div>
    </div>

    <div id="mobile-nav" class="hidden border-t border-muted lg:hidden" hidden>
        <nav class="mx-auto flex max-w-screen-xl flex-col px-4 py-2" aria-label="Mobile">
            @foreach ($navLinks as $link)
                <a
                    href="{{ $link['href'] }}"
                    class="flex min-h-[44px] items-center border-b border-muted font-sans text-xs font-semibold uppercase tracking-widest text-foreground last:border-b-0 hover:text-brand"
                >
                    {{ $link['label'] }}
                </a>
            @endforeach
            <div class="py-3">
                <x-ui.button href="{{ $waLink }}" target="_blank" rel="noopener" class="w-full">
                    <x-ui.wa-icon class="h-4 w-4" />
                    Pasang Sekarang
                </x-ui.button>
            </div>
        </nav>
    </div>
</header>

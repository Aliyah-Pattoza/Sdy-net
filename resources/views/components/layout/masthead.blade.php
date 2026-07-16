@php
    $editionDate = now()->format('l, F j, Y');
    $navLinks = [
        ['label' => 'Front Page', 'href' => '#front'],
        ['label' => 'Dispatches', 'href' => '#dispatches'],
        ['label' => 'Method', 'href' => '#method'],
        ['label' => 'Archive', 'href' => '#archive'],
        ['label' => 'Subscribe', 'href' => '#subscribe'],
    ];
@endphp

<header class="sticky top-0 z-40 border-b-4 border-foreground bg-background/95 backdrop-blur-[2px]">
    {{-- Edition metadata bar --}}
    <div class="border-b border-foreground">
        <div class="mx-auto flex max-w-screen-xl items-center justify-between gap-4 px-4 py-2 font-mono text-xs uppercase tracking-widest text-neutral-500">
            <span>Vol. 1 · No. {{ now()->format('z') + 1 }}</span>
            <span class="hidden sm:inline">{{ $editionDate }}</span>
            <span>New York Edition</span>
        </div>
    </div>

    {{-- Masthead --}}
    <div class="mx-auto max-w-screen-xl px-4">
        <div class="flex items-center justify-between gap-4 py-4 lg:py-6">
            <a href="/" class="group block focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground focus-visible:ring-offset-2">
                <p class="font-mono text-[10px] uppercase tracking-[0.35em] text-neutral-500 transition-colors group-hover:text-accent">
                    The Daily Signal
                </p>
                <p class="font-serif text-4xl font-black leading-none tracking-tighter text-foreground sm:text-5xl lg:text-6xl">
                    SDY
                </p>
            </a>

            <nav class="hidden items-center gap-1 lg:flex" aria-label="Primary">
                @foreach ($navLinks as $link)
                    <a
                        href="{{ $link['href'] }}"
                        class="inline-flex min-h-[44px] items-center px-3 font-sans text-xs font-semibold uppercase tracking-widest text-foreground transition-colors duration-200 hover:text-accent"
                    >
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </nav>

            <button
                type="button"
                id="mobile-nav-toggle"
                class="inline-flex h-11 w-11 items-center justify-center border border-foreground text-foreground transition-all duration-200 hover:bg-foreground hover:text-background lg:hidden"
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

    {{-- Mobile nav --}}
    <div id="mobile-nav" class="hidden border-t border-foreground lg:hidden" hidden>
        <nav class="mx-auto flex max-w-screen-xl flex-col px-4 py-2" aria-label="Mobile">
            @foreach ($navLinks as $link)
                <a
                    href="{{ $link['href'] }}"
                    class="flex min-h-[44px] items-center border-b border-muted font-sans text-xs font-semibold uppercase tracking-widest text-foreground last:border-b-0 hover:text-accent"
                >
                    {{ $link['label'] }}
                </a>
            @endforeach
        </nav>
    </div>
</header>

<x-layouts.app title="Front Page">
    <x-layout.masthead />
    <x-layout.ticker />

    <main>
        {{-- Hero: brand-first editorial front page --}}
        <section id="front" class="newsprint-texture border-b border-foreground">
            <div class="mx-auto max-w-screen-xl px-4">
                <div class="grid grid-cols-1 border-x border-foreground lg:grid-cols-12">
                    <div class="border-b border-foreground p-6 sm:p-8 lg:col-span-8 lg:border-b-0 lg:border-r lg:p-10">
                        <x-ui.badge variant="accent" class="mb-6">Breaking</x-ui.badge>

                        <h1 class="font-serif text-5xl font-black leading-[0.9] tracking-tighter text-foreground sm:text-6xl lg:text-9xl">
                            SDY
                        </h1>

                        <p class="mt-4 max-w-2xl font-serif text-2xl font-semibold leading-tight text-neutral-700 sm:text-3xl lg:text-4xl">
                            Structure is the story.
                        </p>

                        <p class="drop-cap mt-6 max-w-xl font-body text-base leading-relaxed text-neutral-600 sm:text-lg">
                            A newsprint-born design system for Laravel — high contrast, sharp grids, and typography
                            that earns its authority. Built for interfaces that read like a publication of record.
                        </p>

                        <div class="mt-8 flex w-full flex-col gap-3 sm:w-auto sm:flex-row">
                            <x-ui.button href="#dispatches" class="w-full sm:w-auto">
                                Read the dispatches
                            </x-ui.button>
                            <x-ui.button href="#subscribe" variant="secondary" class="w-full sm:w-auto">
                                Subscribe
                            </x-ui.button>
                        </div>
                    </div>

                    <aside class="flex flex-col lg:col-span-4">
                        <div class="flex flex-1 flex-col justify-between border-b border-foreground p-6 lg:p-8">
                            <x-ui.section-label>Today's Lead</x-ui.section-label>
                            <div class="mt-4">
                                <p class="font-mono text-xs uppercase tracking-widest text-accent">Fig. 1.1</p>
                                <h2 class="mt-2 font-serif text-2xl font-bold leading-tight lg:text-3xl">
                                    Typography before decoration.
                                </h2>
                                <p class="mt-3 font-body text-sm leading-relaxed text-justify text-neutral-600">
                                    Massive serifs, ink-black rules, and zero radius. The page should feel like holding
                                    a morning edition — crisp, organized, information-rich.
                                </p>
                            </div>
                        </div>
                        <div class="relative min-h-[200px] flex-1 overflow-hidden bg-neutral-200 lg:min-h-0">
                            <div class="halftone-placeholder absolute inset-0 opacity-100" aria-hidden="true"></div>
                            <div class="absolute inset-0 flex items-end p-6">
                                <p class="font-mono text-xs uppercase tracking-widest text-foreground">
                                    Halftone · Desk Photo
                                </p>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </section>

        <x-ui.ornament />

        {{-- Dispatches: collapsed newspaper column grid --}}
        <section id="dispatches" class="border-b border-foreground py-16">
            <div class="mx-auto max-w-screen-xl px-4">
                <div class="mb-8 flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <x-ui.section-label>Section A</x-ui.section-label>
                        <h2 class="mt-2 font-serif text-4xl font-black uppercase tracking-tight lg:text-5xl">
                            Dispatches
                        </h2>
                    </div>
                    <p class="max-w-md font-body text-sm leading-relaxed text-neutral-600">
                        Four columns. Shared borders. No soft shadows — just ink and paper.
                    </p>
                </div>

                <div class="grid grid-cols-1 border-l border-t border-foreground sm:grid-cols-2 lg:grid-cols-4">
                    @php
                        $dispatches = [
                            [
                                'kicker' => 'Design',
                                'title' => 'Sharp corners only',
                                'body' => 'Every element is a perfect rectangle. Soft UI has no place on this desk.',
                            ],
                            [
                                'kicker' => 'Type',
                                'title' => 'Playfair leads',
                                'body' => 'Display serifs for headlines. Lora for reading. Inter for the chrome.',
                            ],
                            [
                                'kicker' => 'Grid',
                                'title' => 'Visible structure',
                                'body' => 'Borders are celebrated. Columns collapse cleanly from four to one.',
                            ],
                            [
                                'kicker' => 'Accent',
                                'title' => 'Red, sparingly',
                                'body' => 'Editorial red appears only for breaking badges, CTAs, and hover states.',
                            ],
                        ];
                    @endphp

                    @foreach ($dispatches as $index => $item)
                        <article class="group border-b border-r border-foreground bg-background p-6 transition-colors duration-200 hover:bg-neutral-100 hard-shadow-hover grid-border-r">
                            <x-ui.section-label>{{ $item['kicker'] }}</x-ui.section-label>
                            <h3 class="mt-3 font-serif text-2xl font-bold leading-tight lg:text-3xl">
                                {{ $item['title'] }}
                            </h3>
                            <p class="mt-3 font-body text-sm leading-relaxed text-justify text-neutral-600">
                                {{ $item['body'] }}
                            </p>
                            <x-ui.button href="#method" variant="link" class="mt-4">
                                Continue →
                            </x-ui.button>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Method: inverted black section --}}
        <section id="method" class="border-b border-foreground bg-foreground text-background">
            <div class="mx-auto max-w-screen-xl px-4 py-16">
                <div class="grid grid-cols-1 gap-10 lg:grid-cols-12 lg:gap-0">
                    <div class="lg:col-span-5 lg:border-r lg:border-neutral-700 lg:pr-10">
                        <x-ui.section-label class="!text-neutral-400">How It Works</x-ui.section-label>
                        <h2 class="mt-2 font-serif text-4xl font-black leading-tight lg:text-5xl">
                            From token to type.
                        </h2>
                        <p class="mt-4 font-body text-base leading-relaxed text-neutral-400">
                            Centralize the DNA once — colors, type, radius, motion — then compose pages from sharp,
                            reusable Blade primitives.
                        </p>
                    </div>

                    <ol class="lg:col-span-7 lg:pl-10">
                        @php
                            $steps = [
                                ['n' => '01', 'title' => 'Tokens', 'copy' => 'Newsprint colors and fonts live in Tailwind @theme — one source of truth.'],
                                ['n' => '02', 'title' => 'Primitives', 'copy' => 'Buttons, cards, inputs, and badges share variants without one-off styles.'],
                                ['n' => '03', 'title' => 'Layouts', 'copy' => 'Masthead, ticker, and footer encode the editorial chrome of every edition.'],
                                ['n' => '04', 'title' => 'Pages', 'copy' => 'Compose asymmetric 8/4 and 5/7 grids with collapsed borders and ornaments.'],
                            ];
                        @endphp

                        @foreach ($steps as $step)
                            <li class="flex gap-6 border-b border-neutral-700 py-6 last:border-b-0">
                                <span class="font-mono text-2xl font-medium text-accent">{{ $step['n'] }}</span>
                                <div>
                                    <h3 class="font-serif text-2xl font-bold">{{ $step['title'] }}</h3>
                                    <p class="mt-2 font-body text-sm leading-relaxed text-neutral-400">
                                        {{ $step['copy'] }}
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </section>

        {{-- Archive: asymmetric 5/7 feature split --}}
        <section id="archive" class="border-b border-foreground py-16">
            <div class="mx-auto max-w-screen-xl px-4">
                <div class="grid grid-cols-1 border border-foreground lg:grid-cols-12">
                    <div class="relative min-h-[280px] overflow-hidden bg-neutral-200 lg:col-span-5 lg:border-r lg:border-foreground">
                        <div class="group absolute inset-0">
                            <div class="halftone-placeholder absolute inset-0 newsprint-image opacity-100 scale-100" aria-hidden="true"></div>
                        </div>
                        <div class="absolute inset-0 flex flex-col justify-between p-6">
                            <x-ui.badge>Fig. 2.0</x-ui.badge>
                            <p class="font-mono text-xs uppercase tracking-widest">Archive plate</p>
                        </div>
                    </div>

                    <div class="p-6 sm:p-8 lg:col-span-7 lg:p-10">
                        <x-ui.section-label>From the Archive</x-ui.section-label>
                        <h2 class="mt-2 font-serif text-4xl font-black leading-tight lg:text-5xl">
                            Density without noise.
                        </h2>
                        <p class="drop-cap mt-6 font-body text-base leading-relaxed text-justify text-neutral-600">
                            High information density is not clutter. Tight padding, collapsed borders, and justified
                            columns create the cadence of a broadsheet — urgent, trustworthy, and readable at speed.
                        </p>
                        <div class="mt-8 grid grid-cols-1 gap-0 border-t border-foreground sm:grid-cols-3">
                            @foreach ([
                                ['stat' => '0px', 'label' => 'Border radius'],
                                ['stat' => '12', 'label' => 'Column grid'],
                                ['stat' => '1%', 'label' => 'Accent usage'],
                            ] as $stat)
                                <div class="border-b border-foreground p-4 sm:border-b-0 sm:border-r sm:last:border-r-0">
                                    <p class="font-mono text-3xl font-medium tracking-tighter">{{ $stat['stat'] }}</p>
                                    <p class="mt-1 font-mono text-xs uppercase tracking-widest text-neutral-500">
                                        {{ $stat['label'] }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <x-ui.ornament />

        {{-- Component showcase strip --}}
        <section class="border-b border-foreground py-16">
            <div class="mx-auto max-w-screen-xl px-4">
                <x-ui.section-label>System Specimens</x-ui.section-label>
                <h2 class="mt-2 font-serif text-4xl font-black lg:text-5xl">UI in ink.</h2>

                <div class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-12">
                    <x-ui.card class="lg:col-span-4" hard-shadow interactive>
                        <div class="flex items-start gap-4">
                            <x-ui.icon-box>
                                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                                    <path stroke-linecap="square" d="M4 6h16M4 12h10M4 18h14" />
                                </svg>
                            </x-ui.icon-box>
                            <div>
                                <h3 class="font-serif text-2xl font-bold">Cards</h3>
                                <p class="mt-2 font-body text-sm text-neutral-600">
                                    Black border, off-white fill, optional hard-shadow hover.
                                </p>
                            </div>
                        </div>
                    </x-ui.card>

                    <div class="flex flex-col justify-center gap-4 border border-foreground p-6 lg:col-span-4">
                        <x-ui.section-label>Buttons</x-ui.section-label>
                        <div class="flex flex-wrap gap-3">
                            <x-ui.button size="sm">Primary</x-ui.button>
                            <x-ui.button variant="secondary" size="sm">Secondary</x-ui.button>
                            <x-ui.button variant="ghost" size="sm">Ghost</x-ui.button>
                        </div>
                        <x-ui.button variant="link">Link with red underline</x-ui.button>
                    </div>

                    <div class="border border-foreground p-6 lg:col-span-4">
                        <x-ui.section-label class="mb-4">Badges</x-ui.section-label>
                        <div class="flex flex-wrap gap-2">
                            <x-ui.badge>Default</x-ui.badge>
                            <x-ui.badge variant="accent">Breaking</x-ui.badge>
                            <x-ui.badge variant="inverted">Inverted</x-ui.badge>
                            <x-ui.badge variant="muted">Muted</x-ui.badge>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- FAQ accordion --}}
        <section id="faq" class="border-b border-foreground py-16">
            <div class="mx-auto max-w-screen-xl px-4">
                <div class="grid grid-cols-1 gap-10 lg:grid-cols-12">
                    <div class="lg:col-span-4">
                        <x-ui.section-label>Corrections Desk</x-ui.section-label>
                        <h2 class="mt-2 font-serif text-4xl font-black lg:text-5xl">FAQ</h2>
                    </div>

                    <div class="border-t border-foreground lg:col-span-8" data-accordion>
                        @php
                            $faqs = [
                                [
                                    'q' => 'Is this a dark mode design system?',
                                    'a' => 'No. Newsprint is permanently light — off-white paper, ink black type, and a single editorial red accent.',
                                ],
                                [
                                    'q' => 'Where do the design tokens live?',
                                    'a' => 'In resources/css/app.css under @theme, plus component utilities for textures, hard shadows, and drop caps.',
                                ],
                                [
                                    'q' => 'How should new pages be built?',
                                    'a' => 'Compose from x-ui.* and x-layout.* Blade components. Prefer 12-column asymmetric splits and collapsed borders over card grids.',
                                ],
                            ];
                        @endphp

                        @foreach ($faqs as $i => $faq)
                            <div class="border-b border-foreground" data-accordion-item>
                                <button
                                    type="button"
                                    class="flex w-full min-h-[44px] items-center justify-between gap-4 py-5 text-left font-serif text-xl font-bold transition-colors duration-200 hover:text-accent focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground focus-visible:ring-offset-2"
                                    aria-expanded="{{ $i === 0 ? 'true' : 'false' }}"
                                    data-accordion-trigger
                                >
                                    <span>{{ $faq['q'] }}</span>
                                    <span class="accordion-icon flex h-8 w-8 shrink-0 items-center justify-center border border-foreground font-mono text-lg transition-transform duration-200 {{ $i === 0 ? 'rotate-45' : '' }}" aria-hidden="true">+</span>
                                </button>
                                <div class="accordion-panel" data-open="{{ $i === 0 ? 'true' : 'false' }}">
                                    <div>
                                        <p class="pb-5 font-body text-sm leading-relaxed text-neutral-600">
                                            {{ $faq['a'] }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        {{-- Subscribe --}}
        <section id="subscribe" class="py-16">
            <div class="mx-auto max-w-screen-xl px-4">
                <div class="grid grid-cols-1 border border-foreground lg:grid-cols-12">
                    <div class="border-b border-foreground p-6 sm:p-8 lg:col-span-7 lg:border-b-0 lg:border-r lg:p-10">
                        <x-ui.section-label>Circulation</x-ui.section-label>
                        <h2 class="mt-2 font-serif text-4xl font-black leading-tight lg:text-5xl">
                            Get the morning edition.
                        </h2>
                        <p class="mt-4 max-w-lg font-body text-base leading-relaxed text-neutral-600">
                            One letter. No fluff. Design notes and system updates printed for the web.
                        </p>
                    </div>

                    <form class="flex flex-col justify-center gap-6 p-6 sm:p-8 lg:col-span-5" action="#" method="post" onsubmit="return false;">
                        <x-ui.input
                            type="email"
                            name="email"
                            label="Email address"
                            placeholder="desk@example.com"
                            required
                            autocomplete="email"
                        />
                        <x-ui.button type="submit" class="w-full">
                            Subscribe to SDY
                        </x-ui.button>
                        <p class="font-mono text-xs uppercase tracking-widest text-neutral-500">
                            Free · Cancel anytime · No spam
                        </p>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <x-layout.footer />
</x-layouts.app>

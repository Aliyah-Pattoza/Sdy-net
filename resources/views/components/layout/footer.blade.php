<footer class="border-t-4 border-foreground bg-background">
    <div class="mx-auto max-w-screen-xl px-4">
        <div class="grid grid-cols-1 border-l border-t border-foreground md:grid-cols-12">
            <div class="border-b border-r border-foreground p-6 md:col-span-5 md:p-8 lg:col-span-4">
                <p class="font-serif text-4xl font-black tracking-tighter">SDY</p>
                <p class="mt-3 font-body text-sm leading-relaxed text-neutral-600">
                    An editorial network for people who still believe structure, typography, and truth can share a page.
                </p>
                <p class="mt-6 font-mono text-xs uppercase tracking-widest text-neutral-500">
                    Edition: Vol 1.0 · Printed in NYC
                </p>
            </div>

            <div class="border-b border-r border-foreground p-6 md:col-span-3 md:p-8 lg:col-span-2">
                <p class="mb-4 font-mono text-xs uppercase tracking-widest text-neutral-500">Sections</p>
                <ul class="space-y-3 font-sans text-xs font-semibold uppercase tracking-widest">
                    <li><a href="#front" class="hover:text-accent">Front Page</a></li>
                    <li><a href="#dispatches" class="hover:text-accent">Dispatches</a></li>
                    <li><a href="#method" class="hover:text-accent">Method</a></li>
                    <li><a href="#archive" class="hover:text-accent">Archive</a></li>
                </ul>
            </div>

            <div class="border-b border-r border-foreground p-6 md:col-span-4 md:p-8 lg:col-span-3">
                <p class="mb-4 font-mono text-xs uppercase tracking-widest text-neutral-500">Desk</p>
                <ul class="space-y-3 font-sans text-xs font-semibold uppercase tracking-widest">
                    <li><a href="#subscribe" class="hover:text-accent">Subscribe</a></li>
                    <li><a href="#faq" class="hover:text-accent">Corrections</a></li>
                    <li><a href="mailto:desk@sdy.net" class="hover:text-accent">Contact Desk</a></li>
                </ul>
            </div>

            <div class="border-b border-r border-foreground p-6 md:col-span-12 md:p-8 lg:col-span-3">
                <p class="mb-4 font-mono text-xs uppercase tracking-widest text-neutral-500">Wire</p>
                <div class="flex gap-3">
                    @foreach (['X', 'In', 'Gh'] as $social)
                        <a
                            href="#"
                            class="flex h-11 w-11 items-center justify-center border border-foreground font-mono text-xs uppercase transition-all duration-200 hover:bg-foreground hover:text-background"
                            aria-label="{{ $social }} social link"
                        >
                            {{ $social }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="flex flex-col items-start justify-between gap-2 border-x border-b border-foreground px-4 py-4 font-mono text-xs uppercase tracking-widest text-neutral-500 sm:flex-row sm:items-center">
            <span>&copy; {{ date('Y') }} SDY Network</span>
            <span>All the signal that's fit to print</span>
        </div>
    </div>
</footer>

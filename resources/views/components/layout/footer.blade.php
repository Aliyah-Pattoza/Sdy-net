<footer class="border-t-4 border-brand bg-background">
    <div class="mx-auto max-w-screen-xl px-4">
        <div class="grid grid-cols-1 border-l border-t border-foreground md:grid-cols-12">
            <div class="border-b border-r border-foreground p-6 md:col-span-5 md:p-8 lg:col-span-4">
                <x-ui.logo variant="mark" class="h-14 w-auto" />
                <p class="mt-4 font-body text-sm leading-relaxed text-neutral-600">
                    SDY NET menghadirkan internet fiber berkecepatan tinggi untuk rumah dan bisnis — stabil, cepat, dan siap dipakai setiap hari.
                </p>
                <p class="mt-6 font-mono text-xs uppercase tracking-widest text-neutral-500">
                    High Speed Internet Provider
                </p>
            </div>

            <div class="border-b border-r border-foreground p-6 md:col-span-3 md:p-8 lg:col-span-2">
                <p class="mb-4 font-mono text-xs uppercase tracking-widest text-neutral-500">Menu</p>
                <ul class="space-y-3 font-sans text-xs font-semibold uppercase tracking-widest">
                    <li><a href="#front" class="hover:text-brand">Beranda</a></li>
                    <li><a href="#paket" class="hover:text-brand">Paket</a></li>
                    <li><a href="#keunggulan" class="hover:text-brand">Keunggulan</a></li>
                    <li><a href="#jangkauan" class="hover:text-brand">Jangkauan</a></li>
                </ul>
            </div>

            <div class="border-b border-r border-foreground p-6 md:col-span-4 md:p-8 lg:col-span-3">
                <p class="mb-4 font-mono text-xs uppercase tracking-widest text-neutral-500">Layanan</p>
                <ul class="space-y-3 font-sans text-xs font-semibold uppercase tracking-widest">
                    <li><a href="#kontak" class="hover:text-brand">Pasang Baru</a></li>
                    <li><a href="#faq" class="hover:text-brand">FAQ</a></li>
                    <li><a href="mailto:info@sdy.net" class="hover:text-brand">info@sdy.net</a></li>
                </ul>
            </div>

            <div class="border-b border-r border-foreground p-6 md:col-span-12 md:p-8 lg:col-span-3">
                <p class="mb-4 font-mono text-xs uppercase tracking-widest text-neutral-500">Sosial</p>
                <div class="flex gap-3">
                    @foreach (['Ig', 'Fb', 'Wa'] as $social)
                        <a
                            href="#"
                            class="flex h-11 w-11 items-center justify-center border border-brand text-brand font-mono text-xs uppercase transition-all duration-200 hover:bg-brand hover:text-white"
                            aria-label="{{ $social }} social link"
                        >
                            {{ $social }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="flex flex-col items-start justify-between gap-2 border-x border-b border-foreground px-4 py-4 font-mono text-xs uppercase tracking-widest text-neutral-500 sm:flex-row sm:items-center">
            <span>&copy; {{ date('Y') }} SDY NET</span>
            <span>Faster. Stable. Connected.</span>
        </div>
    </div>
</footer>

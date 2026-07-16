@php
    $home = route('home');
    $waDisplay = config('sdynet.whatsapp_display');
    $waLink = 'https://wa.me/'.config('sdynet.whatsapp').'?text='.rawurlencode('Halo SDY NET, saya ingin daftar internet.');
@endphp

<footer class="border-t-4 border-brand bg-background">
    <div class="mx-auto max-w-screen-xl px-4">
        <div class="grid grid-cols-1 border-l border-t border-foreground md:grid-cols-12">
            <div class="border-b border-r border-foreground p-6 md:col-span-5 md:p-8 lg:col-span-4">
                <x-ui.logo variant="mark" class="h-14 w-auto" />
                <p class="mt-4 font-body text-sm leading-relaxed text-neutral-600">
                    SDY NET — internet cepat &amp; handal untuk rumah dan bisnis. Streaming, kerja, dan gaming lancar
                    dengan proses pendaftaran yang mudah.
                </p>
                <p class="mt-6 font-mono text-xs uppercase tracking-widest text-neutral-500">
                    Internet Cepat &amp; Handal
                </p>
            </div>

            <div class="border-b border-r border-foreground p-6 md:col-span-3 md:p-8 lg:col-span-2">
                <p class="mb-4 font-mono text-xs uppercase tracking-widest text-neutral-500">Menu</p>
                <ul class="space-y-3 font-sans text-xs font-semibold uppercase tracking-widest">
                    <li><a href="{{ $home }}#front" class="hover:text-brand">Beranda</a></li>
                    <li><a href="{{ $home }}#paket" class="hover:text-brand">Paket</a></li>
                    <li><a href="{{ $home }}#keunggulan" class="hover:text-brand">Keunggulan</a></li>
                    <li><a href="{{ $home }}#cara-daftar" class="hover:text-brand">Cara Daftar</a></li>
                </ul>
            </div>

            <div class="border-b border-r border-foreground p-6 md:col-span-4 md:p-8 lg:col-span-3">
                <p class="mb-4 font-mono text-xs uppercase tracking-widest text-neutral-500">Paket</p>
                <ul class="space-y-3 font-sans text-xs font-semibold uppercase tracking-widest">
                    @foreach (config('sdynet.packages') as $package)
                        <li><a href="{{ route('register', ['paket' => $package['slug']]) }}" class="hover:text-brand">{{ str_replace('Paket ', '', $package['name']) }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="border-b border-r border-foreground p-6 md:col-span-12 md:p-8 lg:col-span-3">
                <p class="mb-4 font-mono text-xs uppercase tracking-widest text-neutral-500">Kontak</p>
                <a
                    href="{{ $waLink }}"
                    target="_blank"
                    rel="noopener"
                    class="inline-flex min-h-[44px] items-center gap-2 border border-brand bg-background px-4 py-2 font-sans text-sm font-semibold text-brand transition-all duration-200 hover:bg-[#25D366] hover:border-[#25D366] hover:text-white"
                >
                    <x-ui.wa-icon class="h-5 w-5" />
                    {{ $waDisplay }}
                </a>
            </div>
        </div>

        <div class="flex flex-col items-start justify-between gap-2 border-x border-b border-foreground px-4 py-4 font-mono text-xs uppercase tracking-widest text-neutral-500 sm:flex-row sm:items-center">
            <span>&copy; {{ date('Y') }} SDY NET</span>
            <span>Internet Cepat &amp; Handal</span>
        </div>
    </div>
</footer>

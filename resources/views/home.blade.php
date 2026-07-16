@php
    $wa = config('sdynet.whatsapp');
    $waDisplay = config('sdynet.whatsapp_display');
    $packages = config('sdynet.packages');
    $installFee = number_format(config('sdynet.install_fee'), 0, ',', '.');
    $installNote = config('sdynet.install_note');
    $taxNote = config('sdynet.tax_note');
    $waGeneral = 'https://wa.me/'.$wa.'?text='.rawurlencode('Halo SDY NET, saya ingin daftar internet. Mohon bantuannya.');
@endphp

<x-layouts.app title="Internet Cepat & Handal">
    <x-layout.masthead />
    <x-layout.ticker />

    <main>
        {{-- Hero --}}
        <section id="front" class="newsprint-texture border-b border-foreground">
            <div class="mx-auto max-w-screen-xl px-4">
                <div class="grid grid-cols-1 border-x border-foreground lg:grid-cols-12">
                    <div class="border-b border-foreground p-6 sm:p-8 lg:col-span-7 lg:border-b-0 lg:border-r lg:p-10">
                        <x-ui.badge variant="accent" class="mb-6">Fiber Ready</x-ui.badge>

                        <div class="max-w-xl">
                            <x-ui.logo variant="full" class="w-full max-w-[240px] sm:max-w-sm lg:max-w-md" />
                        </div>

                        <h1 class="speed-line mt-8 max-w-xl font-serif text-3xl font-black uppercase italic leading-tight text-foreground sm:text-4xl lg:text-5xl">
                            Internet Cepat <span class="text-brand-gradient">&amp; Handal</span>
                        </h1>

                        <p class="mt-6 max-w-xl font-body text-base leading-relaxed text-neutral-600 sm:text-lg">
                            SDY NET menghadirkan koneksi internet stabil untuk rumah dan bisnis — cocok untuk browsing,
                            streaming, kerja, hingga gaming. Daftar cepat langsung lewat WhatsApp.
                        </p>

                        <div class="mt-8 flex w-full flex-col gap-3 sm:flex-row">
                            <x-ui.button href="#paket" class="w-full sm:w-auto">
                                Lihat paket
                            </x-ui.button>
                            <x-ui.button href="{{ $waGeneral }}" target="_blank" rel="noopener" variant="secondary" class="w-full sm:w-auto">
                                <x-ui.wa-icon class="h-4 w-4" />
                                Daftar via WhatsApp
                            </x-ui.button>
                        </div>
                    </div>

                    {{-- Promo pemasangan --}}
                    <aside class="flex flex-col lg:col-span-5">
                        <div class="flex flex-1 flex-col justify-between bg-signal-panel p-6 text-white lg:p-8">
                            <div>
                                <x-ui.section-label class="!text-accent">Promo Pemasangan</x-ui.section-label>
                                <p class="mt-4 font-body text-sm leading-relaxed text-white/70">
                                    Pemasangan &amp; sewa modem
                                </p>
                                <p class="mt-2 flex items-baseline gap-2">
                                    <span class="font-mono text-lg text-white/70">Rp</span>
                                    <span class="font-serif text-5xl font-black italic tracking-tight text-white lg:text-6xl">{{ $installFee }}</span>
                                </p>
                            </div>

                            <div class="mt-6 space-y-3">
                                <div class="flex items-center gap-3 border border-white/20 bg-white/5 px-4 py-3">
                                    <span class="inline-block h-2 w-2 shrink-0 bg-accent" aria-hidden="true"></span>
                                    <span class="font-sans text-sm font-semibold">{{ ucfirst($installNote) }}</span>
                                </div>
                                <a
                                    href="{{ $waGeneral }}"
                                    target="_blank"
                                    rel="noopener"
                                    class="inline-flex w-full min-h-[44px] items-center justify-center gap-2 bg-[#25D366] px-4 py-3 font-sans text-xs font-semibold uppercase tracking-widest text-white transition-transform duration-200 hover:-translate-y-0.5"
                                >
                                    <x-ui.wa-icon class="h-5 w-5" />
                                    Hubungi {{ $waDisplay }}
                                </a>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </section>

        <x-ui.ornament />

        {{-- Paket --}}
        <section id="paket" class="border-b border-foreground py-14 sm:py-16">
            <div class="mx-auto max-w-screen-xl px-4">
                <div class="mb-8 flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <x-ui.section-label>Pilihan Paket</x-ui.section-label>
                        <h2 class="mt-2 font-serif text-4xl font-black italic tracking-tight lg:text-5xl">
                            Paket Internet SDY NET
                        </h2>
                    </div>
                    <p class="max-w-md font-body text-sm leading-relaxed text-neutral-600">
                        Klik paket untuk langsung mendaftar via WhatsApp. Pilih sesuai kebutuhan — bisa upgrade kapan saja.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($packages as $package)
                        <x-ui.package-card :package="$package" />
                    @endforeach
                </div>

                {{-- Catatan biaya & pajak --}}
                <div class="mt-6 flex flex-col gap-3 border border-foreground bg-neutral-100 p-5 sm:flex-row sm:items-center sm:justify-between">
                    <div class="flex items-start gap-3">
                        <span class="mt-0.5 inline-flex h-6 w-6 shrink-0 items-center justify-center border border-brand text-brand" aria-hidden="true">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path stroke-linecap="round" d="M12 8v5m0 3h.01M12 3l9 16H3l9-16Z"/></svg>
                        </span>
                        <p class="font-body text-sm leading-relaxed text-neutral-700">
                            {{ $taxNote }}. Biaya pemasangan &amp; sewa modem Rp {{ $installFee }} —
                            <span class="font-semibold text-foreground">{{ $installNote }}</span>.
                        </p>
                    </div>
                    <x-ui.button href="{{ $waGeneral }}" target="_blank" rel="noopener" size="sm" class="shrink-0">
                        <x-ui.wa-icon class="h-4 w-4" />
                        Tanya admin
                    </x-ui.button>
                </div>
            </div>
        </section>

        {{-- Keunggulan inverted --}}
        <section id="keunggulan" class="border-b border-foreground bg-signal-panel text-white">
            <div class="mx-auto max-w-screen-xl px-4 py-14 sm:py-16">
                <div class="grid grid-cols-1 gap-10 lg:grid-cols-12 lg:gap-0">
                    <div class="lg:col-span-5 lg:border-r lg:border-white/20 lg:pr-10">
                        <x-ui.section-label class="!text-accent">Kenapa SDY NET</x-ui.section-label>
                        <h2 class="mt-2 font-serif text-4xl font-black italic leading-tight lg:text-5xl">
                            Cepat, stabil, dan handal.
                        </h2>
                        <p class="mt-4 font-body text-base leading-relaxed text-white/70">
                            Bukan sekadar janji — koneksi yang dipakai sehari-hari untuk keluarga, kerja, dan usaha Anda.
                        </p>
                    </div>

                    <ol class="lg:col-span-7 lg:pl-10">
                        @php
                            $steps = [
                                ['n' => '01', 'title' => 'Koneksi stabil', 'copy' => 'Jaringan dirawat agar kecepatan tetap konsisten sepanjang hari.'],
                                ['n' => '02', 'title' => 'Bayar setelah pasang', 'copy' => 'Biaya pemasangan & sewa modem dibayar setelah instalasi selesai.'],
                                ['n' => '03', 'title' => 'Pilihan lengkap', 'copy' => 'Empat paket mulai browsing hingga gaming & streaming HD.'],
                                ['n' => '04', 'title' => 'Daftar via WhatsApp', 'copy' => 'Proses cepat, tinggal chat admin dan tim kami bantu prosesnya.'],
                            ];
                        @endphp

                        @foreach ($steps as $step)
                            <li class="flex gap-6 border-b border-white/15 py-6 last:border-b-0">
                                <span class="font-mono text-2xl font-medium text-accent">{{ $step['n'] }}</span>
                                <div>
                                    <h3 class="font-serif text-2xl font-bold italic">{{ $step['title'] }}</h3>
                                    <p class="mt-2 font-body text-sm leading-relaxed text-white/70">
                                        {{ $step['copy'] }}
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </section>

        {{-- Cara daftar --}}
        <section id="cara-daftar" class="border-b border-foreground py-14 sm:py-16">
            <div class="mx-auto max-w-screen-xl px-4">
                <x-ui.section-label>Cara Daftar</x-ui.section-label>
                <h2 class="mt-2 font-serif text-4xl font-black italic lg:text-5xl">Tiga langkah, langsung online.</h2>

                <div class="mt-8 grid grid-cols-1 border-l border-t border-foreground sm:grid-cols-3">
                    @foreach ([
                        ['n' => '1', 'title' => 'Pilih paket', 'copy' => 'Tentukan paket yang sesuai kebutuhan dan budget Anda.'],
                        ['n' => '2', 'title' => 'Chat WhatsApp', 'copy' => 'Klik paket atau tombol WA, tim kami cek jangkauan di lokasi Anda.'],
                        ['n' => '3', 'title' => 'Instalasi', 'copy' => 'Teknisi datang memasang. Bayar setelah instalasi selesai.'],
                    ] as $step)
                        <div class="border-b border-r border-foreground p-6 grid-border-r">
                            <span class="font-serif text-5xl font-black italic text-brand-gradient">{{ $step['n'] }}</span>
                            <h3 class="mt-3 font-serif text-2xl font-bold italic">{{ $step['title'] }}</h3>
                            <p class="mt-2 font-body text-sm leading-relaxed text-neutral-600">{{ $step['copy'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- FAQ --}}
        <section id="faq" class="border-b border-foreground py-14 sm:py-16">
            <div class="mx-auto max-w-screen-xl px-4">
                <div class="grid grid-cols-1 gap-10 lg:grid-cols-12">
                    <div class="lg:col-span-4">
                        <x-ui.section-label>Bantuan</x-ui.section-label>
                        <h2 class="mt-2 font-serif text-4xl font-black italic lg:text-5xl">FAQ</h2>
                    </div>

                    <div class="border-t border-foreground lg:col-span-8" data-accordion>
                        @php
                            $faqs = [
                                [
                                    'q' => 'Bagaimana cara mendaftar?',
                                    'a' => 'Pilih paket lalu klik tombol daftar — Anda akan diarahkan ke WhatsApp admin kami dengan pesan otomatis. Tim akan membantu cek jangkauan dan jadwal pemasangan.',
                                ],
                                [
                                    'q' => 'Kapan biaya pemasangan dibayar?',
                                    'a' => 'Biaya pemasangan & sewa modem sebesar Rp '.$installFee.' dibayar setelah instalasi selesai.',
                                ],
                                [
                                    'q' => 'Apakah harga sudah termasuk pajak?',
                                    'a' => $taxNote.'. Rincian akhir akan diinformasikan admin saat pendaftaran.',
                                ],
                                [
                                    'q' => 'Paket mana yang cocok untuk saya?',
                                    'a' => 'Basic Speed untuk browsing & sosial media, Fast Net untuk streaming & kerja, Turbo Net untuk banyak perangkat, dan Ultra Max untuk gaming & streaming HD.',
                                ],
                            ];
                        @endphp

                        @foreach ($faqs as $i => $faq)
                            <div class="border-b border-foreground" data-accordion-item>
                                <button
                                    type="button"
                                    class="flex w-full min-h-[44px] items-center justify-between gap-4 py-5 text-left font-serif text-lg font-bold italic transition-colors duration-200 hover:text-brand focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand focus-visible:ring-offset-2 sm:text-xl"
                                    aria-expanded="{{ $i === 0 ? 'true' : 'false' }}"
                                    data-accordion-trigger
                                >
                                    <span>{{ $faq['q'] }}</span>
                                    <span class="accordion-icon flex h-8 w-8 shrink-0 items-center justify-center border border-brand text-brand font-mono text-lg transition-transform duration-200 {{ $i === 0 ? 'rotate-45' : '' }}" aria-hidden="true">+</span>
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

        {{-- Kontak / CTA --}}
        <section id="kontak" class="py-14 sm:py-16">
            <div class="mx-auto max-w-screen-xl px-4">
                <div class="grid grid-cols-1 border border-foreground lg:grid-cols-12">
                    <div class="border-b border-foreground p-6 sm:p-8 lg:col-span-7 lg:border-b-0 lg:border-r lg:p-10">
                        <x-ui.section-label>Hubungi Kami</x-ui.section-label>
                        <h2 class="mt-2 font-serif text-4xl font-black italic uppercase leading-tight text-brand-gradient lg:text-5xl">
                            Hubungi Kami Sekarang!
                        </h2>
                        <p class="mt-4 max-w-lg font-body text-base leading-relaxed text-neutral-600">
                            Siap pasang internet cepat &amp; handal di rumah atau tempat usaha Anda? Chat admin kami,
                            prosesnya cepat dan mudah.
                        </p>

                        <a
                            href="{{ $waGeneral }}"
                            target="_blank"
                            rel="noopener"
                            class="mt-6 inline-flex items-center gap-3 font-serif text-3xl font-black italic tracking-tight text-foreground transition-colors hover:text-brand sm:text-4xl"
                        >
                            <span class="inline-flex h-11 w-11 items-center justify-center bg-[#25D366] text-white">
                                <x-ui.wa-icon class="h-6 w-6" />
                            </span>
                            {{ $waDisplay }}
                        </a>
                    </div>

                    <div class="flex flex-col justify-center gap-4 bg-neutral-100 p-6 sm:p-8 lg:col-span-5">
                        <p class="font-mono text-xs uppercase tracking-widest text-neutral-500">Kirim lokasi Anda</p>
                        @foreach ($packages as $package)
                            @php
                                $p = number_format($package['price'], 0, ',', '.');
                                $link = 'https://wa.me/'.$wa.'?text='.rawurlencode("Halo SDY NET, saya mau daftar *{$package['name']}* (Rp {$p}/bulan).");
                            @endphp
                            <a
                                href="{{ $link }}"
                                target="_blank"
                                rel="noopener"
                                class="group flex min-h-[44px] items-center justify-between gap-3 border border-foreground bg-background px-4 py-3 transition-all duration-200 hover:-translate-y-0.5 hover:shadow-[3px_3px_0_0_#0B1F3A]"
                            >
                                <span class="font-sans text-sm font-semibold">{{ $package['name'] }}</span>
                                <span class="font-mono text-xs uppercase tracking-widest text-brand">Rp {{ $p }} →</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>

    <x-layout.whatsapp-fab />
    <x-layout.footer />
</x-layouts.app>

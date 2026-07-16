<x-layouts.app title="High Speed Internet">
    <x-layout.masthead />
    <x-layout.ticker />

    <main>
        {{-- Hero --}}
        <section id="front" class="newsprint-texture border-b border-foreground">
            <div class="mx-auto max-w-screen-xl px-4">
                <div class="grid grid-cols-1 border-x border-foreground lg:grid-cols-12">
                    <div class="border-b border-foreground p-6 sm:p-8 lg:col-span-8 lg:border-b-0 lg:border-r lg:p-10">
                        <x-ui.badge variant="accent" class="mb-6">Fiber Ready</x-ui.badge>

                        <div class="max-w-xl">
                            <x-ui.logo variant="full" class="w-full max-w-md sm:max-w-lg lg:max-w-xl" />
                        </div>

                        <p class="speed-line mt-8 max-w-xl font-serif text-2xl font-black italic leading-tight text-foreground sm:text-3xl lg:text-4xl">
                            Internet cepat. Koneksi stabil.
                        </p>

                        <p class="drop-cap mt-6 max-w-xl font-body text-base leading-relaxed text-neutral-600 sm:text-lg">
                            SDY NET menghadirkan fiber broadband untuk rumah dan bisnis. Streaming tanpa buffering,
                            meeting lancar, dan game responsif — dengan dukungan yang siap membantu kapan saja.
                        </p>

                        <div class="mt-8 flex w-full flex-col gap-3 sm:w-auto sm:flex-row">
                            <x-ui.button href="#paket" class="w-full sm:w-auto">
                                Lihat paket
                            </x-ui.button>
                            <x-ui.button href="#kontak" variant="secondary" class="w-full sm:w-auto">
                                Cek jangkauan
                            </x-ui.button>
                        </div>
                    </div>

                    <aside class="flex flex-col lg:col-span-4">
                        <div class="flex flex-1 flex-col justify-between border-b border-foreground p-6 lg:p-8">
                            <x-ui.section-label>Spotlight</x-ui.section-label>
                            <div class="mt-4">
                                <p class="font-mono text-xs uppercase tracking-widest text-brand">Paket unggulan</p>
                                <h2 class="mt-2 font-serif text-2xl font-black italic leading-tight lg:text-3xl">
                                    Hingga <span class="text-brand-gradient">1 Gbps</span>
                                </h2>
                                <p class="mt-3 font-body text-sm leading-relaxed text-neutral-600">
                                    Bandwidth simetris, latency rendah, dan trafik tanpa batas untuk keluarga digital
                                    maupun kantor kecil.
                                </p>
                            </div>
                        </div>
                        <div class="relative min-h-[220px] flex-1 overflow-hidden signal-mesh lg:min-h-0">
                            <div class="absolute inset-0 flex flex-col justify-between p-6 text-foreground">
                                <x-ui.badge variant="inverted">Live Network</x-ui.badge>
                                <div>
                                    <p class="font-mono text-4xl font-medium tracking-tighter text-brand-deep">99.9%</p>
                                    <p class="mt-1 font-mono text-xs uppercase tracking-widest">Uptime target</p>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </section>

        <x-ui.ornament />

        {{-- Paket --}}
        <section id="paket" class="border-b border-foreground py-16">
            <div class="mx-auto max-w-screen-xl px-4">
                <div class="mb-8 flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <x-ui.section-label>Pilihan kecepatan</x-ui.section-label>
                        <h2 class="mt-2 font-serif text-4xl font-black italic tracking-tight lg:text-5xl">
                            Paket SDY NET
                        </h2>
                    </div>
                    <p class="max-w-md font-body text-sm leading-relaxed text-neutral-600">
                        Pilih kecepatan sesuai kebutuhan. Semua paket fiber, siap upgrade kapan saja.
                    </p>
                </div>

                <div class="grid grid-cols-1 border-l border-t border-foreground sm:grid-cols-2 lg:grid-cols-4">
                    @php
                        $plans = [
                            [
                                'kicker' => 'Rumah',
                                'title' => '50 Mbps',
                                'body' => 'Ideal untuk browsing, sosial media, dan streaming HD di 1–2 perangkat.',
                                'price' => 'Mulai hemat',
                            ],
                            [
                                'kicker' => 'Keluarga',
                                'title' => '100 Mbps',
                                'body' => 'Streaming 4K, sekolah online, dan WFH berjalan berdampingan tanpa saling ganggu.',
                                'price' => 'Paling populer',
                            ],
                            [
                                'kicker' => 'Pro',
                                'title' => '300 Mbps',
                                'body' => 'Untuk kreator, gamer, dan rumah dengan banyak perangkat pintar.',
                                'price' => 'Performa tinggi',
                            ],
                            [
                                'kicker' => 'Biz',
                                'title' => '1 Gbps',
                                'body' => 'Kantor kecil hingga studio — upload cepat, meeting stabil, trafik padat tetap mulus.',
                                'price' => 'Maksimal',
                            ],
                        ];
                    @endphp

                    @foreach ($plans as $item)
                        <article class="group border-b border-r border-foreground bg-background p-6 transition-colors duration-200 hover:bg-neutral-100 hard-shadow-hover grid-border-r">
                            <x-ui.section-label>{{ $item['kicker'] }}</x-ui.section-label>
                            <h3 class="mt-3 font-serif text-3xl font-black italic leading-tight text-brand-gradient">
                                {{ $item['title'] }}
                            </h3>
                            <p class="mt-1 font-mono text-xs uppercase tracking-widest text-accent">{{ $item['price'] }}</p>
                            <p class="mt-3 font-body text-sm leading-relaxed text-neutral-600">
                                {{ $item['body'] }}
                            </p>
                            <x-ui.button href="#kontak" variant="link" class="mt-4">
                                Order paket →
                            </x-ui.button>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Keunggulan inverted --}}
        <section id="keunggulan" class="border-b border-foreground bg-signal-panel text-white">
            <div class="mx-auto max-w-screen-xl px-4 py-16">
                <div class="grid grid-cols-1 gap-10 lg:grid-cols-12 lg:gap-0">
                    <div class="lg:col-span-5 lg:border-r lg:border-white/20 lg:pr-10">
                        <x-ui.section-label class="!text-accent">Kenapa SDY NET</x-ui.section-label>
                        <h2 class="mt-2 font-serif text-4xl font-black italic leading-tight lg:text-5xl">
                            Dibangun untuk kecepatan nyata.
                        </h2>
                        <p class="mt-4 font-body text-base leading-relaxed text-white/70">
                            Bukan janji di brosur — infrastruktur fiber, monitoring aktif, dan tim support yang merespons cepat.
                        </p>
                    </div>

                    <ol class="lg:col-span-7 lg:pl-10">
                        @php
                            $steps = [
                                ['n' => '01', 'title' => 'Fiber optic', 'copy' => 'Kabel fiber untuk latency rendah dan kecepatan konsisten naik-turun.'],
                                ['n' => '02', 'title' => 'Tanpa FUP', 'copy' => 'Pakai sepuasnya untuk streaming, download, dan cloud — tanpa pelambatan tersembunyi.'],
                                ['n' => '03', 'title' => 'Instalasi rapi', 'copy' => 'Teknisi terjadwal, instalasi bersih, dan aktivasi yang transparan.'],
                                ['n' => '04', 'title' => 'Support 24/7', 'copy' => 'Bantuan via WhatsApp dan telepon kapan pun jaringan Anda butuh perhatian.'],
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

        {{-- Jangkauan --}}
        <section id="jangkauan" class="border-b border-foreground py-16">
            <div class="mx-auto max-w-screen-xl px-4">
                <div class="grid grid-cols-1 border border-foreground lg:grid-cols-12">
                    <div class="relative min-h-[280px] overflow-hidden signal-mesh lg:col-span-5 lg:border-r lg:border-foreground">
                        <div class="absolute inset-0 flex flex-col justify-between p-6">
                            <x-ui.badge variant="inverted">Coverage</x-ui.badge>
                            <p class="font-mono text-xs uppercase tracking-widest text-foreground">
                                Area layanan aktif & ekspansi
                            </p>
                        </div>
                    </div>

                    <div class="p-6 sm:p-8 lg:col-span-7 lg:p-10">
                        <x-ui.section-label>Jangkauan</x-ui.section-label>
                        <h2 class="mt-2 font-serif text-4xl font-black italic leading-tight lg:text-5xl">
                            Cek apakah rumah Anda sudah tercover.
                        </h2>
                        <p class="drop-cap mt-6 font-body text-base leading-relaxed text-neutral-600">
                            Jaringan SDY NET terus diperluas. Kirim lokasi Anda — tim kami akan konfirmasi ketersediaan
                            dan jadwal pemasangan dalam waktu singkat.
                        </p>
                        <div class="mt-8 grid grid-cols-1 gap-0 border-t border-foreground sm:grid-cols-3">
                            @foreach ([
                                ['stat' => '1G', 'label' => 'Max speed'],
                                ['stat' => '24/7', 'label' => 'Support'],
                                ['stat' => '0', 'label' => 'FUP limit'],
                            ] as $stat)
                                <div class="border-b border-foreground p-4 sm:border-b-0 sm:border-r sm:last:border-r-0">
                                    <p class="font-mono text-3xl font-medium tracking-tighter text-brand">{{ $stat['stat'] }}</p>
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

        {{-- Highlights --}}
        <section class="border-b border-foreground py-16">
            <div class="mx-auto max-w-screen-xl px-4">
                <x-ui.section-label>Yang Anda dapatkan</x-ui.section-label>
                <h2 class="mt-2 font-serif text-4xl font-black italic lg:text-5xl">Siap dipakai setiap hari.</h2>

                <div class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-12">
                    @foreach ([
                        ['title' => 'Streaming & gaming', 'body' => 'Buffering turun, ping stabil — cocok untuk hiburan keluarga dan kompetitif.'],
                        ['title' => 'Kerja & sekolah', 'body' => 'Video call jernih, upload file cepat, banyak perangkat online bersamaan.'],
                        ['title' => 'Bisnis kecil', 'body' => 'Koneksi andal untuk kasir cloud, CCTV, dan operasional harian.'],
                    ] as $item)
                        <x-ui.card class="lg:col-span-4" hard-shadow interactive>
                            <div class="flex items-start gap-4">
                                <x-ui.icon-box class="border-brand text-brand hover:bg-brand hover:text-white">
                                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                                        <path stroke-linecap="square" d="M4 12h16M12 4l8 8-8 8" />
                                    </svg>
                                </x-ui.icon-box>
                                <div>
                                    <h3 class="font-serif text-2xl font-bold italic">{{ $item['title'] }}</h3>
                                    <p class="mt-2 font-body text-sm text-neutral-600">{{ $item['body'] }}</p>
                                </div>
                            </div>
                        </x-ui.card>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- FAQ --}}
        <section id="faq" class="border-b border-foreground py-16">
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
                                    'q' => 'Berapa lama proses pemasangan?',
                                    'a' => 'Setelah area terkonfirmasi, jadwal instalasi biasanya dapat diatur dalam beberapa hari kerja tergantung antrean teknisi di lokasi Anda.',
                                ],
                                [
                                    'q' => 'Apakah ada batasan kuota (FUP)?',
                                    'a' => 'Tidak. Paket SDY NET dirancang tanpa FUP agar penggunaan harian tetap konsisten.',
                                ],
                                [
                                    'q' => 'Bagaimana cara cek jangkauan?',
                                    'a' => 'Isi formulir kontak dengan alamat atau kirim lokasi via WhatsApp — tim kami akan segera mengonfirmasi ketersediaan jaringan.',
                                ],
                            ];
                        @endphp

                        @foreach ($faqs as $i => $faq)
                            <div class="border-b border-foreground" data-accordion-item>
                                <button
                                    type="button"
                                    class="flex w-full min-h-[44px] items-center justify-between gap-4 py-5 text-left font-serif text-xl font-bold italic transition-colors duration-200 hover:text-brand focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand focus-visible:ring-offset-2"
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

        {{-- Kontak --}}
        <section id="kontak" class="py-16">
            <div class="mx-auto max-w-screen-xl px-4">
                <div class="grid grid-cols-1 border border-foreground lg:grid-cols-12">
                    <div class="border-b border-foreground p-6 sm:p-8 lg:col-span-7 lg:border-b-0 lg:border-r lg:p-10">
                        <x-ui.section-label>Mulai terhubung</x-ui.section-label>
                        <h2 class="mt-2 font-serif text-4xl font-black italic leading-tight lg:text-5xl">
                            Pasang SDY NET hari ini.
                        </h2>
                        <p class="mt-4 max-w-lg font-body text-base leading-relaxed text-neutral-600">
                            Tinggalkan kontak Anda. Kami hubungi untuk cek jangkauan, rekomendasi paket, dan jadwal instalasi.
                        </p>
                    </div>

                    <form class="flex flex-col justify-center gap-6 p-6 sm:p-8 lg:col-span-5" action="#" method="post" onsubmit="return false;">
                        <x-ui.input
                            type="text"
                            name="name"
                            label="Nama"
                            placeholder="Nama lengkap"
                            required
                            autocomplete="name"
                        />
                        <x-ui.input
                            type="tel"
                            name="phone"
                            label="WhatsApp / Telepon"
                            placeholder="08xxxxxxxxxx"
                            required
                            autocomplete="tel"
                        />
                        <x-ui.input
                            type="text"
                            name="address"
                            label="Alamat / Area"
                            placeholder="Kelurahan, kecamatan, kota"
                            required
                        />
                        <x-ui.button type="submit" class="w-full">
                            Kirim permintaan
                        </x-ui.button>
                        <p class="font-mono text-xs uppercase tracking-widest text-neutral-500">
                            Respon cepat · Tanpa spam
                        </p>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <x-layout.footer />
</x-layouts.app>

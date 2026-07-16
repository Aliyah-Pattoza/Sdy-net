@php
    $wa = config('sdynet.whatsapp');
    $waDisplay = config('sdynet.whatsapp_display');
    $installFee = number_format(config('sdynet.install_fee'), 0, ',', '.');
    $installNote = config('sdynet.install_note');
    $taxNote = config('sdynet.tax_note');

    $accent = $selected['accent'] ?? '#0056D6';
    $accentSoft = $selected['accent_soft'] ?? '#E6EEFB';
@endphp

<x-layouts.app title="Pendaftaran">
    <x-layout.masthead />

    <main
        id="daftar"
        class="mx-auto max-w-screen-xl px-4 py-10 sm:py-14"
        style="--accent: {{ $accent }}; --accent-soft: {{ $accentSoft }};"
    >
        {{-- Breadcrumb --}}
        <nav class="mb-6 flex items-center gap-2 font-mono text-xs uppercase tracking-widest text-neutral-500" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-brand">Beranda</a>
            <span aria-hidden="true">/</span>
            <a href="{{ route('home') }}#paket" class="hover:text-brand">Paket</a>
            <span aria-hidden="true">/</span>
            <span class="text-foreground">Pendaftaran</span>
        </nav>

        <header class="mb-8 border-b-4 border-foreground pb-6">
            <p class="font-mono text-xs uppercase tracking-widest" style="color: var(--accent);">Formulir Pendaftaran</p>
            <h1 class="mt-2 font-serif text-4xl font-black italic tracking-tight sm:text-5xl">
                Daftar SDY NET
            </h1>
            <p class="mt-3 max-w-2xl font-body text-sm leading-relaxed text-neutral-600 sm:text-base">
                Lengkapi data di bawah ini. Setelah menekan <span class="font-semibold text-foreground">Kirim</span>,
                data Anda akan diteruskan ke WhatsApp admin kami untuk diproses.
            </p>
        </header>

        <div class="grid grid-cols-1 gap-8 lg:grid-cols-12">
            {{-- Ringkasan paket --}}
            <aside class="lg:col-span-4">
                <div class="lg:sticky lg:top-28">
                    <div class="border border-foreground">
                        <div class="border-b border-foreground p-5" style="background-color: var(--accent-soft);">
                            <p class="font-mono text-xs uppercase tracking-widest" style="color: var(--accent);">Paket dipilih</p>
                            <p id="summary-package" class="mt-2 font-serif text-2xl font-black italic leading-tight">
                                {{ $selected['name'] ?? 'Belum dipilih' }}
                            </p>
                            <p class="mt-2 flex items-baseline gap-1">
                                <span class="font-mono text-sm text-neutral-500">Rp</span>
                                <span id="summary-price" class="font-mono text-3xl font-medium tracking-tighter" style="color: var(--accent);">
                                    {{ isset($selected) ? number_format($selected['price'], 0, ',', '.') : '—' }}
                                </span>
                                <span class="font-mono text-xs uppercase tracking-widest text-neutral-500">/bln</span>
                            </p>
                            <p id="summary-tagline" class="mt-2 font-body text-sm text-neutral-600">
                                {{ $selected['tagline'] ?? 'Pilih paket pada formulir.' }}
                            </p>
                        </div>

                        <ul class="divide-y divide-muted">
                            <li class="flex items-start justify-between gap-3 p-4">
                                <span class="font-body text-sm text-neutral-600">Pemasangan &amp; sewa modem</span>
                                <span class="shrink-0 font-mono text-sm font-semibold">Rp {{ $installFee }}</span>
                            </li>
                            <li class="flex items-center gap-2 p-4">
                                <svg class="h-4 w-4 shrink-0" style="color: var(--accent)" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="m5 13 4 4L19 7"/></svg>
                                <span class="font-body text-sm text-neutral-600">{{ ucfirst($installNote) }}</span>
                            </li>
                        </ul>

                        <p class="border-t border-muted bg-neutral-100 p-4 font-mono text-[11px] uppercase tracking-widest text-neutral-500">
                            {{ $taxNote }}
                        </p>
                    </div>

                    <p class="mt-4 flex items-start gap-2 font-body text-xs leading-relaxed text-neutral-500">
                        <svg class="mt-0.5 h-4 w-4 shrink-0 text-brand" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path stroke-linecap="round" d="M12 16v-5m0-3h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                        Data Anda hanya digunakan untuk proses pemasangan dan tidak dibagikan ke pihak lain.
                    </p>
                </div>
            </aside>

            {{-- Formulir --}}
            <div class="lg:col-span-8">
                <form
                    id="register-form"
                    class="border border-foreground p-6 sm:p-8"
                    data-wa="{{ $wa }}"
                    data-install="{{ $installFee }}"
                    novalidate
                >
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        {{-- Nama --}}
                        <div class="sm:col-span-2">
                            <label for="nama" class="mb-2 block font-mono text-xs uppercase tracking-widest text-neutral-500">
                                1. Nama sesuai KTP <span style="color: var(--accent)">*</span>
                            </label>
                            <input
                                type="text" id="nama" name="nama" required autocomplete="name"
                                placeholder="Nama lengkap sesuai KTP"
                                class="w-full border-0 border-b-2 border-foreground bg-transparent px-3 py-2 font-sans text-sm text-foreground placeholder:text-neutral-400 focus-visible:bg-neutral-100 focus-visible:outline-none min-h-[46px]"
                            >
                            <p class="field-error mt-1 hidden font-mono text-xs text-accent">Nama wajib diisi.</p>
                        </div>

                        {{-- No HP --}}
                        <div class="sm:col-span-2">
                            <label for="hp" class="mb-2 block font-mono text-xs uppercase tracking-widest text-neutral-500">
                                2. No. HP (WhatsApp aktif) <span style="color: var(--accent)">*</span>
                            </label>
                            <input
                                type="tel" id="hp" name="hp" required autocomplete="tel" inputmode="numeric"
                                placeholder="08xxxxxxxxxx"
                                class="w-full border-0 border-b-2 border-foreground bg-transparent px-3 py-2 font-mono text-sm text-foreground placeholder:text-neutral-400 focus-visible:bg-neutral-100 focus-visible:outline-none min-h-[46px]"
                            >
                            <p class="field-error mt-1 hidden font-mono text-xs text-accent">Nomor HP wajib diisi dengan benar.</p>
                        </div>

                        {{-- Alamat --}}
                        <div class="sm:col-span-2">
                            <label for="alamat" class="mb-2 block font-mono text-xs uppercase tracking-widest text-neutral-500">
                                3. Alamat pendaftar <span style="color: var(--accent)">*</span>
                            </label>
                            <textarea
                                id="alamat" name="alamat" required rows="3"
                                placeholder="Alamat lengkap: jalan, RT/RW, kelurahan, kecamatan, kota"
                                class="w-full border-2 border-foreground bg-transparent px-3 py-2 font-sans text-sm text-foreground placeholder:text-neutral-400 focus-visible:bg-neutral-100 focus-visible:outline-none"
                            ></textarea>
                            <p class="field-error mt-1 hidden font-mono text-xs text-accent">Alamat wajib diisi.</p>
                        </div>

                        {{-- Paket --}}
                        <div class="sm:col-span-2">
                            <label for="paket" class="mb-2 block font-mono text-xs uppercase tracking-widest text-neutral-500">
                                4. Paket yang dipilih <span style="color: var(--accent)">*</span>
                            </label>
                            <div class="relative">
                                <select
                                    id="paket" name="paket" required
                                    class="w-full appearance-none border-0 border-b-2 border-foreground bg-transparent px-3 py-2 pr-10 font-sans text-sm text-foreground focus-visible:bg-neutral-100 focus-visible:outline-none min-h-[46px]"
                                >
                                    <option value="" disabled {{ $selected ? '' : 'selected' }}>— Pilih paket —</option>
                                    @foreach ($packages as $package)
                                        <option
                                            value="{{ $package['slug'] }}"
                                            data-name="{{ $package['name'] }}"
                                            data-price="{{ number_format($package['price'], 0, ',', '.') }}"
                                            data-tagline="{{ $package['tagline'] }}"
                                            data-accent="{{ $package['accent'] }}"
                                            data-accent-soft="{{ $package['accent_soft'] }}"
                                            {{ ($selected['slug'] ?? null) === $package['slug'] ? 'selected' : '' }}
                                        >
                                            {{ $package['name'] }} — Rp {{ number_format($package['price'], 0, ',', '.') }}/bln
                                        </option>
                                    @endforeach
                                </select>
                                <svg class="pointer-events-none absolute right-3 top-1/2 h-4 w-4 -translate-y-1/2 text-neutral-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6"/></svg>
                            </div>
                            <p class="field-error mt-1 hidden font-mono text-xs text-accent">Silakan pilih paket.</p>
                        </div>

                        {{-- Foto KTP --}}
                        <div class="sm:col-span-2">
                            <label for="ktp" class="mb-2 block font-mono text-xs uppercase tracking-widest text-neutral-500">
                                5. Foto KTP <span style="color: var(--accent)">*</span>
                            </label>

                            <label
                                id="ktp-drop"
                                for="ktp"
                                class="group flex cursor-pointer flex-col items-center justify-center gap-3 border-2 border-dashed border-foreground bg-neutral-100 px-4 py-8 text-center transition-colors duration-200 hover:bg-white"
                            >
                                <span class="flex h-12 w-12 items-center justify-center border border-foreground text-foreground transition-colors group-hover:bg-foreground group-hover:text-white">
                                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5V18a3 3 0 0 0 3 3h12a3 3 0 0 0 3-3v-1.5M12 3v13.5M12 3 7.5 7.5M12 3l4.5 4.5"/></svg>
                                </span>
                                <span class="font-sans text-sm font-semibold text-foreground">Ketuk untuk unggah foto KTP</span>
                                <span class="font-mono text-xs text-neutral-500">JPG / PNG · maks. 5 MB</span>
                            </label>
                            <input type="file" id="ktp" name="ktp" accept="image/*" required class="sr-only">

                            {{-- Preview --}}
                            <div id="ktp-preview" class="mt-4 hidden">
                                <div class="flex items-start gap-4 border border-foreground p-3">
                                    <img id="ktp-image" src="" alt="Pratinjau foto KTP" class="h-24 w-36 border border-muted object-cover">
                                    <div class="min-w-0 flex-1">
                                        <p id="ktp-name" class="truncate font-sans text-sm font-semibold text-foreground"></p>
                                        <p id="ktp-size" class="mt-1 font-mono text-xs text-neutral-500"></p>
                                        <button type="button" id="ktp-remove" class="mt-2 inline-flex items-center gap-1 font-mono text-xs uppercase tracking-widest text-accent hover:underline">
                                            Hapus foto
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <p class="field-error mt-1 hidden font-mono text-xs text-accent">Foto KTP wajib diunggah.</p>
                        </div>
                    </div>

                    {{-- Info pengiriman --}}
                    <div class="mt-6 flex items-start gap-3 border border-muted bg-neutral-100 p-4">
                        <svg class="mt-0.5 h-5 w-5 shrink-0 text-[#25D366]" viewBox="0 0 24 24" fill="currentColor"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2 22l5.25-1.38a9.9 9.9 0 0 0 4.79 1.22h.01c5.46 0 9.91-4.45 9.91-9.91C21.96 6.45 17.5 2 12.04 2Z"/></svg>
                        <p class="font-body text-xs leading-relaxed text-neutral-600">
                            Menekan <span class="font-semibold text-foreground">Kirim</span> akan membuka chat WhatsApp admin
                            <span class="font-semibold text-foreground">{{ $waDisplay }}</span> dengan data pendaftaran sudah terisi otomatis.
                            Foto KTP tidak bisa ikut lewat tautan, jadi silakan lampirkan pada chat tersebut.
                        </p>
                    </div>

                    {{-- Submit --}}
                    <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:items-center">
                        <button
                            type="submit"
                            id="register-submit"
                            class="inline-flex min-h-[50px] w-full items-center justify-center gap-2 bg-[#25D366] px-6 py-3 font-sans text-sm font-bold uppercase tracking-widest text-white shadow-[4px_4px_0_0_#0B1F3A] transition-all duration-200 hover:-translate-y-0.5 hover:shadow-[6px_6px_0_0_#0B1F3A] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground focus-visible:ring-offset-2 sm:w-auto"
                        >
                            <x-ui.wa-icon class="h-5 w-5" />
                            Kirim ke WhatsApp
                        </button>
                        <a href="{{ route('home') }}#paket" class="inline-flex min-h-[50px] items-center justify-center px-4 font-sans text-xs font-semibold uppercase tracking-widest text-neutral-600 hover:text-brand">
                            ← Kembali ke daftar paket
                        </a>
                    </div>

                    {{-- Panel setelah kirim --}}
                    <div id="submit-hint" class="mt-4 hidden border-l-4 border-[#25D366] bg-neutral-100 p-4">
                        <p class="font-body text-sm font-semibold text-foreground">Chat WhatsApp admin sedang dibuka.</p>
                        <p class="mt-1 font-body text-xs leading-relaxed text-neutral-600">
                            Kirim pesan yang sudah terisi, lalu <span class="font-semibold text-foreground">lampirkan foto KTP</span> pada chat tersebut.
                            Jika WhatsApp tidak terbuka,
                            <a id="wa-manual-link" href="#" target="_blank" rel="noopener" class="font-semibold text-brand underline">klik di sini</a>.
                        </p>
                        <button
                            type="button"
                            id="share-ktp-btn"
                            class="mt-3 hidden inline-flex min-h-[44px] items-center gap-2 border border-[#25D366] bg-white px-4 py-2 font-sans text-xs font-bold uppercase tracking-widest text-[#128C4A] transition-colors hover:bg-[#25D366] hover:text-white"
                        >
                            <x-ui.wa-icon class="h-4 w-4" />
                            Lampirkan Foto KTP
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <x-layout.whatsapp-fab />
    <x-layout.footer />
</x-layouts.app>

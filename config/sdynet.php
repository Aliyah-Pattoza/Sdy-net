<?php

/*
|--------------------------------------------------------------------------
| SDY NET — Konten & Kontak
|--------------------------------------------------------------------------
| Sumber tunggal untuk data bisnis: nomor WhatsApp, biaya pemasangan,
| catatan pajak, dan daftar paket. Ubah di sini agar seluruh halaman ikut.
*/

return [
    // Nomor WhatsApp format internasional tanpa tanda "+", spasi, atau "-".
    // Contoh: 0821 9237 9898 -> 6282192379898
    // Ganti lewat .env (SDY_WHATSAPP & SDY_WHATSAPP_DISPLAY) tanpa ubah kode.
    // PENTING: nomor harus SUDAH terdaftar/aktif di WhatsApp.
    'whatsapp' => preg_replace('/\D/', '', (string) env('SDY_WHATSAPP', '6282192379898')),
    'whatsapp_display' => env('SDY_WHATSAPP_DISPLAY', '0821 9237 9898'),

    // Biaya pemasangan + sewa modem
    'install_fee' => 250000,
    'install_note' => 'Bayar setelah instalasi selesai',

    // Catatan pajak
    'tax_note' => 'Harga di atas belum termasuk PPN 3%',

    'packages' => [
        [
            'slug' => 'basic-speed',
            'name' => 'Paket Basic Speed',
            'price' => 150000,
            'tagline' => 'Untuk Browsing & Sosial Media',
            'icon' => 'bolt',
            'accent' => '#0056D6',
            'accent_soft' => '#E6EEFB',
            'popular' => false,
        ],
        [
            'slug' => 'fast-net',
            'name' => 'Paket Fast Net',
            'price' => 200000,
            'tagline' => 'Internet Stabil untuk Streaming & Kerja',
            'icon' => 'rocket',
            'accent' => '#E4572E',
            'accent_soft' => '#FBE9E2',
            'popular' => true,
        ],
        [
            'slug' => 'turbo-net',
            'name' => 'Paket Turbo Net',
            'price' => 250000,
            'tagline' => 'Streaming & Perangkat Banyak',
            'icon' => 'flame',
            'accent' => '#F2A20C',
            'accent_soft' => '#FDF1DA',
            'popular' => false,
        ],
        [
            'slug' => 'ultra-max',
            'name' => 'Paket Ultra Max',
            'price' => 300000,
            'tagline' => 'Gaming & Streaming HD',
            'icon' => 'diamond',
            'accent' => '#7C3AED',
            'accent_soft' => '#EFE7FB',
            'popular' => false,
        ],
    ],
];

# SDY

Laravel + Vite + Tailwind v4 dengan brand **SDY NET** (Newsprint layout + warna logo).

## Syarat

- PHP 8.2+
- Composer
- Node.js 20+ (npm)

## Jalankan di lokal

Setelah `git clone` atau `git pull`:

```bash
# 1) Install dependency + buat .env + APP_KEY + SQLite + migrate + build asset
composer run setup

# 2) Jalankan server + Vite (cukup untuk lihat front page)
composer run start
```

Buka: [http://127.0.0.1:8000](http://127.0.0.1:8000)

> `composer run start` otomatis membuat `.env` dan `APP_KEY` jika belum ada.

### Perintah lain

| Perintah | Kegunaan |
|----------|----------|
| `composer run start` | `php artisan serve` + Vite (paling simpel) |
| `composer run dev` | Full stack: server + queue + logs + Vite |
| `npm run build` | Build asset production |
| `php artisan serve` | Server saja (butuh `npm run build` dulu) |

### Kalau sudah pernah setup

```bash
git pull
composer install
npm install
composer run start
```

## Troubleshooting

**Port 8000 sudah dipakai**

```bash
php artisan serve --port=8001
```

Lalu sesuaikan `APP_URL` di `.env`.

**CSS/JS tidak muncul**

Pastikan Vite ikut jalan (`composer run start`), atau build dulu:

```bash
npm run build
php artisan serve
```

**Error database / migrate**

Project default pakai SQLite. Pastikan file ada:

```bash
touch database/database.sqlite
php artisan migrate
```

**Error: No application encryption key has been specified**

```bash
php scripts/ensure-env.php
# atau:
php artisan key:generate
```

Lalu jalankan ulang `composer run start`.

# AGENTS.md

## Cursor Cloud specific instructions

This is a stock **Laravel 12** web application (PHP `^8.2`, Composer) with a **Vite 7 + Tailwind 4** frontend (Node/npm). It uses **SQLite** by default; sessions/cache/queue all use the `database` driver, so no external services (MySQL, Redis, Memcached, SMTP) are required.

### Environment already provisioned (persisted in the VM snapshot)
- `php` 8.3 CLI + Composer are installed system-wide; Node 22 + npm are preinstalled.
- `.env` exists with a generated `APP_KEY`, and `database/database.sqlite` exists with migrations applied.
- The startup update script only refreshes dependencies (`composer install`, `npm install`). It intentionally does **not** run migrations or builds.

### Running the app (development)
- `composer dev` — the canonical dev command. Runs 4 processes concurrently via `concurrently`: `php artisan serve` (HTTP on `http://127.0.0.1:8000`), `php artisan queue:listen`, `php artisan pail` (live logs), and `npm run dev` (Vite HMR on port `5173`). It uses `--kill-others`, so if any one process exits, all stop.
- The Vite dev server (5173) provides HMR; you do not need `npm run build` in dev unless testing production assets.

### Lint / test / build
- Lint: `./vendor/bin/pint` (add `--test` to check without modifying).
- Test: `composer test` (clears config cache then runs `php artisan test` / PHPUnit). Tests use SQLite.
- Build (production assets): `npm run build`.

### Gotchas
- If `database/database.sqlite` is ever missing, recreate with `touch database/database.sqlite && php artisan migrate`. The full one-off bootstrap is codified in the `setup` script in `composer.json`.
- `.env` is gitignored; if absent, run `cp .env.example .env && php artisan key:generate`.

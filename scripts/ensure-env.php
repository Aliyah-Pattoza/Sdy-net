<?php

/**
 * Pastikan .env siap dipakai lokal:
 * - copy dari .env.example jika belum ada
 * - generate APP_KEY jika kosong
 * - buat database/database.sqlite jika pakai sqlite
 */

$root = dirname(__DIR__);
$envPath = $root.DIRECTORY_SEPARATOR.'.env';
$examplePath = $root.DIRECTORY_SEPARATOR.'.env.example';

if (! file_exists($envPath)) {
    if (! file_exists($examplePath)) {
        fwrite(STDERR, "Missing .env.example — cannot bootstrap environment.\n");
        exit(1);
    }

    copy($examplePath, $envPath);
    echo "Created .env from .env.example\n";
}

$env = file_get_contents($envPath);
if ($env === false) {
    fwrite(STDERR, "Unable to read .env\n");
    exit(1);
}

$hasKey = (bool) preg_match('/^APP_KEY=base64:.+/m', $env);

if (! $hasKey) {
    $key = 'base64:'.base64_encode(random_bytes(32));

    if (preg_match('/^APP_KEY=.*$/m', $env)) {
        $env = preg_replace('/^APP_KEY=.*$/m', 'APP_KEY='.$key, $env, 1);
    } else {
        $env = 'APP_KEY='.$key.PHP_EOL.$env;
    }

    file_put_contents($envPath, $env);
    echo "Generated APP_KEY\n";
}

if (preg_match('/^DB_CONNECTION=sqlite\s*$/m', $env)) {
    $sqlite = $root.DIRECTORY_SEPARATOR.'database'.DIRECTORY_SEPARATOR.'database.sqlite';
    if (! file_exists($sqlite)) {
        touch($sqlite);
        echo "Created database/database.sqlite\n";
    }
}

echo "Environment ready.\n";

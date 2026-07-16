<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/daftar', function (\Illuminate\Http\Request $request) {
    $packages = config('sdynet.packages');
    $selected = collect($packages)->firstWhere('slug', $request->query('paket'));

    return view('register', [
        'packages' => $packages,
        'selected' => $selected,
    ]);
})->name('register');

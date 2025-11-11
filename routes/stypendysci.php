<?php

use App\Models\Oboz;
use Illuminate\Support\Facades\Route;


// ======================================================
// ✅ Funkcja zwracająca obozy wg roku
// ======================================================
function getObozy()
{
    return [
        'obozUczniowie' => Oboz::where('uczestnicy', 'Uczniowie')
            ->where('rok_obozu', 2025)
            ->orderByDesc('start_date')
            ->first(),

        'obozMaturzysci' => Oboz::where('uczestnicy', 'Maturzyści')
            ->where('rok_obozu', 2025)
            ->orderByDesc('start_date')
            ->first(),

        'obozStudenci' => Oboz::where('uczestnicy', 'Studenci')
            ->where('rok_obozu', 2025)
            ->orderByDesc('start_date')
            ->first(),
    ];
}


Route::prefix('stypendysci')->name('stypendysci.')->group(function () {

    Route::get('/', function () {
        return view('stypendysci.index', getObozy());
    })->name('index');

    Route::get('/uczniowie', function () {
        return view('stypendysci.uczniowie.index', getObozy());
    })->name('uczniowie');

    Route::get('/studenci', function () {
        return view('stypendysci.studenci.index', getObozy());
    })->name('studenci');
});


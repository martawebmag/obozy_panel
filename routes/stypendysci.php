<?php

use App\Models\Oboz;
use Illuminate\Support\Facades\Route;


// ✅ Funkcja zwracająca obozy wg roku
require_once app_path('Helpers/ObozyHelper.php');


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




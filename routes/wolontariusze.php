<?php

use Illuminate\Support\Facades\Route;



Route::prefix('wolontariusze')->name('wolontariusze.')->group(function () {

    Route::get('/', function () {
        return view('wolontariusze.index', [
            'obozUczniowie' => getObozy()['obozUczniowie'],
        ]);
    })->name('index');

    Route::get('/uczniowie', function () {
        return view('wolontariusze.wolontariusze_uczniowie', [
            'obozUczniowie' => getObozy()['obozUczniowie'],
        ]);
    })->name('uczniowie');
});


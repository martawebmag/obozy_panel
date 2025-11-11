<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'role:koordynator'])
    ->prefix('koordynatorzy')->name('koordynatorzy.')
    ->group(function () {

        Route::view('/dashboard', 'koordynatorzy.dashboard')->name('dashboard');
        Route::view('/znajdz', 'koordynatorzy.search')->name('search');
    });

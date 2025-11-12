<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Biuro\ObozController;
use App\Http\Controllers\Biuro\StypendystaController;
use App\Http\Controllers\Biuro\KoordynatorController;
use App\Http\Controllers\Biuro\WolontariuszController;

Route::middleware(['auth', 'role:biuro'])->prefix('biuro')->name('biuro.')->group(function () {

    Route::view('/', 'biuro.index')->name('index');

    // Stypendyści
    Route::view('/stypendysci', 'biuro.stypendysci.index')
        ->name('stypendysci.index');

    Route::resource('stypendysci', StypendystaController::class);

    // Wolontariusze
    Route::resource('wolontariusze', WolontariuszController::class)
        ->names('wolontariusze');


    // Obozy
    Route::resource('obozy', ObozController::class)->except(['show'])
        ->names([
            'index'   => 'obozy.index',
            'create'  => 'obozy.create',
            'store'   => 'obozy.store',
            'edit'    => 'obozy.edit',
            'update'  => 'obozy.update',
            'destroy' => 'obozy.destroy',
        ])
        ->parameters([
            'obozy' => 'oboz'
        ]);


    // Koordynatorzy
    Route::resource('koordynatorzy', KoordynatorController::class);
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObozController;
use App\Http\Controllers\KoordynatorController;
use App\Http\Controllers\WolontariuszController;


Route::middleware(['auth', 'role:biuro'])->prefix('biuro')->name('biuro.')->group(function () {

    Route::view('/', 'biuro.index')->name('index');

    Route::view('/stypendysci', 'biuro.stypendysci.index')
        ->name('stypendysci.index');


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

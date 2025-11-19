<?php

use App\Models\Stypendysta;
use Maatwebsite\Excel\Facades\Excel;

use App\Exports\Biuro\StudenciExport;
use App\Exports\Biuro\UczniowieExport;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Biuro\ObozController;
use App\Http\Controllers\Biuro\UczenController;
use App\Http\Controllers\Biuro\StudentController;
use App\Http\Controllers\Biuro\MaturzystaController;
use App\Http\Controllers\Biuro\KoordynatorController;
use App\Http\Controllers\Biuro\StypendystaController;
use App\Http\Controllers\Biuro\WolontariuszController;

require_once app_path('Helpers/ObozyHelper.php');


Route::middleware(['auth', 'role:biuro'])
    ->prefix('biuro')
    ->name('biuro.')
    ->group(function () {

        // Dashboard
        Route::view('/', 'biuro.index')->name('index');

        // Stypendyści
        Route::view('/stypendysci', 'biuro.stypendysci.index')->name('stypendysci.index');
        Route::resource('stypendysci', StypendystaController::class);
        Route::view('/znajdz', 'biuro.stypendysci.search')->name('search');

        // Uczniowie
        Route::resource('uczniowie', UczenController::class);
        Route::get('/uczniowie.export', function () {
            return Excel::download(new UczniowieExport, 'uczniowie.xlsx');
        })->name('uczniowie.export');

        // Maturzyści
        Route::resource('maturzysci', MaturzystaController::class);

        // Studenci
        Route::resource('studenci', StudentController::class);
        Route::get('/studenci.export', function () {
            return Excel::download(new StudenciExport, 'studenci.xlsx');
        })->name('studenci.export');


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

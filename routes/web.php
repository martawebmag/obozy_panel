<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;


// === Strona główna ===
Route::view('/', 'welcome')->name('welcome');
Route::view('/panel', 'panel')->name('panel');


// === Profil użytkownika ===
Route::middleware('auth')->group(function () {

    Route::get('/profile',  [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/stypendysci.php';
require __DIR__.'/wolontariusze.php';
require __DIR__.'/biuro.php';
require __DIR__.'/admin.php';
require __DIR__.'/koordynatorzy.php';



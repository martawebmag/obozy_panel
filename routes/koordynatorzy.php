<?php

use App\Models\Oboz;
use App\Exports\UczniowieExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;

// ✅ Funkcja zwracająca obozy wg roku
require_once app_path('Helpers/ObozyHelper.php');


Route::middleware(['auth', 'role:koordynator'])
    ->prefix('koordynatorzy')->name('koordynatorzy.')
    ->group(function () {

        Route::get('/dashboard', function () {
            $user = Auth::user();
            $obozy = getObozy(); 
            return view('koordynatorzy.dashboard', $obozy + ['user' => $user]);
        })->name('dashboard');

        Route::get('/raport-uczniowie', function () {
            $diecezja = Auth::user()->diocese;
            return Excel::download(new UczniowieExport($diecezja), 'uczniowie.xlsx');
        })->name('uczniowie.raport');

        Route::get('/raport-studenci', function () {
            $diecezja = Auth::user()->diocese;
            return Excel::download(new \App\Exports\StudenciExport($diecezja), 'studenci.xlsx');
        })->name('studenci.raport');

    });

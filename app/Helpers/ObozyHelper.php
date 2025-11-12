<?php

use App\Models\Oboz;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

if (!function_exists('getObozy')) {
    function getObozy() {

        $user = Auth::user(); // może być null
        $diecezja = $user ? $user->diocese : 'krakowska'; // domyślna diecezja, np. krakowska

        $obozUczniowie = Oboz::where('uczestnicy', 'Uczniowie')
            ->where('rok_obozu', 2025)
            ->orderByDesc('start_date')
            ->first();

        $obozStudenci = Oboz::where('uczestnicy', 'Studenci')
            ->where('rok_obozu', 2025)
            ->orderByDesc('start_date')
            ->first();

        $obozMaturzysci = Oboz::where('uczestnicy', 'Maturzyści')
            ->where('rok_obozu', 2025)
            ->orderByDesc('start_date')
            ->first();

        // Liczba uczniów
        $liczbaUczniow = DB::table('stypendysci')
            ->where('diecezja', $diecezja)
            ->where('typ_uczestnika', 'Uczen')
            ->count();

        // Liczba studentów
        $liczbaStudentow = DB::table('stypendysci')
            ->where('diecezja', $diecezja)
            ->where('typ_uczestnika', 'Student')
            ->count();

        // Liczba maturzystów
        $liczbaMaturzystow = DB::table('stypendysci')
            ->where('diecezja', $diecezja)
            ->where('typ_uczestnika', 'Maturzysta')
            ->count();

        return [
            'obozUczniowie' => $obozUczniowie,
            'obozStudenci' => $obozStudenci,
            'obozMaturzysci' => $obozMaturzysci,
            'liczbaUczniow' => $liczbaUczniow,
            'liczbaStudentow' => $liczbaStudentow,
            'liczbaMaturzystow' => $liczbaMaturzystow,
        ];
    }
}


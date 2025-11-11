<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wolontariusz extends Model
{
     use HasFactory;

    protected $table = 'wolontariusze';

    protected $fillable = [
        'tytul_zwrot',
        'imie',
        'imie_zakonne',
        'nazwisko',
        'nazwisko_rodowe',
        'imie_matki',
        'imie_ojca',
        'nazwisko_rodowe_matki',
        'pesel',
        'data_urodzenia',
        'email',
        'telefon',
        'plec',
        'ulica',
        'numer_domu',
        'numer_mieszkania',
        'kod_pocztowy',
        'poczta',
        'miejscowosc',
        'ulica_koresp',
        'numer_domu_koresp',
        'numer_mieszkania_koresp',
        'kod_pocztowy_koresp',
        'poczta_koresp',
        'miejscowosc_koresp',
    ];







        public function zgloszenia()
    {
        return $this->hasMany(WolontariuszZgloszenia::class, 'wolontariusz_id');
    }

}

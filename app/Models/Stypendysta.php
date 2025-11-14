<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Stypendysta extends Model
{
    use HasFactory;

    protected $table = 'stypendysci';

    protected $fillable = [
        'typ_uczestnika',
        'imie',
        'nazwisko',
        'pesel',
        'data_urodzenia',
        'email_dzielo',
        'email_prywatny',
        'telefon',
        'plec',
        'ulica',
        'nr_domu',
        'nr_mieszkania',
        'kod_pocztowy',
        'poczta',
        'miejscowosc',
        'wojewodztwo',
        'diecezja',
        'wspolnota',

        'imie_matki',
        'nazwisko_matki',
        'nazwisko_rodowe_matki',
        'telefon_matki',
        'pesel_matki',
        'email_matki',
        'matka_zmarla',
        'imie_ojca',
        'nazwisko_ojca',
        'telefon_ojca',
        'pesel_ojca',
        'email_ojca',
        'ojciec_zmarl',
        'imie_opiekuna_prawnego',
        'nazwisko_opiekuna_prawnego',
        'telefon_opiekuna_prawnego',
        'pesel_opiekuna_prawnego',
        'email_opiekuna_prawnego',
        'prawa_rodzicielskie',
        'prawa_informacje',

        'imie_opiekuna',
        'nazwisko_opiekuna',
        'telefon_opiekuna',
    ];

    public function zgloszenia()
    {
        return $this->hasMany(Zgloszenia::class); // jeden stypendysta może mieć wiele obozów
    }
}

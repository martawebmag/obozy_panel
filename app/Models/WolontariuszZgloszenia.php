<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WolontariuszZgloszenia extends Model
{
        use HasFactory;

        protected $table = 'wolontariusze_zgloszenia';

        protected $fillable = [
        'wolontariusz_id',
        'oboz_id',
        'rodzaj_wolontariatu',
        'preferencje',
        'koszulka_rozmiar',
        'stypendysta_status',
        'status_wolontariusza',
        'wspolnota',
        'nazwa_uczelni',
        'kierunek',
        'miejsce_zatrudnienia',
        'zawod_posluga',
        'doswiadczenie',
        'doswiadczenie_opis',
        'chor',
        'instrument',
        'uwagi_zdrowie',
        'dieta',
        'jaka_dieta',
        'dieta_info',
        'dodatkowe_info',
        'dokumenty_zalaczone',
        'dokumenty_wyslane_mailem',
        'dokumenty_beda_doslane',
        'elektronika',
        'rodo',
        'wizerunek',
        'ochrona_maloletnich',
        'imie_przelozonego',
        'nazwisko_przelozonego',
        'diecezja_przelozonego',
        'email_przelozonego',
        'ulica_przelozonego',
        'numer_domu_przelozonego',
        'numer_mieszkania_przelozonego',
        'kod_pocztowy_przelozonego',
        'poczta_przelozonego',
        'miejscowosc_przelozonego',

    ];

        public function wolontariusz()
        {
            return $this->belongsTo(Wolontariusz::class, 'wolontariusz_id');
        }

        public function oboz()
        {
            return $this->belongsTo(Oboz::class, 'oboz_id');
        }
}

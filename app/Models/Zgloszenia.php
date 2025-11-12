<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Zgloszenia extends Model
{
    use HasFactory;

    protected $table = 'zgloszenia';

    protected $fillable = [
        'stypendysta_id',
        'oboz_id',
        'rok_obozu',
        'zdrowie',
        'dieta',
        'jaka_dieta',
        'dieta_info',
        'szkola',
        'klasa',
        'obrona',
        'sesja',
        'koniecSesji',
        'tshirt',
        'chor',
        'instrument',
        'posluga',
        'medycyna',
        'uwagi',
        'tezec',
        'blonica',
        'inne_szczepienia',
        'data_przyjazdu',
        'data_wyjazdu',
        'regulamin',
        'szpital',
        'elektronika',
        'informacje',
        'rodo',
        'wizerunek',
        'ochrona_maloletnich',
        ];

        public function stypendysta()
        {
            return $this->belongsTo(Stypendysta::class, 'stypendysta_id');
        }

        public function oboz()
        {
            return $this->belongsTo(Oboz::class, 'oboz_id');
        }
}

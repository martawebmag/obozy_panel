<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Oboz extends Model
{
    use HasFactory;

    protected $table = 'obozy';

    protected $fillable = [
        'start_date',
        'end_date',
        'rok_obozu',
        'miejsce',
        'uczestnicy',
    ];

        public function zgloszenia()
        {
            return $this->hasMany(Zgloszenia::class, 'oboz_id');
        }

        public function zgloszeniaUczniowie()
        {
            return $this->hasMany(Zgloszenia::class, 'oboz_id')
                ->whereHas('stypendysta', function($q) {
                    $q->where('typ_uczestnika', 'Uczen');
                });
        }

        public function zgloszeniaStudenci()
        {
            return $this->hasMany(Zgloszenia::class, 'oboz_id')
                ->whereHas('stypendysta', function($q) {
                    $q->where('typ_uczestnika', 'Student');
                });
        }


        public function wolontariuszeZgloszenia()
        {
            return $this->hasMany(WolontariuszZgloszenia::class, 'oboz_id');
        }
}

<?php

namespace App\Exports;

use App\Models\Stypendysta;
use App\Models\Zgloszenia;
use App\Models\Obozy;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Support\Facades\DB;

class UczniowieExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    protected $diecezja;

    public function __construct($diecezja)
    {
        $this->diecezja = $diecezja;
    }

    public function collection()
    {
        // Pobranie stypendystów z ich zgłoszeniami i obozami, tylko uczniów
        $dane = DB::table('stypendysci')
            ->leftJoin('zgloszenia', 'zgloszenia.stypendysta_id', '=', 'stypendysci.id')
            ->leftJoin('obozy', 'obozy.id', '=', 'zgloszenia.oboz_id')
            ->where('stypendysci.diecezja', $this->diecezja)
            ->where('stypendysci.typ_uczestnika', 'Uczen') // <-- tylko uczniowie
            ->select(
                'stypendysci.imie',
                'stypendysci.nazwisko',
                'stypendysci.pesel',
                'stypendysci.email_dzielo',
                'stypendysci.telefon',
                'stypendysci.diecezja',
                'stypendysci.miejscowosc',
                'zgloszenia.zdrowie',
                'zgloszenia.instrument',
                'obozy.uczestnicy',
                'obozy.miejsce',
            )
            ->get();

        // Dodanie kolumny "Lp." i zamiana na tablicę do eksportu
        $numerowane = $dane->values()->map(function ($item, $index) {
            return [
                'Lp' => $index + 1,
                'Imię' => $item->imie,
                'Nazwisko' => $item->nazwisko,
                'PESEL' => $item->pesel,
                'Email' => $item->email_dzielo,
                'Numer telefonu' => $item->telefon,
                'Diecezja' => $item->diecezja,
                'Miejscowość' => $item->miejscowosc,
                'Zdrowie' => $item->zdrowie,
                'Instrument' => $item->instrument,
                'Uczestnicy obozu' => $item->uczestnicy,
                'Miejsce obozu' => $item->miejsce,
            ];
        });

        return collect($numerowane);
    }

    public function headings(): array
    {
        return [
            'L.p.',
            'Imię',
            'Nazwisko',
            'PESEL',
            'Email',
            'Numer telefonu',
            'Diecezja',
            'Miejscowość',
            'Zdrowie',
            'Instrument',
            'Uczestnicy obozu',
            'Miejsce obozu',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // styl nagłówka (pierwszy wiersz)
            1 => [
                'font' => [
                    'bold' => true,
                    'color' => ['rgb' => '000000']
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => 'A8DADC'] // Jaśniejszy granatowy
                ]
            ],
        ];
    }
}

<?php

namespace App\Livewire\Biuro;

use Livewire\Component;
use App\Models\Zgloszenia;
use App\Models\Stypendysta;

class EditStudent extends Component
{
    public Stypendysta $student;

    public $imie, $nazwisko, $pesel, $data_urodzenia, $email_dzielo, $email_prywatny, $telefon, $plec, $wspolnota;
    public $ulica, $nr_domu, $nr_mieszkania, $kod_pocztowy, $poczta, $miejscowosc, $diecezja;
    public $imie_opiekuna, $nazwisko_opiekuna, $telefon_opiekuna;
    public $zdrowie, $dieta, $jaka_dieta, $dieta_info;
    public $obrona, $sesja, $koniecSesji, $tshirt, $chor, $instrument, $posluga, $medycyna, $uwagi;
    public $regulamin, $rodo, $wizerunek, $ochrona_maloletnich;

    public function mount(Stypendysta $student)
    {
        $this->student = $student;
        $zgloszenie = $student->zgloszenia()->first();

        $this->imie = $student->imie;
        $this->nazwisko = $student->nazwisko;
        $this->pesel = $student->pesel;
        $this->data_urodzenia = $student->data_urodzenia;
        $this->email_dzielo = $student->email_dzielo;
        $this->email_prywatny = $student->email_prywatny;
        $this->telefon = $student->telefon;
        $this->plec = $student->plec;
        $this->wspolnota = $student->wspolnota;

        // adres
        $this->ulica = $student->ulica;
        $this->nr_domu = $student->nr_domu;
        $this->nr_mieszkania = $student->nr_mieszkania;
        $this->kod_pocztowy = $student->kod_pocztowy;
        $this->poczta = $student->poczta;
        $this->miejscowosc = $student->miejscowosc;
        $this->diecezja = $student->diecezja;

        // rodzice/opiekun
        $this->imie_opiekuna = $student->imie_opiekuna;
        $this->nazwisko_opiekuna = $student->nazwisko_opiekuna;
        $this->telefon_opiekuna = $student->telefon_opiekuna;

        // zdrowie / dieta
        $this->zdrowie = $zgloszenie->zdrowie;
        $this->dieta = $zgloszenie->dieta;
        $this->jaka_dieta = $zgloszenie->jaka_dieta;
        $this->dieta_info = $zgloszenie->dieta_info;

        // pozostałe pola
        $this->obrona = $zgloszenie->obrona;
        $this->sesja = $zgloszenie->sesja;
        $this->koniecSesji = $zgloszenie->koniecSesji;
        $this->tshirt = $zgloszenie->tshirt;
        $this->chor = $zgloszenie->chor;
        $this->instrument = $zgloszenie->instrument;
        $this->posluga = $zgloszenie->posluga;
        $this->medycyna = $zgloszenie->medycyna;
        $this->uwagi = $zgloszenie->uwagi;

        // zgody
        $this->regulamin = $zgloszenie->regulamin;
        $this->rodo = $zgloszenie->rodo;
        $this->wizerunek = $zgloszenie->wizerunek;
        $this->ochrona_maloletnich = $zgloszenie->ochrona_maloletnich;
    }

    protected $rules = [
        'imie' => 'required|string|max:255',
        'nazwisko' => 'required|string|max:255',
        'pesel' => 'required|digits:11',
        'data_urodzenia' => 'required|date',
        'email_dzielo' => 'required|email',
        'email_prywatny' => 'required|email',
        'telefon' => 'required|string|max:20',
        'plec' => 'required|string|max:100',
        'wspolnota' => 'required|string|max:100',
        'nr_domu' => 'required|string|max:10',
        'kod_pocztowy' => 'required|string|max:10',
        'poczta' => 'required|string|max:100',
        'miejscowosc' => 'required|string|max:100',
        'diecezja' => 'required|string|max:255',
        'imie_opiekuna' => 'required|string|max:255',
        'nazwisko_opiekuna' => 'required|string|max:255',
        'telefon_opiekuna' => 'required|string|max:15',
        'dieta' => 'required|string',
        'tshirt' => 'required|string|max:10',

    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        $this->student->update([
            'imie' => $this->imie,
            'nazwisko' => $this->nazwisko,
            'pesel' => $this->pesel,
            'data_urodzenia' => $this->data_urodzenia,
            'email_dzielo' => $this->email_dzielo,
            'email_prywatny' => $this->email_prywatny,
            'telefon' => $this->telefon,
            'plec' => $this->plec,
            'wspolnota' => $this->wspolnota,
            'ulica' => $this->ulica,
            'nr_domu' => $this->nr_domu,
            'nr_mieszkania' => $this->nr_mieszkania,
            'kod_pocztowy' => $this->kod_pocztowy,
            'poczta' => $this->poczta,
            'miejscowosc' => $this->miejscowosc,
            'diecezja' => $this->diecezja,
            'imie_opiekuna' => $this->imie_opiekuna,
            'nazwisko_opiekuna' => $this->nazwisko_opiekuna,
            'telefon_opiekuna' => $this->telefon_opiekuna,
        ]);

        $zgloszenieData = [
        'zdrowie' => $this->zdrowie,
        'dieta' => $this->dieta,
        'jaka_dieta' => $this->jaka_dieta,
        'dieta_info' => $this->dieta_info,
        'obrona' => $this->obrona,
        'sesja' => $this->sesja,
        'koniecSesji' => $this->koniecSesji,
        'tshirt' => $this->tshirt,
        'chor' => $this->chor,
        'instrument' => $this->instrument,
        'posluga' => $this->posluga,
        'medycyna' => $this->medycyna,
        'uwagi' => $this->uwagi,
    ];

    // pobierz zgłoszenie z relacji
    $zgloszenie = $this->student->zgloszenia()->first();


    $zgloszenie->update($zgloszenieData);


        session()->flash('success', 'Dane studenta zostały zapisane!');
    }

    public function render()
    {
        return view('livewire.biuro.edit-student');
    }
}

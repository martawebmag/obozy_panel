<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Stypendysta;
use App\Models\Oboz;

class UczniowieForm extends Component
{
    public ?Oboz $oboz = null;

    public function mount(?Oboz $oboz)
    {
        $this->oboz = $oboz;
    }


     public $step = 1;

    // 🔹 Dane formularza
    public $imie, $nazwisko, $pesel, $data_urodzenia, $email_dzielo, $email_prywatny, $telefon, $plec;
    public $ulica, $nr_domu, $nr_mieszkania, $kod_pocztowy, $poczta, $miejscowosc, $wojewodztwo, $diecezja;
    public $imie_matki, $nazwisko_matki, $nazwisko_rodowe_matki, $telefon_matki, $pesel_matki, $email_matki, $matka_zmarla, $imie_ojca, $nazwisko_ojca, $telefon_ojca, $pesel_ojca, $email_ojca, $ojciec_zmarl, $imie_opiekuna_prawnego, $nazwisko_opiekuna_prawnego, $telefon_opiekuna_prawnego, $pesel_opiekuna_prawnego, $email_opiekuna_prawnego, $prawa_rodzicielskie, $prawa_informacje;
    public $szkola, $klasa, $oboz_id;
    public $zdrowie, $dieta, $jakaDieta, $dietaInfo;
    public $tshirt, $chor, $instrument, $uwagi, $tezec, $blonica, $inne_szczepienia, $data_przyjazdu, $data_wyjazdu;
    public $regulamin, $szpital, $informacje, $elektronika, $rodo, $wizerunek, $ochrona_maloletnich;

    protected $rules = [
        // Krok 1: dane osobowe
        'imie' => 'required|string|max:255',
        'nazwisko' => 'required|string|max:255',
        'pesel' => 'required|digits:11',
        'data_urodzenia' => 'nullable|date',
        'email_dzielo' => 'nullable|email',
        'email_prywatny' => 'nullable|email',
        'telefon' => 'nullable|string|max:20',
        'plec' => 'nullable|string|max:100',

        // Krok 2: adres
        'ulica' => 'required|string|max:255',
        'nr_domu' => 'nullable|string|max:10',
        'nr_mieszkania' => 'nullable|string|max:10',
        'kod_pocztowy' => 'nullable|string|max:10',
        'poczta' => 'nullable|string|max:100',
        'miejscowosc' => 'nullable|string|max:100',
        'wojewodztwo' => 'nullable|string|max:100',
        'diecezja' => 'nullable|string|max:100',

        // Krok 3: opiekun
        'imie_matki' => 'nullable|string|max:255',
        'nazwisko_matki' => 'nullable|string|max:255',
        'nazwisko_rodowe_matki' => 'nullable|string|max:255',
        'telefon_matki' => 'nullable|string|max:15',
        'pesel_matki' => 'nullable|digits:11',
        'email_matki' => 'nullable|email',
        'matka_zmarla' => 'nullable|boolean',
        'imie_ojca' => 'nullable|string|max:255',
        'nazwisko_ojca' => 'nullable|string|max:255',
        'telefon_ojca' => 'nullable|string|max:15',
        'pesel_ojca' => 'nullable|digits:11',
        'email_ojca' => 'nullable|email',
        'ojciec_zmarl' => 'nullable|boolean',
        'imie_opiekuna_prawnego' => 'nullable|string|max:255',
        'nazwisko_opiekuna_prawnego' => 'nullable|string|max:255',
        'telefon_opiekuna_prawnego' => 'nullable|string|max:15',
        'pesel_opiekuna_prawnego' => 'nullable|digits:11',
        'email_opiekuna_prawnego' => 'nullable|email',
        'prawa_rodzicielskie' => 'nullable|boolean',
        'prawa_informacje' => 'nullable|string|max:1000',

        // Krok 4: obozowe
        'szkola' => 'nullable|string|max:255',
        'klasa' => 'nullable|string|max:255',

        // Krok 5: zdrowie
        'zdrowie' => 'nullable|string|max:255',
        'dieta' => 'nullable|string|max:255',
        'jakaDieta' => 'nullable|string|max:1000',
        'dietaInfo' => 'nullable|string|max:1000',

        // Krok 6: dodatkowe
        'tshirt' => 'nullable|string|max:10',
        'chor' => 'nullable|string|max:255',
        'instrument' => 'nullable|string|max:255',
        'uwagi' => 'nullable|string|max:1000',
        'tezec' => 'nullable',
        'blonica' => 'nullable',
        'inne_szczepienia' => 'nullable|string|max:1000',
        'data_przyjazdu' => 'nullable|date',
        'data_wyjazdu' => 'nullable|date',

        // Krok 7: zgody
        'regulamin' => 'accepted',
        'szpital' => 'accepted',
        'informacje' => 'accepted',
        'elektronika' => 'accepted',
        'rodo' => 'accepted',
        'wizerunek' => 'accepted',
        'ochrona_maloletnich' => 'accepted',

    ];

    public function nextStep()
    {
        $this->validate($this->getStepRules());
        if ($this->step < 7) $this->step++;
    }

    public function prevStep()
    {
        if ($this->step > 1) $this->step--;
    }

    public function submit()
    {
        $this->validate();

        $stypendysta = Stypendysta::create([
            'typ_uczestnika' => 'Uczen',
            'imie' => $this->imie,
            'nazwisko' => $this->nazwisko,
            'pesel' => $this->pesel,
            'data_urodzenia' => $this->data_urodzenia,
            'email_dzielo' => $this->email_dzielo,
            'email_prywatny' => $this->email_prywatny,
            'telefon' => $this->telefon,
            'plec' => $this->plec,
            'ulica' => $this->ulica,
            'nr_domu' => $this->nr_domu,
            'nr_mieszkania' => $this->nr_mieszkania,
            'kod_pocztowy' => $this->kod_pocztowy,
            'poczta' => $this->poczta,
            'miejscowosc' => $this->miejscowosc,
            'wojewodztwo' => $this->wojewodztwo,
            'diecezja' => $this->diecezja,
            'imie_matki' => $this->imie_matki,
            'nazwisko_matki' => $this->nazwisko_matki,
            'nazwisko_rodowe_matki' => $this->nazwisko_rodowe_matki,
            'telefon_matki' => $this->telefon_matki,
            'pesel_matki' => $this->pesel_matki,
            'email_matki' => $this->email_matki,
            'matka_zmarla' => $this->matka_zmarla,
            'imie_ojca' => $this->imie_ojca,
            'nazwisko_ojca' => $this->nazwisko_ojca,
            'telefon_ojca' => $this->telefon_ojca,
            'pesel_ojca' => $this->pesel_ojca,
            'email_ojca' => $this->email_ojca,
            'ojciec_zmarl' => $this->ojciec_zmarl,
            'imie_opiekuna_prawnego' => $this->imie_opiekuna_prawnego,
            'nazwisko_opiekuna_prawnego' => $this->nazwisko_opiekuna_prawnego,
            'telefon_opiekuna_prawnego' => $this->telefon_opiekuna_prawnego,
            'pesel_opiekuna_prawnego' => $this->pesel_opiekuna_prawnego,
            'email_opiekuna_prawnego' => $this->email_opiekuna_prawnego,
            'prawa_rodzicielskie' => $this->prawa_rodzicielskie,
            'prawa_informacje' => $this->prawa_informacje,
        ]);

         $stypendysta->zgloszenia()->create([
            'oboz_id' => $this->oboz->id,
            'zdrowie' => $this->zdrowie,
            'dieta' => $this->dieta,
            'jaka_dieta' => $this->jakaDieta,
            'dieta_info' => $this->dietaInfo,
            'szkola' => $this->szkola,
            'klasa' => $this->klasa,
            'tshirt' => $this->tshirt,
            'chor' => $this->chor,
            'instrument' => $this->instrument,
            'uwagi' => $this->uwagi,
            'tezec' => $this->tezec,
            'blonica' => $this->blonica,
            'inne_szczepienia' => $this->inne_szczepienia,
            'data_przyjazdu' => $this->data_przyjazdu,
            'data_wyjazdu' => $this->data_wyjazdu,
            'regulamin' => $this->regulamin,
            'szpital' => $this->szpital,
            'informacje' => $this->informacje,
            'elektronika' => $this->elektronika,
            'rodo' => $this->rodo,
            'wizerunek' => $this->wizerunek,
            'ochrona_maloletnich' => $this->ochrona_maloletnich
        ]);

        session()->flash('success', 'Formularz został wysłany!');
        $this->resetForm();
        $this->step = 1;
    }

    private function resetForm()
    {
        $this->reset([
            'imie','nazwisko','pesel','data_urodzenia','email_dzielo','email_prywatny','telefon','plec',
            'ulica','nr_domu','nr_mieszkania','kod_pocztowy','poczta','miejscowosc','wojewodztwo','diecezja',
            'imie_matki','nazwisko_matki', 'nazwisko_rodowe_matki', 'telefon_matki','pesel_matki','email_matki','matka_zmarla', 'imie_ojca','nazwisko_ojca','telefon_ojca','pesel_ojca','email_ojca','ojciec_zmarl','imie_opiekuna_prawnego','nazwisko_opiekuna_prawnego','telefon_opiekuna_prawnego','pesel_opiekuna_prawnego','email_opiekuna_prawnego','prawa_rodzicielskie','prawa_informacje', 'szkola','klasa', 'zdrowie','dieta','jakaDieta','dietaInfo', 'tshirt','chor','instrument','uwagi','tezec','blonica','inne_szczepienia','data_przyjazdu','data_wyjazdu', 'regulamin','szpital','informacje','elektronika','rodo','wizerunek','ochrona_maloletnich'
        ]);
    }

    private function getStepRules()
    {
        switch($this->step){
            case 1:
                return array_intersect_key($this->rules, array_flip(['imie','nazwisko','pesel','data_urodzenia','email_dzielo','email_prywatny','telefon','plec']));
            case 2:
                return array_intersect_key($this->rules, array_flip(['ulica','nr_domu','nr_mieszkania','kod_pocztowy','poczta','miejscowosc','wojewodztwo','diecezja']));
            case 3:
                return array_intersect_key($this->rules, array_flip(['imie_matki','nazwisko_matki', 'nazwisko_rodowe_matki', 'telefon_matki','pesel_matki', 'email_matki','matka_zmarla', 'imie_ojca','nazwisko_ojca','telefon_ojca','pesel_ojca','email_ojca','ojciec_zmarl','imie_opiekuna_prawnego','nazwisko_opiekuna_prawnego','telefon_opiekuna_prawnego','pesel_opiekuna_prawnego','email_opiekuna_prawnego','prawa_rodzicielskie','prawa_informacje']));
            case 4:
                return array_intersect_key($this->rules, array_flip(['szkola','klasa']));
            case 5:
                return array_intersect_key($this->rules, array_flip(['zdrowie','dieta','jakaDieta','dietaInfo']) );
            case 6:
                return array_intersect_key($this->rules, array_flip(['tshirt','chor','instrument','uwagi','tezec','blonica','inne_szczepienia','data_przyjazdu','data_wyjazdu']) );
            case 7:
                return array_intersect_key($this->rules, array_flip(['regulamin', 'szpital', 'informacje', 'elektronika', 'rodo', 'wizerunek', 'ochrona_maloletnich']) );
        }
    }

    public function render()
    {
        return view('livewire.uczniowie-form');
    }
}

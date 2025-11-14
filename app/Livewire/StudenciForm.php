<?php

namespace App\Livewire;

use App\Models\Oboz;
use Livewire\Component;
use App\Models\Stypendysta;

class StudenciForm extends Component
{
    public ?Oboz $oboz = null;

    public function mount(?Oboz $oboz)
    {
        $this->oboz = $oboz;
    }

    public function goToStep($step)
    {
        $this->step = $step;
    }


   public $step = 1;

    // 🔹 Dane formularza
    public $imie, $nazwisko, $pesel, $data_urodzenia, $email_dzielo, $email_prywatny, $telefon, $plec, $wspolnota;
    public $ulica, $nr_domu, $nr_mieszkania, $kod_pocztowy, $poczta, $miejscowosc;
    public $imie_opiekuna, $nazwisko_opiekuna, $telefon_opiekuna;
    public $oboz_id, $zdrowie, $dieta, $jaka_dieta, $dieta_info;
    public $obrona, $sesja, $koniecSesji, $tshirt, $chor, $instrument, $posluga, $medycyna, $uwagi;
    public $regulamin, $rodo, $wizerunek, $ochrona_maloletnich;

    protected $rules = [
        // Krok 1: dane osobowe
        'imie' => 'required|string|max:255',
        'nazwisko' => 'required|string|max:255',
        'pesel' => 'required|digits:11',
        'data_urodzenia' => 'required|nullable|date',
        'email_dzielo' => 'required|nullable|email',
        'email_prywatny' => 'required|nullable|email',
        'telefon' => 'required|string|max:20',
        'plec' => 'required|string|max:100',
        'wspolnota' => 'required|string|max:100',

        // Krok 2: adres
        'ulica' => 'nullable|string|max:255',
        'nr_domu' => 'required|string|max:10',
        'nr_mieszkania' => 'nullable|string|max:10',
        'kod_pocztowy' => 'required|string|max:10',
        'poczta' => 'required|string|max:100',
        'miejscowosc' => 'required|string|max:100',

        // Krok 3: opiekun
        'imie_opiekuna' => 'required|string|max:255',
        'nazwisko_opiekuna' => 'required|string|max:255',
        'telefon_opiekuna' => 'required|string|max:15',

        // Krok 4: zdrowie
        'zdrowie' => 'nullable|string|max:255',
        'dieta' => 'required|string|max:255',
        'jaka_dieta' => 'nullable|string|max:1000',
        'dieta_info' => 'nullable|string|max:1000',

        // Krok 5: dodatkowe
        'obrona' => 'nullable|string|max:255',
        'sesja' => 'nullable|string|max:255',
        'koniecSesji' => 'nullable|string|max:1000',
        'tshirt' => 'required|string|max:255',
        'chor' => 'nullable|string|max:255',
        'instrument' => 'nullable|string|max:1000',
        'posluga' => 'nullable|string|max:1000',
        'medycyna' => 'nullable|string|max:1000',
        'uwagi' => 'nullable|string|max:1000',

        // Krok 6: zgody
        'regulamin' => 'accepted',
        'rodo' => 'accepted',
        'wizerunek' => 'accepted',
        'ochrona_maloletnich' => 'accepted',
    ];

    public function nextStep()
    {
        $this->validate($this->getStepRules());
        if ($this->step < 6) $this->step++;
    }

    public function prevStep()
    {
        if ($this->step > 1) $this->step--;
    }

    public function submit()
    {
        $this->validate();

        $stypendysta = Stypendysta::create([
            'typ_uczestnika' => 'Student',
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
            'imie_opiekuna' => $this->imie_opiekuna,
            'nazwisko_opiekuna' => $this->nazwisko_opiekuna,
            'telefon_opiekuna' => $this->telefon_opiekuna,
        ]);

        $stypendysta->zgloszenia()->create([
            'oboz_id' => $this->oboz->id,
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
            'regulamin' => $this->regulamin,
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
            'imie','nazwisko','pesel','data_urodzenia','email_dzielo','email_prywatny','telefon','plec', 'wspolnota',
            'ulica','nr_domu','nr_mieszkania','kod_pocztowy','poczta','miejscowosc',
            'imie_opiekuna','nazwisko_opiekuna','telefon_opiekuna', 'zdrowie','dieta','jaka_dieta', 'dieta_info','obrona', 'sesja', 'koniecSesji', 'tshirt', 'chor', 'instrument', 'posluga', 'medycyna', 'uwagi', 'regulamin', 'rodo', 'wizerunek', 'ochrona_maloletnich'
        ]);
    }

    private function getStepRules()
    {
        switch($this->step){
            case 1:
                return array_intersect_key($this->rules, array_flip(['imie','nazwisko','pesel','data_urodzenia','email_dzielo','email_prywatny','telefon','plec', 'wspolnota']));
            case 2:
                return array_intersect_key($this->rules, array_flip(['ulica','nr_domu','nr_mieszkania','kod_pocztowy','poczta','miejscowosc']));
            case 3:
                return array_intersect_key($this->rules, array_flip(['imie_opiekuna','nazwisko_opiekuna','telefon_opiekuna']));
            case 4:
                return array_intersect_key($this->rules, array_flip(['zdrowie','dieta','jaka_dieta', 'dieta_info']));
            case 5:
                return array_intersect_key($this->rules, array_flip(['obrona', 'sesja', 'koniecSesji', 'tshirt', 'chor', 'instrument', 'posluga', 'medycyna', 'uwagi']));
            case 6:
                return array_intersect_key($this->rules, array_flip(['regulamin', 'rodo', 'wizerunek', 'ochrona_maloletnich']) );
        }
    }

    public function render()
    {
        return view('livewire.studenci-form');
    }
}

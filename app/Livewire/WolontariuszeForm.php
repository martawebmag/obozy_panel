<?php

namespace App\Livewire;

use App\Models\Oboz;
use Livewire\Component;
use App\Models\Wolontariusz;
use App\Models\WolontariuszZgloszenia;

class WolontariuszeForm extends Component
{

    public $obozUczniowie;

    public function mount()
    {
        $this->obozUczniowie = Oboz::where('uczestnicy', 'Uczniowie')
            ->where('rok_obozu', 2025)
            ->orderByDesc('start_date')
            ->first();
    }
    public $use_other_address = false;

    public function goToStep($step)
{
    $this->step = $step;
}

    public $step = 1;

    // Podstawowe dane osobowe
    public $tytul_zwrot, $imie, $imie_zakonne, $nazwisko, $nazwisko_rodowe;
    public $imie_matki, $imie_ojca, $nazwisko_rodowe_matki;
    public $pesel, $data_urodzenia, $email, $telefon, $plec;

    // Adres
    public $ulica, $numer_domu, $numer_mieszkania, $kod_pocztowy, $poczta, $miejscowosc;
    public $ulica_koresp, $numer_domu_koresp, $numer_mieszkania_koresp;
    public $kod_pocztowy_koresp, $poczta_koresp, $miejscowosc_koresp;

    // Zgłoszenie
    public $oboz_id;
    public $rodzaj_wolontariatu;
    public $preferencje;
    public $koszulka_rozmiar;
    public $stypendysta_status;
    public $status_wolontariusza;
    public $wspolnota;
    public $nazwa_uczelni;
    public $kierunek;
    public $miejsce_zatrudnienia;
    public $zawod_posluga;
    public $doswiadczenie;
    public $doswiadczenie_opis;

    // Zdrowie
    public $chor, $instrument, $uwagi_zdrowie, $dieta, $jaka_dieta, $dietaInfo, $dodatkowe_info;

    // Dokumenty
    public $dokumenty_zalaczone, $dokumenty_wyslane_mailem, $dokumenty_beda_doslane, $elektronika;

    // Zgody
    public $rodo, $wizerunek, $ochrona_maloletnich;

    // Przełożony
    public $zwrot, $imie_przelozonego, $nazwisko_przelozonego, $diecezja_przelozonego;
    public $email_przelozonego, $ulica_przelozonego, $numer_domu_przelozonego;
    public $numer_mieszkania_przelozonego, $kod_pocztowy_przelozonego;
    public $poczta_przelozonego, $miejscowosc_przelozonego;

    public function nextStep()
    {
        $this->step++;
    }

    public function prevStep()
    {
        $this->step--;
    }

    public function submit()
    {
        $oboz = Oboz::where('uczestnicy', 'Uczniowie')->first();

        if (!$oboz) {
            throw new \Exception("Nie znaleziono obozu o typie uczestników 'Uczniowie'");
        }

        // Zapis danych osobowych
        $wol = Wolontariusz::create([
            'tytul_zwrot' => $this->tytul_zwrot,
            'imie' => $this->imie,
            'imie_zakonne' => $this->imie_zakonne,
            'nazwisko' => $this->nazwisko,
            'nazwisko_rodowe' => $this->nazwisko_rodowe,
            'imie_matki' => $this->imie_matki,
            'imie_ojca' => $this->imie_ojca,
            'nazwisko_rodowe_matki' => $this->nazwisko_rodowe_matki,
            'pesel' => $this->pesel,
            'data_urodzenia' => $this->data_urodzenia,
            'email' => $this->email,
            'telefon' => $this->telefon,
            'plec' => $this->plec,
            'ulica' => $this->ulica,
            'numer_domu' => $this->numer_domu,
            'numer_mieszkania' => $this->numer_mieszkania,
            'kod_pocztowy' => $this->kod_pocztowy,
            'poczta' => $this->poczta,
            'miejscowosc' => $this->miejscowosc,
            'ulica_koresp' => $this->ulica_koresp,
            'numer_domu_koresp' => $this->numer_domu_koresp,
            'numer_mieszkania_koresp' => $this->numer_mieszkania_koresp,
            'kod_pocztowy_koresp' => $this->kod_pocztowy_koresp,
            'poczta_koresp' => $this->poczta_koresp,
            'miejscowosc_koresp' => $this->miejscowosc_koresp,
        ]);

        // Zapis zgłoszenia
        WolontariuszZgloszenia::create([
            'wolontariusz_id' => $wol->id,
            'oboz_id' => $oboz->id,
            'rodzaj_wolontariatu' => $this->rodzaj_wolontariatu,
            'preferencje' => $this->preferencje,
            'koszulka_rozmiar' => $this->koszulka_rozmiar,
            'stypendysta_status' => $this->stypendysta_status,
            'status_wolontariusza' => $this->status_wolontariusza,
            'wspolnota' => $this->wspolnota,
            'nazwa_uczelni' => $this->nazwa_uczelni,
            'kierunek' => $this->kierunek,
            'miejsce_zatrudnienia' => $this->miejsce_zatrudnienia,
            'zawod_posluga' => $this->zawod_posluga,
            'doswiadczenie' => $this->doswiadczenie,
            'doswiadczenie_opis' => $this->doswiadczenie_opis,
            'chor' => $this->chor,
            'instrument' => $this->instrument,
            'uwagi_zdrowie' => $this->uwagi_zdrowie,
            'dieta' => $this->dieta,
            'jaka_dieta' => $this->jaka_dieta,
            'dieta_info' => $this->dietaInfo,
            'dodatkowe_info' => $this->dodatkowe_info,
            'dokumenty_zalaczone' => $this->dokumenty_zalaczone ?? 0,
            'dokumenty_wyslane_mailem' => $this->dokumenty_wyslane_mailem ?? 0,
            'dokumenty_beda_doslane' => $this->dokumenty_beda_doslane ?? 0,
            'elektronika' => $this->elektronika,
            'rodo' => $this->rodo,
            'wizerunek' => $this->wizerunek,
            'ochrona_maloletnich' => $this->ochrona_maloletnich,
            'zwrot' => $this->zwrot,
            'imie_przelozonego' => $this->imie_przelozonego,
            'nazwisko_przelozonego' => $this->nazwisko_przelozonego,
            'diecezja_przelozonego' => $this->diecezja_przelozonego,
            'email_przelozonego' => $this->email_przelozonego,
            'ulica_przelozonego' => $this->ulica_przelozonego,
            'numer_domu_przelozonego' => $this->numer_domu_przelozonego,
            'numer_mieszkania_przelozonego' => $this->numer_mieszkania_przelozonego,
            'kod_pocztowy_przelozonego' => $this->kod_pocztowy_przelozonego,
            'poczta_przelozonego' => $this->poczta_przelozonego,
            'miejscowosc_przelozonego' => $this->miejscowosc_przelozonego,
        ]);

        session()->flash('success', 'Formularz wysłany!');
        return redirect()->route('wolontariusze.index');
    }

    public function render()
    {
        return view('livewire.wolontariusze-form');
    }
}


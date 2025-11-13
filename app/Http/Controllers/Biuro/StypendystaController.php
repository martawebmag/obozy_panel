<?php

namespace App\Http\Controllers\Biuro;

use App\Models\User;
use App\Models\Stypendysta;
use App\Models\Zgloszenia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StypendystaController extends Controller
{
    public function index()
    {
        $stypendysci = Stypendysta::orderBy('updated_at')->paginate(10);

        return view('biuro.stypendysci.index', compact('stypendysci'));
    }

    public function create()
    {
         return view('biuro.stypendysci.create');
    }

    public function store(Request $request)
    {
         $user = Auth::user();

        $request->validate([
            'imie'     => 'required|string|max:255',
            'nazwisko'  => 'required|string|max:255',
            'diecezja' => 'required|string|max:255',
            'email_dzielo'    => 'required|email|unique:users,email',
            'typ_uczestnika' => 'reqiured'
        ]);


        $user = Stypendysta::create([
            'imie'     => $request->imie,
            'nazwisko'  => $request->nazwisko,
            'diecezja'  => $request->diecezja,
            'email_dzielo'    => $request->email_dzielo,
            'typ_uczestnika' => $request->typ_uczestnika,
        ]);

        return redirect()
            ->route('biuro.stypendysci.index')
            ->with('success', 'Stypendysta został dodany.');
        }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $stypendysta = Stypendysta::findOrFail($id);

        return view('biuro.stypendysci.edit', compact('stypendysta'));
    }



    public function update(Request $request, string $id)
    {
        DB::beginTransaction();

        try {
            $stypendysta = Stypendysta::findOrFail($id);

            // 🔒 Walidacja (tu skrócona – można rozszerzyć jak wcześniej)
            $request->validate([
                'imie' => 'required|string|max:255',
                'nazwisko' => 'required|string|max:255',
                'pesel' => 'required|string|max:11',
                'data_urodzenia' => 'nullable|date',
                'email_dzielo' => 'nullable|email|max:255',
                'email_prywatny' => 'nullable|email|max:255',
                'telefon' => 'nullable|string|max:20',
                'plec' => 'nullable|string|max:20',

                'ulica' => 'nullable|string|max:255',
                'nr_domu' => 'nullable|string|max:10',
                'nr_mieszkania' => 'nullable|string|max:10',
                'kod_pocztowy' => 'nullable|string|max:10',
                'poczta' => 'nullable|string|max:255',
                'miejscowosc' => 'nullable|string|max:255',
                'wojewodztwo' => 'nullable|string|max:255',
                'diecezja' => 'nullable|string|max:255',

                'imie_matki' => 'nullable|string|max:255',
                'nazwisko_matki' => 'nullable|string|max:255',
                'nazwisko_rodowe_matki' => 'nullable|string|max:255',
                'telefon_matki' => 'nullable|string|max:20',
                'pesel_matki' => 'nullable|string|max:11',
                'email_matki' => 'nullable|email|max:255',
                'matka_zmarla' => 'nullable',

                'imie_ojca' => 'nullable|string|max:255',
                'nazwisko_ojca' => 'nullable|string|max:255',
                'telefon_ojca' => 'nullable|string|max:20',
                'pesel_ojca' => 'nullable|string|max:11',
                'email_ojca' => 'nullable|email|max:255',
                'ojciec_zmarl' => 'nullable',

                'imie_opiekuna_prawnego' => 'nullable|string|max:255',
                'nazwisko_opiekuna_prawnego' => 'nullable|string|max:255',
                'telefon_opiekuna_prawnego' => 'nullable|string|max:20',
                'pesel_opiekuna_prawnego' => 'nullable|string|max:11',
                'email_opiekuna_prawnego' => 'nullable|email|max:255',
                'prawa_rodzicielskie' => 'nullable|string',
                'prawa_informacje' => 'nullable|string',

                'szkola' => 'nullable|string|max:255',
                'klasa' => 'nullable|string|max:50',

                'zdrowie' => 'nullable|string',
                'dieta' => 'nullable|string',
                'jakaDieta' => 'nullable|string',
                'dietaInfo' => 'nullable|string',

                'tshirt' => 'nullable|string|max:10',
                'chor' => 'nullable|string',
                'instrument' => 'nullable|string',
                'uwagi' => 'nullable|string',

                'tezec' => 'nullable|string',
                'blonica' => 'nullable|string',
                'inne_szczepienia' => 'nullable|string',
                'data_przyjazdu' => 'nullable|date',
                'data_wyjazdu' => 'nullable|date',

                'regulamin' => 'accepted',
                'szpital' => 'accepted',
                'informacje' => 'accepted',
                'elektronika' => 'accepted',
                'rodo' => 'accepted',
                'wizerunek' => 'accepted',
                'ochrona_maloletnich' => 'accepted']);

            // 🔹 Aktualizacja danych stypendysty
            $stypendysta->update([
                'imie' => $request->imie,
                'nazwisko' => $request->nazwisko,
                'pesel' => $request->pesel,
                'data_urodzenia' => $request->data_urodzenia,
                'email_dzielo' => $request->email_dzielo,
                'email_prywatny' => $request->email_prywatny,
                'telefon' => $request->telefon,
                'plec' => $request->plec,
                'ulica' => $request->ulica,
                'nr_domu' => $request->nr_domu,
                'nr_mieszkania' => $request->nr_mieszkania,
                'kod_pocztowy' => $request->kod_pocztowy,
                'poczta' => $request->poczta,
                'miejscowosc' => $request->miejscowosc,
                'wojewodztwo' => $request->wojewodztwo,
                'diecezja' => $request->diecezja,
                'imie_matki' => $request->imie_matki,
                'nazwisko_matki' => $request->nazwisko_matki,
                'nazwisko_rodowe_matki' => $request->nazwisko_rodowe_matki,
                'telefon_matki' => $request->telefon_matki,
                'pesel_matki' => $request->pesel_matki,
                'email_matki' => $request->email_matki,
                'matka_zmarla' => $request->boolean('matka_zmarla'),
                'imie_ojca' => $request->imie_ojca,
                'nazwisko_ojca' => $request->nazwisko_ojca,
                'telefon_ojca' => $request->telefon_ojca,
                'pesel_ojca' => $request->pesel_ojca,
                'email_ojca' => $request->email_ojca,
                'ojciec_zmarl' => $request->boolean('ojciec_zmarl'),
                'imie_opiekuna_prawnego' => $request->imie_opiekuna_prawnego,
                'nazwisko_opiekuna_prawnego' => $request->nazwisko_opiekuna_prawnego,
                'telefon_opiekuna_prawnego' => $request->telefon_opiekuna_prawnego,
                'pesel_opiekuna_prawnego' => $request->pesel_opiekuna_prawnego,
                'email_opiekuna_prawnego' => $request->email_opiekuna_prawnego,
                'prawa_rodzicielskie' => $request->prawa_rodzicielskie,
                'prawa_informacje' => $request->prawa_informacje,
            ]);

                $zgloszenie = $stypendysta->zgloszenia()->latest('id')->first();

                if (!$zgloszenie) {
                $zgloszenie = new Zgloszenia(['stypendysta_id' => $stypendysta->id]);
            }


            $zgloszenie->fill([
                'szkola' => $request->szkola,
                'klasa' => $request->klasa,
                'zdrowie' => $request->zdrowie,
                'dieta' => $request->dieta,
                'jakaDieta' => $request->jakaDieta,
                'dietaInfo' => $request->dietaInfo,
                'tshirt' => $request->tshirt,
                'chor' => $request->chor,
                'instrument' => $request->instrument,
                'uwagi' => $request->uwagi,
                'tezec' => $request->boolean('tezec'),
                'blonica' => $request->boolean('blonica'),
                'inne_szczepienia' => $request->inne_szczepienia,
                'data_przyjazdu' => $request->data_przyjazdu,
                'data_wyjazdu' => $request->data_wyjazdu,
                'regulamin' => $request->boolean('regulamin'),
                'szpital' => $request->szpital,
                'informacje' => $request->informacje,
                'elektronika' => $request->boolean('elektronika'),
                'rodo' => $request->boolean('rodo'),
                'wizerunek' => $request->boolean('wizerunek'),
                'ochrona_maloletnich' => $request->boolean('ochrona_maloletnich'),
            ]);

            $zgloszenie->save();

            DB::commit();

            return redirect()
                ->route('biuro.stypendysci.index')
                ->with('success', 'Dane stypendysty i zgłoszenia zostały zaktualizowane.');

        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withErrors(['error' => 'Błąd przy aktualizacji danych: ' . $e->getMessage()]);
        }
    }


    public function destroy(string $id)
    {
        $stypendysta = Stypendysta::findOrFail($id);
        $stypendysta->delete();

        return redirect()->route('biuro.stypendysci.index')
            ->with('success', 'Stypendysta został usunięty.');
    }
}

<?php

namespace App\Http\Controllers\Biuro;

use App\Models\Zgloszenia;
use App\Models\Stypendysta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{

    public function index()
    {
        $studenci = Stypendysta::where('typ_uczestnika', 'Student')->paginate(10);

        return view('biuro.stypendysci.studenci.index', compact('studenci'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student= Stypendysta::where('typ_uczestnika', 'Student')->findOrFail($id);

        return view('biuro.stypendysci.studenci.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();

        try {
            $student = Stypendysta::where('typ_uczestnika', 'Student')->get();

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
                'wspolnota' => 'required|string|max:255',

                'ulica' => 'nullable|string|max:255',
                'nr_domu' => 'nullable|string|max:10',
                'nr_mieszkania' => 'nullable|string|max:10',
                'kod_pocztowy' => 'nullable|string|max:10',
                'poczta' => 'nullable|string|max:255',
                'miejscowosc' => 'nullable|string|max:255',

                'imie_opiekuna' => 'required|string|max:255',
                'nazwisko_opiekuna' => 'required|string|max:255',
                'telefon_opiekuna' => 'required|string|max:15',

                'zdrowie' => 'nullable|string|max:255',
                'dieta' => 'required|string|max:255',
                'jaka_dieta' => 'nullable|string|max:1000',
                'dieta_info' => 'nullable|string|max:1000',

                'obrona' => 'nullable|string|max:255',
                'sesja' => 'nullable|string|max:255',
                'koniecSesji' => 'nullable|string|max:1000',
                'tshirt' => 'required|string|max:255',
                'chor' => 'nullable|string|max:255',
                'instrument' => 'nullable|string|max:1000',
                'posluga' => 'nullable|string|max:1000',
                'medycyna' => 'nullable|string|max:1000',
                'uwagi' => 'nullable|string|max:1000',

                'regulamin' => 'accepted',
                'rodo' => 'accepted',
                'wizerunek' => 'accepted',
                'ochrona_maloletnich' => 'accepted'
            ]);

            // 🔹 Aktualizacja danych stypendysty
            $student->update([
                'imie' => $request->imie,
                'nazwisko' => $request->nazwisko,
                'pesel' => $request->pesel,
                'data_urodzenia' => $request->data_urodzenia,
                'email_dzielo' => $request->email_dzielo,
                'email_prywatny' => $request->email_prywatny,
                'telefon' => $request->telefon,
                'plec' => $request->plec,
                'wspolnota'=>$request->wspolnota,
                'ulica' => $request->ulica,
                'nr_domu' => $request->nr_domu,
                'nr_mieszkania' => $request->nr_mieszkania,
                'kod_pocztowy' => $request->kod_pocztowy,
                'poczta' => $request->poczta,
                'miejscowosc' => $request->miejscowosc,
                'imie_opiekuna' => $request->imie_opiekuna,
                'nazwisko_opiekuna' => $request->nazwisko_opiekuna,
                'telefon_opiekuna' => $request->telefon_opiekuna,
            ]);

                $zgloszenie = $student->zgloszenia()->latest('id')->first();

                if (!$zgloszenie) {
                $zgloszenie = new Zgloszenia(['stypendysta_id' => $student->id]);
            }


            $zgloszenie->fill([
            'zdrowie' => $request->zdrowie,
            'dieta' => $request->dieta,
            'jaka_dieta' => $request->jaka_dieta,
            'dieta_info' => $request->dieta_info,
            'obrona' => $request->obrona,
            'sesja' => $request->sesja,
            'koniecSesji' => $request->koniecSesji,
            'tshirt' => $request->tshirt,
            'chor' => $request->chor,
            'instrument' => $request->instrument,
            'posluga' => $request->posluga,
            'medycyna' => $request->medycyna,
            'uwagi' => $request->uwagi,
            'regulamin' => $request->regulamin,
            'rodo' => $request->rodo,
            'wizerunek' => $request->wizerunek,
            'ochrona_maloletnich' => $request->ochrona_maloletnich
            ]);

            $zgloszenie->save();

            DB::commit();

            return redirect()
                ->route('biuro.stypendysci.studenci.index')
                ->with('success', 'Dane stypendysty i zgłoszenia zostały zaktualizowane.');

        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withErrors(['error' => 'Błąd przy aktualizacji danych: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

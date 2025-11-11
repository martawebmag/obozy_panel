<?php

namespace App\Http\Controllers;

use App\Models\Oboz;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ObozController extends Controller
{
    /**
     * Lista obozów + formularz dodawania
     */
    public function index()
    {
        $obozy = Oboz::orderByDesc('start_date')->paginate(6);

        return view('biuro.obozy.index', compact('obozy'));
    }

    public function create()
    {
        return view('biuro.obozy.create');
    }


    /**
     * Zapis nowego obozu
     */
    public function store(Request $request)
    {
        $request->validate([
            'start_date' => ['required', 'date'],
            'end_date'   => ['required', 'date', 'after_or_equal:start_date'],
            'miejsce'    => ['required', 'string', 'max:255'],
            'uczestnicy' => ['required', 'in:Uczniowie,Maturzyści,Studenci'],
        ]);

        $rok_obozu = Carbon::parse($request->start_date)->year;

         // ✅ sprawdzenie, czy istnieje już obóz dla danego roku i grupy
        $istnieje = Oboz::where('rok_obozu', $rok_obozu)
            ->where('uczestnicy', $request->uczestnicy)
            ->exists();

        if ($istnieje) {
            return back()
                ->withErrors([
                    'uczestnicy' => "Dla grupy '{$request->uczestnicy}' w roku {$rok_obozu} obóz już istnieje."
                ])
                ->withInput();
        }

        Oboz::create([
            'start_date' => Carbon::parse($request->start_date)->format('Y-m-d'),
            'end_date'   => Carbon::parse($request->end_date)->format('Y-m-d'),
            'miejsce'    => $request->miejsce,
            'rok_obozu'  => $rok_obozu,
            'uczestnicy' => $request->uczestnicy,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Nowy obóz został dodany!');
    }


    /**
     * Formularz edycji
     */
    public function edit(Oboz $oboz)
    {
        return view('biuro.obozy.edit', compact('oboz'));
    }


    /**
     * Zapis zmian
     */
    public function update(Request $request, Oboz $oboz)
    {
        $request->validate([
            'start_date' => ['required', 'date'],
            'end_date'   => ['required', 'date', 'after_or_equal:start_date'],
            'miejsce'    => ['required', 'string', 'max:255'],
            'uczestnicy' => ['required', 'in:Uczniowie,Maturzyści,Studenci'],
        ]);

        $rok_obozu = Carbon::parse($request->start_date)->year;

        $istnieje = Oboz::where('rok_obozu', $rok_obozu)
            ->where('uczestnicy', $request->uczestnicy)
            ->where('id', '!=', $oboz->id)   // wykluczamy aktualny rekord
            ->exists();

        if ($istnieje) {
            return back()
                ->withErrors([
                    'uczestnicy' => "Dla grupy '{$request->uczestnicy}' w roku {$rok_obozu} obóz już istnieje."
                ])
                ->withInput();
        }

        $oboz->update([
            'start_date' => Carbon::parse($request->start_date)->format('Y-m-d'),
            'end_date'   => Carbon::parse($request->end_date)->format('Y-m-d'),
            'miejsce'    => $request->miejsce,
            'uczestnicy' => $request->uczestnicy,
            'rok_obozu'  => $rok_obozu,
        ]);

        return redirect()
            ->route('biuro.obozy.index')
            ->with('success', 'Obóz został zaktualizowany!');
    }


    /**
     * Usuwanie
     */
    public function destroy(Oboz $oboz)
    {
        $oboz->delete();

        return redirect()
            ->back()
            ->with('success', 'Obóz został usunięty.');
    }
}

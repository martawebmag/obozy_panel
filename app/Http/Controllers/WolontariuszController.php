<?php

namespace App\Http\Controllers;

use App\Models\Wolontariusz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WolontariuszController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $uczestnicy = $request->get('uczestnicy');

        $wolontariusze = Wolontariusz::with(['zgloszenia.oboz'])
        ->when($uczestnicy, function($query, $uczestnicy) {
            $query->whereHas('zgloszenia.oboz', function($q) use ($uczestnicy) {
                $q->where('uczestnicy', $uczestnicy);
            });
        })
        ->get();

        return view('biuro.wolontariusze.index', compact('wolontariusze'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('biuro.wolontariusze.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

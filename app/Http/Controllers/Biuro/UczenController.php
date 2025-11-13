<?php

namespace App\Http\Controllers\Biuro;

use App\Models\Stypendysta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UczenController extends Controller
{
    public function index()
    {
         $uczniowie = Stypendysta::where('typ_uczestnika', 'Uczen')->paginate(10);

        return view('biuro.stypendysci.uczniowie.index', compact('uczniowie'));
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

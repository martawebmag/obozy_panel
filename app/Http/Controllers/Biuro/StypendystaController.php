<?php

namespace App\Http\Controllers\Biuro;

use App\Models\User;
use App\Models\Stypendysta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StypendystaController extends Controller
{
    public function index()
    {
        $stypendysci = Stypendysta::all();

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
         $stypendysta = Stypendysta::where('role', 'biuro')->findOrFail($id);

        return view('biuro.stypendysci.edit', compact('stypendysta'));
    }

    public function update(Request $request, string $id)
    {
        $stypendysta = Stypendysta::where('role', 'biuro')->findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'surname'  => 'required|string|max:255',
            'diocese' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $stypendysta->id,
        ]);

        $stypendysta->name  = $request->name;
        $stypendysta->surname  = $request->surname;
        $stypendysta->diocese = $request->diocese;
        $stypendysta->email = $request->email;

        $stypendysta->save();

        return redirect()->route('biuro.stypendysci.index')
            ->with('success', 'Dane stypendysty zostały zaktualizowane.');
    }

    public function destroy(string $id)
    {
        $stypendysta = Stypendysta::where('role', 'biuro')->findOrFail($id);
        $stypendysta->delete();

        return redirect()->route('biuro.stypendysci.index')
            ->with('success', 'Stypendysta został usunięty.');
    }
}

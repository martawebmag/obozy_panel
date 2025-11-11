<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KoordynatorController extends Controller
{
    /**
     * Lista koordynatorów
     */
    public function index()
    {
        $koordynatorzy = User::where('role', 'koordynator')->get();

        return view('biuro.koordynatorzy.index', compact('koordynatorzy'));
    }

    /**
     * Formularz dodawania
     */
    public function create()
    {
        return view('biuro.koordynatorzy.create');
    }

    /**
     * Zapis nowego koordynatora
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'surname'  => 'required|string|max:255',
            'diocese' => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name'     => $request->name,
            'surname'  => $request->surname,
            'diocese' => $request->diocese,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'koordynator',
        ]);

        return redirect()->route('koordynatorzy.index')
            ->with('success', 'Koordynator został dodany.');
    }

    /**
     * Formularz edycji
     */
    public function edit($id)
    {
        $koordynator = User::where('role', 'koordynator')->findOrFail($id);
        
        return view('biuro.koordynatorzy.edit', compact('koordynator'));
    }

    /**
     * Zapis edytowanych danych
     */
    public function update(Request $request, $id)
    {
        $koordynator = User::where('role', 'koordynator')->findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'surname'  => 'required|string|max:255',
            'diocese' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $koordynator->id,
        ]);

        $koordynator->name  = $request->name;
        $koordynator->surname  = $request->surname;
        $koordynator->diocese = $request->diocese;
        $koordynator->email = $request->email;

        if ($request->password) {
            $request->validate([
                'password' => 'min:6',
            ]);
            $koordynator->password = Hash::make($request->password);
        }

        $koordynator->save();

        return redirect()->route('koordynatorzy.index')
            ->with('success', 'Dane koordynatora zostały zaktualizowane.');
    }

    /**
     * Usuwanie
     */
    public function destroy($id)
    {
        $koordinator = User::where('role', 'koordynator')->findOrFail($id);
        $koordinator->delete();

        return redirect()->route('koordynatorzy.inde')
            ->with('success', 'Koordynator został usunięty.');
    }
}

<?php

namespace App\Http\Controllers\Biuro;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

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
        $user = Auth::user();

        $request->validate([
            'name'     => 'required|string|max:255',
            'surname'  => 'required|string|max:255',
            'diocese' => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
        ]);

         // wygeneruj tymczasowe hasło
        $tempPassword = Str::random(12);

        $user = User::create([
            'name'     => $request->name,
            'surname'  => $request->surname,
            'diocese'  => $request->diocese,
            'email'    => $request->email,
            'password' => Hash::make($tempPassword),
            'role'     => 'koordynator',
        ]);
        // Wyślij email do ustawienia hasła
        Password::sendResetLink(['email' => $user->email]);

        return redirect()
            ->route('biuro.koordynatorzy.index')
            ->with('success', 'Zaproszenie wysłane. Koordynator otrzyma email z linkiem do ustawienia hasła.');
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

        return redirect()->route('biuro.koordynatorzy.index')
            ->with('success', 'Dane koordynatora zostały zaktualizowane.');
    }

    /**
     * Usuwanie
     */
    public function destroy($id)
    {
        $koordynator = User::where('role', 'koordynator')->findOrFail($id);
        $koordynator->delete();

        return redirect()->route('biuro.koordynatorzy.index')
            ->with('success', 'Koordynator został usunięty.');
    }
}

@extends('layouts.app')

@section('content')
<div class="min-h-screen flex bg-slate-100 border-t-2 border-slate-300">

@include('biuro.sidebar')

<!-- 🧾 GŁÓWNA ZAWARTOŚĆ -->
<main class="flex-1 p-10 bg-slate-50 shadow-inner border-l-2 border-slate-300">

    <!-- Nagłówek -->
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-2xl font-bold text-slate-800">Lista Wolontariuszy</h1>
        <a href="{{ route('biuro.wolontariusze.create') }}"
           class="bg-blue-800 text-white font-semibold px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
            Dodaj wolontariusza
        </a>
    </div>

<!-- Filtr: wybierz obóz -->
<form method="GET" action="{{ route('biuro.wolontariusze.index') }}" class="mb-4 max-w-md">
    <label for="uczestnicy" class="block text-sm font-medium text-slate-700 mb-2">
        Wybierz rodzaj obozu
    </label>
    <select id="uczestnicy" name="uczestnicy"
            class="w-full p-2 border border-slate-300 rounded-lg bg-white text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-300"
            onchange="this.form.submit()">
        <option value="">-- Wszystkie --</option>
        <option value="uczniowie"   {{ request('uczestnicy')=='uczniowie' ? 'selected' : '' }}>Obóz uczniów</option>
        <option value="studenci"    {{ request('uczestnicy')=='studenci' ? 'selected' : '' }}>Obóz studentów</option>
        <option value="maturzysci"  {{ request('uczestnicy')=='maturzysci' ? 'selected' : '' }}>Obóz maturzystów</option>
    </select>

        <div class="mb-2 text-slate-700 text-sm mt-6">
            Liczba wolontariuszy:
            <span class="font-semibold">{{ $wolontariusze->count() }}</span>
        </div>
</form>
        <div class="flex flex-row mb-8">
            <form action="#" method="GET">
                @csrf
                <button
                    class="px-4 py-1 font-medium border border-emerald-600 rounded-md bg-emerald-600 hover:bg-emerald-700 text-white transition flex items-center">
                    <i class="fa-solid fa-download mr-2"></i>Pobierz raport (xls)
                </button>
            </form>
        </div>


    <!-- Tabela wolontariuszy -->
    <div class="overflow-x-auto bg-white rounded-lg shadow border border-slate-200">

        <table class="min-w-full divide-y divide-slate-200">
            <thead class="bg-blue-100">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-slate-700">L.p.</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-slate-700">Imię</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-slate-700">Nazwisko</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-slate-700">Email</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-slate-700">Miejsce obozu</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-slate-700">Rodzaj obozu</th>
                    <th class="px-4 py-2 text-center text-sm font-semibold text-slate-700">Akcje</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200">
                @foreach($wolontariusze as $index => $w)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-4 py-2 text-sm text-slate-700">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 text-sm text-slate-700">{{ $w->imie }}</td>
                        <td class="px-4 py-2 text-sm text-slate-700">{{ $w->nazwisko }}</td>
                        <td class="px-4 py-2 text-sm text-slate-700">{{ $w->email }}</td>
                        <td class="px-4 py-2 text-sm text-slate-700">
                            {{ $w->zgloszenia->first()?->oboz?->miejsce ?? 'Brak' }}
                        </td>

                        <td class="px-4 py-2 text-sm text-slate-700">
                            {{ $w->zgloszenia->first()?->oboz?->uczestnicy ?? 'Brak' }}
                        </td>
                        <td class="px-4 py-2 text-center space-x-2">
                            <a href="{{ route('biuro.wolontariusze.edit', $w->id) }}"
                                    class="text-slate-600 border border-blue-300 hover:bg-slate-100 text-sm px-3 py-1 rounded-md">
                                    <i class="fa-solid fa-pen text-blue-500 mr-2"></i> Edytuj
                            </a>
                            <form action="{{ route('biuro.wolontariusze.destroy', $w->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                       class="text-slate-600 border border-red-300 hover:bg-slate-100 text-sm px-3 py-1 rounded-md">
                                      <i class="fa-solid fa-trash text-red-500 mr-2"></i> Usuń
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if($wolontariusze->isEmpty())
                    <tr>
                        <td colspan="6" class="px-4 py-4 text-center text-slate-500 text-sm">
                            Brak wolontariuszy do wyświetlenia.
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

</main>


</div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex bg-slate-100 border-t-2 border-slate-300">

        @include('biuro.sidebar')

        <!-- ✅ Główna zawartość -->
        <main class="flex-1 p-10 bg-slate-50">

            <div class="max-w-xl bg-white shadow-md border border-slate-200 rounded-xl p-8">

                <h2 class="text-2xl font-bold text-slate-800 mb-6">
                    ✏️ Edytuj Koordynatora
                </h2>

                <!-- ✅ Błędy walidacji -->
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg border border-red-300">
                        <ul class="list-disc ml-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <!-- ✅ Formularz -->
                <form method="POST" action="{{ route('koordynatorzy.update', $koordynator->id) }}">
                    @csrf
                    @method('PUT')

                    <!-- Imię -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-slate-700 mb-1">
                            Imię
                        </label>
                        <input type="text" name="name" value="{{ old('name', $koordynator->name) }}"
                               class="w-full border border-slate-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-400"
                               required>
                    </div>

                    <!-- Nazwisko -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-slate-700 mb-1">
                            Nazwisko
                        </label>
                        <input type="text" name="surname" value="{{ old('surname', $koordynator->surname) }}"
                               class="w-full border border-slate-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-400"
                               required>
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-slate-700 mb-1">
                            Email
                        </label>
                        <input type="email" name="email" value="{{ old('email', $koordynator->email) }}"
                               class="w-full border border-slate-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-400"
                               required>
                    </div>

                    <!-- Diecezja -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-slate-700 mb-1">
                            Diecezja
                        </label>
                        <select name="diocese"
                                class="w-full border border-slate-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-400"
                                required>
                            <option value="">-- wybierz diecezję --</option>

                            <option value="białostocka" @selected(old('diocese', $koordynator->diocese) == 'białostocka')>Białostocka</option>
                            <option value="kielecka"    @selected(old('diocese', $koordynator->diocese) == 'kielecka')>Kielecka</option>
                            <option value="krakowska"   @selected(old('diocese', $koordynator->diocese) == 'krakowska')>Krakowska</option>
                            <option value="lubelska"    @selected(old('diocese', $koordynator->diocese) == 'lubelska')>Lubelska</option>
                            <option value="warszawska"  @selected(old('diocese', $koordynator->diocese) == 'warszawska')>Warszawska</option>
                            <option value="wrocławska"  @selected(old('diocese', $koordynator->diocese) == 'wrocławska')>Wrocławska</option>
                        </select>

                    </div>


                    <!-- Przyciski -->
                    <div class="flex items-center justify-between">
                        <a href="{{ route('koordynatorzy.index') }}"
                            class="px-4 py-2 text-slate-700 border border-slate-400 rounded-lg hover:bg-slate-200">
                            ⬅ Powrót
                        </a>

                        <button type="submit"
                                class="bg-blue-800 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow-md">
                            Zapisz
                        </button>
                    </div>

                </form>

            </div>

        </main>
    </div>
@endsection

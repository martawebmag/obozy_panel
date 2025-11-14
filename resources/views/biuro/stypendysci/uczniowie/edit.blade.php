@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex bg-slate-100 border-t-2 border-slate-300">

        @include('biuro.sidebar')

        <!-- ✅ Główna zawartość -->
        <main class="flex-1 p-10 bg-slate-50">

            <div class="min-h-screen bg-slate-100 py-10 px-6">
                <div class="max-w-6xl mx-auto bg-white shadow-md rounded-xl p-8 space-y-10 border border-slate-200">

                    <h1 class="text-2xl font-bold text-slate-800 border-b pb-3">📝 Edycja danych ucznia</h1>

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

                    <form action="{{ route('biuro.stypendysci.update', $stypendysta->id ?? '') }}" method="POST"
                        class="space-y-10">
                        @csrf
                        @method('PUT')

                        <!-- 🔹 DANE OSOBOWE -->
                        <section>
                            <h2 class="text-xl font-semibold text-slate-700 mb-4 border-b pb-1">Dane osobowe</h2>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <x-form.input-text name="imie" label="Imię" :value="$stypendysta->imie" />
                                <x-form.input-text name="nazwisko" label="Nazwisko" :value="$stypendysta->nazwisko" />
                                <x-form.input-text name="pesel" label="PESEL" :value="$stypendysta->pesel" />
                                <x-form.input-text name="data_urodzenia" type="date" label="Data urodzenia"
                                    :value="$stypendysta->data_urodzenia" />
                                <x-form.input-text name="email_dzielo" label="Email dzieło" :value="$stypendysta->email_dzielo" />
                                <x-form.input-text name="email_prywatny" label="Email prywatny" :value="$stypendysta->email_prywatny" />
                                <x-form.input-text name="telefon" label="Telefon" :value="$stypendysta->telefon" />
                                <x-form.select name="plec" label="Płeć" :options="['Kobieta' => 'Kobieta', 'Mężczyzna' => 'Mężczyzna']" :value="$stypendysta->plec" />
                            </div>
                        </section>

                        <!-- 🔹 ADRES -->
                        <section>
                            <h2 class="text-xl font-semibold text-slate-700 mb-4 border-b pb-1">Adres zamieszkania</h2>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <x-form.input-text name="ulica" label="Ulica" :value="$stypendysta->ulica" />
                                <x-form.input-text name="nr_domu" label="Nr domu" :value="$stypendysta->nr_domu" />
                                <x-form.input-text name="nr_mieszkania" label="Nr mieszkania" :value="$stypendysta->nr_mieszkania" />
                                <x-form.input-text name="kod_pocztowy" label="Kod pocztowy" :value="$stypendysta->kod_pocztowy" />
                                <x-form.input-text name="poczta" label="Poczta" :value="$stypendysta->poczta" />
                                <x-form.input-text name="miejscowosc" label="Miejscowość" :value="$stypendysta->miejscowosc" />
                                <x-form.input-text name="wojewodztwo" label="Województwo" :value="$stypendysta->wojewodztwo" />
                                <x-form.input-text name="diecezja" label="Diecezja" :value="$stypendysta->diecezja" />
                            </div>
                        </section>

                        <!-- 🔹 RODZICE / OPIEKUN -->
                        <section>
                            <h2 class="text-xl font-semibold text-slate-700 mb-4 border-b pb-1">Rodzice / Opiekun prawny
                            </h2>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <x-form.input-text name="imie_matki" label="Imię matki" :value="$stypendysta->imie_matki" />
                                <x-form.input-text name="nazwisko_matki" label="Nazwisko matki" :value="$stypendysta->nazwisko_matki" />
                                <x-form.input-text name="nazwisko_rodowe_matki" label="Nazwisko rodowe matki"
                                    :value="$stypendysta->nazwisko_rodowe_matki" />
                                <x-form.input-text name="telefon_matki" label="Telefon matki" :value="$stypendysta->telefon_matki" />
                                <x-form.input-text name="pesel_matki" label="PESEL matki" :value="$stypendysta->pesel_matki" />
                                <x-form.input-text name="email_matki" label="Email matki" :value="$stypendysta->email_matki" />
                                <x-form.checkbox name="matka_zmarla" label="Matka zmarła" :checked="$stypendysta->matka_zmarla" />

                                <x-form.input-text name="imie_ojca" label="Imię ojca" :value="$stypendysta->imie_ojca" />
                                <x-form.input-text name="nazwisko_ojca" label="Nazwisko ojca" :value="$stypendysta->nazwisko_ojca" />
                                <x-form.input-text name="telefon_ojca" label="Telefon ojca" :value="$stypendysta->telefon_ojca" />
                                <x-form.input-text name="pesel_ojca" label="PESEL ojca" :value="$stypendysta->pesel_ojca" />
                                <x-form.input-text name="email_ojca" label="Email ojca" :value="$stypendysta->email_ojca" />
                                <x-form.checkbox name="ojciec_zmarl" label="Ojciec zmarł" :checked="$stypendysta->ojciec_zmarl" />

                                <x-form.input-text name="imie_opiekuna_prawnego" label="Imię opiekuna" :value="$stypendysta->imie_opiekuna_prawnego" />
                                <x-form.input-text name="nazwisko_opiekuna_prawnego" label="Nazwisko opiekuna"
                                    :value="$stypendysta->nazwisko_opiekuna_prawnego" />
                                <x-form.input-text name="telefon_opiekuna_prawnego" label="Telefon opiekuna"
                                    :value="$stypendysta->telefon_opiekuna_prawnego" />
                                <x-form.input-text name="pesel_opiekuna_prawnego" label="PESEL opiekuna"
                                    :value="$stypendysta->pesel_opiekuna_prawnego" />
                                <x-form.input-text name="email_opiekuna_prawnego" label="Email opiekuna"
                                    :value="$stypendysta->email_opiekuna_prawnego" />
                                <x-form.input-text name="prawa_rodzicielskie" label="Prawa rodzicielskie"
                                    :value="$stypendysta->prawa_rodzicielskie" />
                                <x-form.text-area name="prawa_informacje" label="Informacje o prawach" :value="$stypendysta->prawa_informacje" />
                            </div>
                        </section>

                        <!-- 🔹 SZKOŁA -->
                        <section>
                            <h2 class="text-xl font-semibold text-slate-700 mb-4 border-b pb-1">Szkoła</h2>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <x-form.input-text name="szkola" label="Szkoła" :value="$stypendysta->szkola" />
                                <x-form.input-text name="klasa" label="Klasa" :value="$stypendysta->klasa" />
                            </div>
                        </section>

                        <!-- 🔹 ZDROWIE / DIETA -->
                        <section>
                            <h2 class="text-xl font-semibold text-slate-700 mb-4 border-b pb-1">Zdrowie i dieta</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <x-form.text-area name="zdrowie" label="Stan zdrowia" :value="$stypendysta->zdrowie" />
                                <x-form.select name="dieta" label="Dieta" :options="['brak' => 'Brak', 'wegetariańska' => 'Wegetariańska', 'inna' => 'Inna']" :value="$stypendysta->dieta" />
                                <x-form.input-text name="jakaDieta" label="Jaka dieta" :value="$stypendysta->jakaDieta" />
                                <x-form.text-area name="dietaInfo" label="Dodatkowe informacje o diecie"
                                    :value="$stypendysta->dietaInfo" />
                                <x-form.select name="tshirt" label="Rozmiar T-shirtu" :options="['XS' => 'XS', 'S' => 'S', 'M' => 'M', 'L' => 'L', 'XL' => 'XL']"
                                    :value="$stypendysta->tshirt" />
                                <x-form.text-area name="chor" label="Choroby" :value="$stypendysta->chor" />
                                <x-form.input-text name="instrument" label="Instrument" :value="$stypendysta->instrument" />
                                <x-form.text-area name="uwagi" label="Uwagi" :value="$stypendysta->uwagi" />
                                <x-form.input-text name="tezec" label="Tężec" :value="$stypendysta->tezec" />
                                <x-form.input-text name="blonica" label="Błonica" :value="$stypendysta->blonica" />
                                <x-form.input-text name="inne_szczepienia" label="Inne szczepienia" :value="$stypendysta->inne_szczepienia" />
                                <x-form.input-text name="data_przyjazdu" type="date" label="Data przyjazdu"
                                    :value="$stypendysta->data_przyjazdu" />
                                <x-form.input-text name="data_wyjazdu" type="date" label="Data wyjazdu"
                                    :value="$stypendysta->data_wyjazdu" />
                            </div>
                        </section>

                        <!-- 🔹 ZGODY -->
                        <section>
                            <h2 class="text-xl font-semibold text-slate-700 mb-4 border-b pb-1">Zgody i oświadczenia</h2>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <x-form.checkbox name="regulamin" label="Akceptuję regulamin" :checked="$stypendysta->regulamin" />
                                <x-form.checkbox name="szpital" label="Zgoda na leczenie szpitalne" :checked="$stypendysta->szpital" />
                                <x-form.checkbox name="informacje" label="Zgoda na przekazywanie informacji"
                                    :checked="$stypendysta->informacje" />
                                <x-form.checkbox name="elektronika" label="Zgoda na korzystanie z elektroniki"
                                    :checked="$stypendysta->elektronika" />
                                <x-form.checkbox name="rodo" label="Zgoda RODO" :checked="$stypendysta->rodo" />
                                <x-form.checkbox name="wizerunek" label="Zgoda na publikację wizerunku"
                                    :checked="$stypendysta->wizerunek" />
                                <x-form.checkbox name="ochrona_maloletnich" label="Zgoda – ochrona małoletnich"
                                    :checked="$stypendysta->ochrona_maloletnich" />
                            </div>
                        </section>

                        <!-- 🔹 PRZYCISK -->
                        <div class="pt-6 border-t">
                            <button type="submit"
                                class="bg-orange-600 hover:bg-orange-700 text-white font-semibold px-6 py-2 rounded-lg shadow">
                                💾 Zapisz zmiany
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </main>
    @endsection

<div class="p-8 bg-white rounded shadow-md">

<h1 class="text-xl font-bold text-slate-900 border-b pb-3"><i class="fa-solid fa-pen-to-square mr-2"></i> Edycja danych stypendysty</h1>

    <form wire:submit.prevent="save"
      class="bg-white p-8 rounded-md grid grid-cols-2 gap-10">

    {{-- SEK 1: Dane osobowe --}}
    <div class="col-span-2">
        <x-form.subtitle label="Dane osobowe"/>
        <div class="grid grid-cols-2 gap-6">
            <x-form.input-text name="imie" label="Imię" wire:model.defer="imie" required />
            <x-form.input-text name="nazwisko" label="Nazwisko" wire:model.defer="nazwisko" required />

            <x-form.input-text name="pesel" label="PESEL" wire:model.defer="pesel" required />
            <x-form.input-text name="data_urodzenia" type="date"
                               label="Data urodzenia" wire:model.defer="data_urodzenia" required />

            <x-form.input-text name="email_dzielo" label="Email (dzielo.pl)" wire:model.defer="email_dzielo" required />
            <x-form.input-text name="email_prywatny" label="Email prywatny" wire:model.defer="email_prywatny" required />

            <x-form.input-text name="telefon" label="Telefon" wire:model.defer="telefon" required />

            <x-form.select
                name="plec"
                label="Płeć"
                :options="[''=>'--wybierz--','Kobieta'=>'Kobieta','Mężczyzna'=>'Mężczyzna']"
                wire:model.defer="plec"
                required
            />

            <x-form.select
                name="wspolnota"
                label="Wspólnota akademicka"
                :options="[
                    '' => '--wybierz--',
                    'Białystok'=>'Białystok','Bydgoszcz'=>'Bydgoszcz','Gdańsk'=>'Gdańsk',
                    'Katowice'=>'Katowice','Kielce'=>'Kielce','Kraków'=>'Kraków',
                    'Lublin'=>'Lublin','Łódź'=>'Łódź','Olsztyn'=>'Olsztyn',
                    'Opole'=>'Opole','Poznań'=>'Poznań','Rzeszów'=>'Rzeszów',
                    'Szczecin'=>'Szczecin','Toruń'=>'Toruń','Warszawa'=>'Warszawa',
                    'Wrocław'=>'Wrocław','Student zagraniczny'=>'Student zagraniczny'
                ]"
                wire:model.defer="wspolnota"
                required
            />
        </div>
    </div>

    {{-- SEK 2: Adres --}}
    <div class="col-span-2">
        <x-form.subtitle label="Adres"/>
        <div class="grid grid-cols-2 gap-6">
            <x-form.input-text name="ulica" label="Ulica" wire:model.defer="ulica" />
            <x-form.input-text name="nr_domu" label="Nr domu" wire:model.defer="nr_domu" required />

            <x-form.input-text name="nr_mieszkania" label="Nr mieszkania" wire:model.defer="nr_mieszkania" />
            <x-form.input-text name="kod_pocztowy" label="Kod pocztowy" wire:model.defer="kod_pocztowy" required />

            <x-form.input-text name="poczta" label="Poczta" wire:model.defer="poczta" required />
            <x-form.input-text name="miejscowosc" label="Miejscowość" wire:model.defer="miejscowosc" required />
            <x-form.select name="diecezja" label="Diecezja" wire:model.defer="diecezja"
            :options="[
                            'białostocka'=>'białostocka',
                            'bielsko-żywiecka'=>'bielsko-żywiecka',
                            'bydgoska'=>'bydgoska',
                            'częstochowska'=>'częstochowska',
                            'drohiczyńska'=>'drohiczyńska',
                            'elbląska'=>'elbląska',
                            'ełcka'=>'ełcka',
                            'gdańska'=>'gdańska',
                            'gliwicka'=>'gliwicka',
                            'gnieznieńska'=>'gnieźnieńska',
                            'kaliska'=>'kaliska',
                            'katowicka'=>'katowicka',
                            'kielecka'=>'kielecka',
                            'koszalińsko-kołobrzeska'=>'koszalińsko-kołobrzeska',
                            'krakowska'=>'krakowska',
                            'legnicka'=>'legnicka',
                            'lubelska'=>'lubelska',
                            'łomżyńska'=>'łomżyńska',
                            'łowicka'=>'łowicka',
                            'łódzka'=>'łódzka',
                            'opolska'=>'opolska',
                            'ordynariat polowy'=>'ordynariat polowy',
                            'pelplińska'=>'pelplińska',
                            'płocka'=>'płocka',
                            'poznańska'=>'poznańska',
                            'przemyska'=>'przemyska',
                            'radomska'=>'radomska',
                            'rzeszowska'=>'rzeszowska',
                            'sandomierska'=>'sandomierska',
                            'siedlecka'=>'siedlecka',
                            'sosnowiecka'=>'sosnowiecka',
                            'szczecińsko-kamieńska'=>'szczecińsko-kamieńska',
                            'świdnicka'=>'świdnicka',
                            'tarnowska'=>'tarnowska',
                            'toruńska'=>'toruńska',
                            'warmińska'=>'warmińska',
                            'warszawska'=>'warszawska',
                            'warszawsko-praska'=>'warszawsko-praska',
                            'włocławska'=>'włocławska',
                            'wrocławska'=>'wrocławska',
                            'zamojsko-lubaczowska'=>'zamojsko-lubaczowska',
                            'zielonogórsko-gorzowska'=>'zielonogórsko-gorzowska'
                        ]" required/>
        </div>
    </div>

    {{-- SEK 3: Rodzice / Opiekun --}}
    <div class="col-span-2">
        <x-form.subtitle label="Osoba do kontaktu"/>
        <div class="grid grid-cols-2 gap-6">
            <x-form.input-text name="imie_opiekuna" label="Imię opiekuna" wire:model.defer="imie_opiekuna" required />
            <x-form.input-text name="nazwisko_opiekuna" label="Nazwisko opiekuna" wire:model.defer="nazwisko_opiekuna" required />

            <x-form.input-text name="telefon_opiekuna" label="Telefon opiekuna" wire:model.defer="telefon_opiekuna" required />
        </div>
    </div>

    {{-- SEK 4: Zdrowie i dieta --}}
    <div class="col-span-2">
        <x-form.subtitle label="Zdrowie i dieta"/>
        <div class="grid grid-cols-2 gap-6">

            <div class="col-span-2">
                <x-form.text-area name="zdrowie" label="Zdrowie" wire:model.defer="zdrowie" />
            </div>

            <x-form.select
                name="dieta"
                label="Dieta"
                :options="[''=>'--wybierz--','Tak'=>'Tak','Nie'=>'Nie']"
                wire:model="dieta"
            />

            @if($dieta === 'Tak')
                <x-form.input-text name="jaka_dieta" label="Jaka dieta?" wire:model.defer="jaka_dieta" required />
                <div class="col-span-2">
                    <x-form.text-area name="dieta_info" label="Informacje o diecie" wire:model.defer="dieta_info" />
                </div>
            @endif

        </div>
    </div>

    {{-- SEK 5: Obóz --}}
    <div class="col-span-2">
        <x-form.subtitle label="Obóz / Pozostałe informacje"/>
        <div class="grid grid-cols-2 gap-6">
            <x-form.select
                name="obrona"
                label="Czy przystępujesz w tym roku do obrony?"
                :options="[''=>'--wybierz--','Tak'=>'Tak','Nie'=>'Nie']"
                wire:model.defer="obrona"
            />

            <x-form.select
                name="sesja"
                label="Czy sesja pokrywa się z czasem obozu?"
                :options="[''=>'--wybierz--', 'Tak'=>'Tak','Nie'=>'Nie']"
                wire:model="sesja"
            />

            @if($sesja === 'Tak')
                <x-form.input-text name="koniecSesji" type="date" label="Kiedy kończysz sesję?" wire:model.defer="koniecSesji" />
            @endif

            <x-form.select
                name="tshirt"
                label="Rozmiar koszulki"
                :options="[''=>'--wybierz--','XS'=>'XS','S'=>'S','M'=>'M','L'=>'L','XL'=>'XL','XXL'=>'XXL','XXXL'=>'XXXL']"
                wire:model.defer="tshirt"
                required
            />

            <x-form.select
                name="chor"
                label="Czy chcesz śpiewać w chórze?"
                :options="[''=>'--wybierz--','Tak'=>'Tak','Nie'=>'Nie']"
                wire:model.defer="chor"
            />

            <x-form.input-text name="instrument" label="Gram na instrumencie" wire:model.defer="instrument" />

            <x-form.select
                name="posluga"
                label="Posługa liturgiczna"
                :options="[''=>'--wybierz--','Tak'=>'Tak','Nie'=>'Nie']"
                wire:model.defer="posluga"
            />

            <x-form.select
                name="medycyna"
                label="Czy jesteś studentem kierunku medycznego?"
                :options="[''=>'--wybierz--','Tak'=>'Tak','Nie'=>'Nie']"
                wire:model.defer="medycyna"
            />

            <div class="col-span-2">
                <x-form.text-area name="uwagi" label="Uwagi" wire:model.defer="uwagi" />
            </div>
        </div>
    </div>

    @if (session()->has('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- SEK 6: Przycisk --}}
    <div class="col-span-2 text-right">
        <button
            type="submit"
            class="bg-blue-800 hover:bg-blue-700 text-white px-8 py-3 rounded-md shadow-sm transition">
            <i class="fa-solid fa-floppy-disk mr-2"></i> Zapisz zmiany
        </button>
    </div>

</form>

</div>

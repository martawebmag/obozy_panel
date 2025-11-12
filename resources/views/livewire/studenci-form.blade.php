<div class="flex flex-col min-h-screen bg-slate-100">

    <!-- 🧭 Pasek breadcrumb -->
    <div class="bg-slate-400 border-b border-slate-300 shadow-sm">
        <div class="max-w-7xl mx-auto px-6 py-2 text-sm text-slate-700 flex items-center space-x-2">
            <a href="{{ route('welcome') }}" class="hover:text-blue-800 flex items-center gap-1">
                <i class="fas fa-house text-blue-800"></i>
                Strona główna
            </a>
            <span class="text-gray-600">››</span>
            <a href="{{ route('stypendysci.index') }}"><span class="text-slate-700">Stypendyści</span></a>
            <span class="text-gray-600">››</span>
            <span class="font-medium text-blue-900">Formularz</span>
        </div>
    </div>


<!-- 🔹 Nagłówek obozu (połączony wizualnie z formularzem) -->
<div class="max-w-6xl mx-auto mt-6 px-4 py-2 text-center">
    <h3 class="text-2xl md:text-3xl font-bold text-blue-900 tracking-tight flex items-center justify-center gap-3">
        <i class="fas fa-campground text-yellow-500"></i>
        Obóz dla studentów
    </h3>
    <p class="mt-4 text-gray-700 text-base md:text-md font-semibold">
        @if($oboz)
            <span class="text-blue-800">Termin:</span> {{ \Carbon\Carbon::parse($oboz->start_date)->translatedFormat('d F') }}
                    –
                    {{ \Carbon\Carbon::parse($oboz->end_date)->translatedFormat('d F Y') }}
            &nbsp;|&nbsp;
            <span class="text-blue-800">Miejsce:</span> {{ $oboz->miejsce }}
        @endif
    </p>
</div>


    <!-- 🧾 Główna zawartość z sidebar + formularzem jako jedna karta -->
    <div class="flex-1 px-4 md:px-10 py-6 flex justify-center">
        <div class="flex flex-col md:flex-row bg-white rounded-2xl shadow-xl border border-slate-300 w-full max-w-4xl overflow-hidden">

            <!-- 🔹 Sidebar -->
            <aside class="bg-slate-50 p-3 md:p-5 md:w-58 flex md:flex-col items-center md:items-start border-r border-slate-200">
                @php $titles = ['Dane osobowe','Adres','Osoba do kontaktu','Zdrowie', 'Informacje dodatkowe', 'Zgody']; @endphp

                <!-- Desktop: pionowo -->
                <div class="hidden md:flex relative flex-col items-center w-full">
                    <div class="absolute top-5 bottom-5 left-1/2 w-1 bg-slate-300 -z-10"></div>
                    <div class="absolute top-5 left-1/2 w-1 bg-blue-800 -z-10 transition-all duration-500"
                         style="height: calc(({{ $step - 1 }}/{{ count($titles)-1}}*100%))"></div>

                    @foreach($titles as $index => $title)
                        <div class="flex flex-col items-center relative z-10 mb-6">
                        <div class="w-5 h-5 flex items-center justify-center rounded-full p-3
                                    {{ $step > $index ? 'bg-blue-800 text-white' : 'bg-slate-200 text-slate-500' }}
                                    font-medium text-xs transition-all duration-300">
                            {{ $index + 1 }}
                        </div>
                            <div class="mt-2 text-xs text-center {{ $step == $index+1 ? 'text-blue-800 font-semibold' : 'text-slate-500' }}">
                                {{ $title }}
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Mobile: poziomo -->
                <div class="flex md:hidden w-full justify-between relative">
                    <div class="absolute top-1/2 left-0 right-0 h-1 bg-slate-400 -z-10"></div>
                    <div class="absolute top-1/2 left-0 h-1 bg-blue-800 -z-10 transition-all duration-500"
                         style="width: calc(({{ $step - 1 }}/{{ count($titles)-1}}*100%))"></div>

                    @foreach($titles as $index => $title)
                        <div class="flex flex-col items-center z-10">
                            <div class="w-8 h-8 flex items-center justify-center rounded-full
                                        {{ $step > $index ? 'bg-blue-800 text-white' : 'bg-slate-300 text-slate-500' }}
                                        font-semibold transition-all duration-300">
                                {{ $index + 1 }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </aside>

            <!-- 🔹 Formularz -->
          <div class="flex-1 p-6 flex flex-col bg-white">

                @if (session()->has('success'))
                    <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4 shadow-sm">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mb-6">
                    <h2 class="text-md md:text-lg text-blue-900 text-center md:text-left font-semibold">
                        {{ $titles[$step-1] }}
                    </h2>
                    <div class="mt-1 h-0.5 bg-blue-900 w-full rounded-full"></div>
                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-4 px-4">
                    @if($step==1)
                        <x-form.input-text name="imie" label="Imię" model="imie" class="bg-white rounded shadow-sm"/>
                        <x-form.input-text name="nazwisko" label="Nazwisko" model="nazwisko" class="bg-white rounded shadow-sm"/>
                        <x-form.input-text name="pesel" label="PESEL" model="pesel" class="bg-white rounded shadow-sm"/>
                        <x-form.input-text name="data_urodzenia" label="Data urodzenia" type="date" model="data_urodzenia" class="bg-white rounded shadow-sm"/>
                        <x-form.input-text name="email_dzielo" label="Email (dzielo.pl)" model="email_dzielo" class="bg-white rounded shadow-sm"/>
                        <x-form.input-text name="email_prywatny" label="Email (prywatny)" model="email_prywatny" class="bg-white rounded shadow-sm"/>
                        <x-form.input-text name="telefon" label="Telefon" model="telefon" class="bg-white rounded shadow-sm"/>
                        <x-form.select name="plec" label="Płeć" :options="['Kobieta'=>'Kobieta','Mężczyzna'=>'Mężczyzna']" model="plec" class="bg-white rounded shadow-sm"/>
                        <x-form.select name="wspolnota" label="Wspólnota akademicka" :options="['Białystok'=>'Białystok','Bydgoszcz'=>'Bydgoszcz','Gdańsk'=>'Gdańsk','Katowice'=>'Katowice', 'Kielce'=>'Kielce','Kraków'=>'Kraków']" model="wspolnota" class="bg-white rounded shadow-sm"/>
                    @elseif($step==2)
                        <x-form.input-text name="ulica" label="Ulica" model="ulica" class="bg-white rounded shadow-sm"/>
                        <x-form.input-text name="nr_domu" label="Nr domu" model="nr_domu" class="bg-white rounded shadow-sm"/>
                        <x-form.input-text name="nr_mieszkania" label="Nr mieszkania" model="nr_mieszkania" class="bg-white rounded shadow-sm"/>
                        <x-form.input-text name="kod_pocztowy" label="Kod pocztowy" model="kod_pocztowy" class="bg-white rounded shadow-sm"/>
                        <x-form.input-text name="poczta" label="Poczta" model="poczta" class="bg-white rounded shadow-sm"/>
                        <x-form.input-text name="miejscowosc" label="Miejscowość" model="miejscowosc" class="bg-white rounded shadow-sm"/>
                    @elseif($step==3)
                        <x-form.input-text name="imie_opiekuna" label="Imię" model="imie_opiekuna" class="bg-white rounded shadow-sm"/>
                        <x-form.input-text name="nazwisko_opiekuna" label="Nazwisko" model="nazwisko_opiekuna" class="bg-white rounded shadow-sm"/>
                        <x-form.input-text name="telefon_opiekuna" label="Telefon" model="telefon_opiekuna" class="bg-white rounded shadow-sm"/>
                    @elseif($step==4)
                    <x-form.input-text name="rok_obozu" label="Rok obozu" type="number" model="rok_obozu" class="bg-white rounded shadow-sm"/>
                        <x-form.text-area name="zdrowie" label="Zdrowie" model="zdrowie" class="md:col-span-2 bg-white rounded shadow-sm"/>
                        <x-form.select name="dieta" label="Dieta" :options="['Tak'=>'Tak','Nie'=>'Nie']" model="dieta" class="bg-white rounded shadow-sm"/>
                        @if($dieta=='Tak')
                        <x-form.input-text name="jakaDieta" label="Jaka dieta?" model="jakaDieta" class="bg-white rounded shadow-sm"/>
                        <x-form.text-area name="dietaInfo" label="Informacje o diecie (alergie, nietolerancje itp.)" model="dietaInfo" class="md:col-span-2 bg-white rounded shadow-sm"/>
                        @endif
                    @elseif($step==5)
                        <x-form.select name="obrona" label="Czy przystępujesz w tym roku do obrony pracy licencjackiej / magisterskiej /
                            inżynierskiej i termin obrony pokrywa się z czasem obozu?" :options="['Tak'=>'Tak','Nie'=>'Nie']" model="obrona" class="bg-white rounded shadow-sm"/>
                        <x-form.select name="sesja" label="Czy przewidywany termin sesji egzaminacyjnej na twojej uczelni pokrywa się z
                            czasem obozu?" :options="['Tak'=>'Tak','Nie'=>'Nie']" model="sesja" class="bg-white rounded shadow-sm"/>
                        @if($sesja=='Tak')
                            <x-form.input-text name="koniecSesji" label="Kiedy kończysz sesję?" type="date" model="koniecSesji" class="bg-white rounded shadow-sm"/>
                        @endif
                        <x-form.select name="tshirt" label="Rozmiar koszulki obozowej" :options="['S'=>'S','M'=>'M','L'=>'L','XL'=>'XL','XXL'=>'XXL']" model="tshirt" class="bg-white rounded shadow-sm"/>
                        <x-form.select name="chor" label="Czy chcesz zaangażować się w chór obozowy?" :options="['Tak'=>'Tak','Nie'=>'Nie']" model="chor" class="bg-white rounded shadow-sm"/>
                        <x-form.input-text name="instrument" label="Gram na instrumencie:" model="instrument" class="bg-white rounded shadow-sm    "/>
                        <x-form.select name="posluga" label="Czy chciałbyś zaangażować się w posługę liturgiczną podczas obozu?" :options="['Tak'=>'Tak','Nie'=>'Nie']" model="posluga" class="bg-white rounded shadow-sm"/>
                        <x-form.select name="medycyna" label="Czy jesteś studentem kierunku medycznego?" :options="['Tak'=>'Tak','Nie'=>'Nie']" model="medycyna" class="bg-white rounded shadow-sm"/>
                        <x-form.text-area name="uwagi" label="Uwagi" model="uwagi" class="md:col-span-2 bg-white rounded shadow-sm"/>
                    @elseif($step==6)
                        <x-form.checkbox name="regulamin" label="Regulamin" model="regulamin" class="bg-white rounded shadow-sm"/>
                        <x-form.checkbox name="rodo" label="RODO" model="rodo" class="bg-white rounded shadow-sm"/>
                        <x-form.checkbox name="wizerunek" label="Wizerunek" model="wizerunek" class="bg-white rounded shadow-sm"/>
                        <x-form.checkbox name="ochrona_maloletnich" label="Ochrona maloletnich" model="ochrona_maloletnich" class="bg-white rounded shadow-sm"/>
                    @endif
                </div>

                <div class="flex justify-between mt-6">
                    @if($step>1)
                        <button type="button" wire:click="prevStep" class="px-6 py-2 bg-gray-300 rounded hover:bg-gray-400 transition">Wstecz</button>
                    @endif
                    @if($step<6)
                        <button type="button" wire:click="nextStep" class="px-6 py-2 bg-blue-800 text-white rounded hover:bg-blue-900 transition">Dalej</button>
                    @else
                        <button type="button" wire:click="submit" class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">Wyślij</button>
                    @endif
                </div>
            </div>

        </div>
    </div>

</div>

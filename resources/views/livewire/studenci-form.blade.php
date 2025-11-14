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
                        style="height: calc(({{ $step - 1 }}/{{ count($titles) - 1 }}*100%))"></div>

                    @foreach ($titles as $index => $title)
                        @php
                            $thisStep = $index + 1;
                            $isClickable = $thisStep <= $step; // tylko do tyłu
                        @endphp

                        <div
                            @if($isClickable)
                                wire:click="goToStep({{ $thisStep }})"
                            @endif
                            class="flex flex-col items-center relative z-10 mb-6
                                {{ $isClickable ? 'cursor-pointer' : 'cursor-not-allowed pointer-events-none opacity-70' }}                           group">
                            <div
                                class="w-5 h-5 flex items-center justify-center rounded-full p-3
                                {{ $step > $index ? 'bg-blue-800 text-white' : 'bg-slate-200 text-slate-500' }}
                                group-hover:ring-2 ring-blue-400 font-medium text-xs transition-all duration-300">
                                {{ $thisStep }}
                            </div>

                            <div
                                class="mt-2 text-xs text-center
                                {{ $step == $thisStep ? 'text-blue-800 font-semibold' : 'text-slate-500 group-hover:text-blue-800' }}">
                                {{ $title }}
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Mobile: poziomo -->
                <div class="flex md:hidden w-full justify-between relative">
                    <div class="absolute top-1/2 left-0 right-0 h-1 bg-slate-400 -z-10"></div>
                    <div class="absolute top-1/2 left-0 h-1 bg-blue-800 -z-10 transition-all duration-500"
                        style="width: calc(({{ $step - 1 }}/{{ count($titles) - 1 }} * 100%))">
                    </div>

                    @foreach($titles as $index => $title)
                        @php
                            $thisStep = $index + 1;
                            $isClickable = $thisStep <= $step;
                        @endphp

                        <div
                            @if($isClickable)
                                wire:click="goToStep({{ $thisStep }})"
                            @endif
                            class="flex flex-col items-center z-10
                                {{ $isClickable ? 'cursor-pointer' : 'cursor-not-allowed pointer-events-none opacity-50' }}">
                            <div class="w-8 h-8 flex items-center justify-center rounded-full
                                        {{ $step > $index ? 'bg-blue-800 text-white' : 'bg-slate-300 text-slate-500' }}
                                        font-semibold transition-all duration-300">
                                {{ $thisStep }}
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
                    <h2 class="text-md md:text-lg text-blue-900 text-center md:text-left font-semibold bg-slate-200 px-2">
                        {{ $titles[$step-1] }}
                    </h2>
                    <div class="h-0.5 bg-blue-900 w-full rounded-full"></div>
                </div>


                <div class="grid grid-cols-1 gap-x-12 gap-y-4 px-4">
                    @if($step==1)
                        <x-form.input-text name="imie" label="Imię" model="imie" class="bg-white rounded shadow-sm" required="true"/>
                        <x-form.input-text name="nazwisko" label="Nazwisko" model="nazwisko" class="bg-white rounded shadow-sm" required="true"/>
                        <x-form.input-text name="pesel" label="PESEL" model="pesel" class="bg-white rounded shadow-sm" required="true"/>
                        <x-form.input-text name="data_urodzenia" label="Data urodzenia" type="date" model="data_urodzenia" class="bg-white rounded shadow-sm" required="true"/>
                        <x-form.input-text name="email_dzielo" label="Email (dzielo.pl)" model="email_dzielo" class="bg-white rounded shadow-sm" required="true"/>
                        <x-form.input-text name="email_prywatny" label="Email (prywatny)" model="email_prywatny" class="bg-white rounded shadow-sm" required="true"/>
                        <x-form.input-text name="telefon" label="Telefon" model="telefon" class="bg-white rounded shadow-sm" required="true"/>
                        <x-form.select name="plec" label="Płeć" :options="[''=>'--wybierz--','Kobieta'=>'Kobieta','Mężczyzna'=>'Mężczyzna']" model="plec" class="bg-white rounded shadow-sm" required="true"/>
                        <x-form.select name="wspolnota" label="Wspólnota akademicka" :options="[''=>'--wybierz--','Białystok'=>'Białystok','Bydgoszcz'=>'Bydgoszcz','Gdańsk'=>'Gdańsk','Katowice'=>'Katowice', 'Kielce'=>'Kielce','Kraków'=>'Kraków','Lublin'=>'Lublin','Łódź'=>'Łódź','Olsztyn'=>'Olsztyn','Opole'=>'Opole', 'Poznań'=>'Poznań','Rzeszów'=>'Rzeszów', 'Szczecin'=>'Szczecin','Toruń'=>'Toruń','Warszawa'=>'Warszawa','Wrocław'=>'Wrocław', 'Student zagraniczny'=>'Student zagraniczny']" model="wspolnota" class="bg-white rounded shadow-sm" required="true"/>
                    @elseif($step==2)
                        <x-form.input-text name="ulica" label="Ulica" model="ulica" class="bg-white rounded shadow-sm"/>
                        <x-form.input-text name="nr_domu" label="Nr domu" model="nr_domu" class="bg-white rounded shadow-sm" required="true"/>
                        <x-form.input-text name="nr_mieszkania" label="Nr mieszkania" model="nr_mieszkania" class="bg-white rounded shadow-sm"/>
                        <x-form.input-text name="kod_pocztowy" label="Kod pocztowy" model="kod_pocztowy" class="bg-white rounded shadow-sm" required="true"/>
                        <x-form.input-text name="poczta" label="Poczta" model="poczta" class="bg-white rounded shadow-sm" required="true"/>
                        <x-form.input-text name="miejscowosc" label="Miejscowość" model="miejscowosc" class="bg-white rounded shadow-sm" required="true"/>
                    @elseif($step==3)
                        <x-form.input-text name="imie_opiekuna" label="Imię" model="imie_opiekuna" class="bg-white rounded shadow-sm" required="true"/>
                        <x-form.input-text name="nazwisko_opiekuna" label="Nazwisko" model="nazwisko_opiekuna" class="bg-white rounded shadow-sm" required="true"/>
                        <x-form.input-text name="telefon_opiekuna" label="Telefon" model="telefon_opiekuna" class="bg-white rounded shadow-sm" required="true"/>
                    @elseif($step==4)
                        <x-form.text-area name="zdrowie" label="Zdrowie" model="zdrowie" class="md:col-span-2 bg-white rounded shadow-sm"/>
                        <x-form.select name="dieta" label="Dieta" :options="[''=>'--wybierz--', 'Tak'=>'Tak','Nie'=>'Nie']" model="dieta" class="bg-white rounded shadow-sm"/>
                        @if($dieta=='Tak')
                        <x-form.input-text name="jaka_dieta" label="Jaka dieta?" model="jaka_dieta" class="bg-white rounded shadow-sm" required="true"/>
                        <x-form.text-area name="dieta_info" label="Informacje o diecie (alergie, nietolerancje itp.)" model="dieta_info" class="md:col-span-2 bg-white rounded shadow-sm"/>
                        @endif

                    @elseif($step==5)
                        <x-form.select name="obrona" label="Czy przystępujesz w tym roku do obrony pracy licencjackiej / magisterskiej /
                            inżynierskiej i termin obrony pokrywa się z czasem obozu?" :options="[''=>'--wybierz--', 'Tak'=>'Tak','Nie'=>'Nie']" model="obrona" class="bg-white rounded shadow-sm"/>
                        <x-form.select name="sesja" label="Czy przewidywany termin sesji egzaminacyjnej na twojej uczelni pokrywa się z
                            czasem obozu?" :options="[''=>'--wybierz--', 'Tak'=>'Tak','Nie'=>'Nie']" model="sesja" class="bg-white rounded shadow-sm"/>
                        @if($sesja=='Tak')
                            <x-form.input-text name="koniecSesji" label="Kiedy kończysz sesję?" type="date" model="koniecSesji" class="bg-white rounded shadow-sm"/>
                        @endif
                        <x-form.select name="tshirt" label="Rozmiar koszulki obozowej" :options="[''=>'--wybierz--', 'XS'=>'XS', 'S'=>'S','M'=>'M','L'=>'L','XL'=>'XL','XXL'=>'XXL', 'XXXL'=>'XXXL']" model="tshirt" class="bg-white rounded shadow-sm" required="true"/>
                        <x-form.select name="chor" label="Czy chcesz zaangażować się w chór obozowy?" :options="[''=>'--wybierz--', 'Tak'=>'Tak','Nie'=>'Nie']" model="chor" class="bg-white rounded shadow-sm"/>
                        <x-form.input-text name="instrument" label="Gram na instrumencie:" model="instrument" class="bg-white rounded shadow-sm    "/>
                        <x-form.select name="posluga" label="Czy chciałbyś zaangażować się w posługę liturgiczną podczas obozu?" :options="[''=>'--wybierz--', 'Tak'=>'Tak','Nie'=>'Nie']" model="posluga" class="bg-white rounded shadow-sm"/>
                        <x-form.select name="medycyna" label="Czy jesteś studentem kierunku medycznego?" :options="[''=>'--wybierz--', 'Tak'=>'Tak','Nie'=>'Nie']" model="medycyna" class="bg-white rounded shadow-sm"/>
                        <x-form.text-area name="uwagi" label="Uwagi" model="uwagi" class="md:col-span-2 bg-white rounded shadow-sm"/>

                    @elseif($step==6)
                        <x-form.checkbox name="regulamin" label="Zapoznałem się z regulaminem obozu i akceptuję jego wymagania => Regulamin obozu" model="regulamin" class="bg-white rounded shadow-sm" required="true"/>
                        <x-form.checkbox name="rodo" label="Wyrażam zgodę na przetwarzanie moich danych osobowych przesłanych przy pomocy formularza dla potrzeb niezbędnych do uczestnictwa w obozach integracyjno-formacyjnych organizowanych przez Fundację 'Dzieło Nowego Tysiąclecia' zgodnie z dokumentem elektronicznym: KLAUZULA DO 'ZGŁOSZENIA NA OBÓZ FUNDACJI DZIEŁO NOWEGO TYSIĄCLECIA'" model="rodo" class="bg-white rounded shadow-sm" required="true"/>
                        <x-form.checkbox name="wizerunek" label="Wyrażam zgodę na przetwarzanie mojego wizerunku do celów związanych z promocją Fundacji 'Dzieło Nowego Tysiąclecia', co oznacza, że fotografie, filmy lub nagrania wykonane podczas obozu mogą być zamieszczone na stronie internetowej i mediach społeczościowych Fundacji lub wykorzystywane w jej materiałach promocyjnych" model="wizerunek" class="bg-white rounded shadow-sm" required="true"/>
                        <x-form.checkbox name="ochrona_maloletnich" label="Zapoznałem się z Polityką Ochrony Małoletnich Fundacji „Dzieło Nowego Tysiąclecia” - https://dzielo.pl/polityka-ochrony-maloletnich" model="ochrona_maloletnich" class="bg-white rounded shadow-sm" required="true"/>
                    @endif

                </div>
                    <p class="text-[15px] px-4 mt-4"><span class="text-red-500">*</span> pole wymagane</p>

                <div class="flex justify-between mt-6 px-4">

                    @if($step>1)
                        <button type="button" wire:click="prevStep" class="px-8 py-2 bg-gray-300 rounded hover:bg-gray-400 transition">Wstecz</button>
                    @endif
                    @if($step<6)

                        <button type="button" wire:click="nextStep" class="px-8 py-2 bg-blue-800 text-white rounded hover:bg-blue-900 transition">Dalej</button>
                    @else
                        <button type="button" wire:click="submit" class="px-8 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">Wyślij</button>
                    @endif
                </div>
            </div>

        </div>
    </div>

</div>

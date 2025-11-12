<div class="flex flex-col min-h-screen bg-slate-100">

    <!-- 🧭 Pasek breadcrumb -->
    <div class="bg-slate-400 border-b border-slate-300 shadow-sm">
        <div class="max-w-7xl mx-auto px-6 py-2 text-sm text-slate-700 flex items-center space-x-2">
            <a href="{{ route('welcome') }}" class="hover:text-blue-800 flex items-center gap-1">
                <i class="fas fa-house text-blue-800"></i>
                Strona główna
            </a>
            <span class="text-gray-600">››</span>
            <a href="{{ route('wolontariusze.index') }}"><span class="text-slate-700">Wolontariusze</span></a>
            <span class="text-gray-600">››</span>
            <span class="font-medium text-blue-900">Formularz</span>
        </div>
    </div>


    <!-- 🔹 Nagłówek obozu (połączony wizualnie z formularzem) -->
    <div class="max-w-6xl mx-auto mt-6 px-4 py-2 text-center">
        <h3 class="text-2xl md:text-3xl font-bold text-blue-900 tracking-tight flex items-center justify-center gap-3">
            <i class="fas fa-campground text-yellow-500"></i>
            Obóz uczniów
        </h3>
        <p class="mt-4 text-gray-700 text-base md:text-md font-semibold">
            @if ($obozUczniowie)
                <span class="text-blue-800">Termin:</span>
                {{ \Carbon\Carbon::parse($obozUczniowie->start_date)->translatedFormat('d F') }}
                –
                {{ \Carbon\Carbon::parse($obozUczniowie->end_date)->translatedFormat('d F Y') }}
                &nbsp;|&nbsp;
                <span class="text-blue-800">Miejsce:</span> {{ $obozUczniowie->miejsce }}
            @endif
        </p>
    </div>


    <!-- 🧾 Główna zawartość z sidebar + formularzem jako jedna karta -->
    <div class="flex-1 px-4 md:px-10 py-6 flex justify-center">
        <div
            class="flex flex-col md:flex-row bg-white rounded-2xl shadow-xl border border-slate-300 w-full max-w-4xl overflow-hidden">

            <!-- 🔹 Sidebar -->
            <aside
                class="bg-slate-50 p-3 md:p-5 md:w-58 flex md:flex-col items-center md:items-start border-r border-slate-200">
                @php $titles = ['Dane osobowe','Adres','Wolontariat','Praca/Zawód', 'Doświadczenie', 'Uwagi', 'Dokumenty', 'Zgody', 'Podziękowania']; @endphp

                <!-- Desktop: pionowo -->
                <div class="hidden md:flex relative flex-col items-center w-full">
                    <div class="absolute top-5 bottom-5 left-1/2 w-1 bg-slate-300 -z-10"></div>
                    <div class="absolute top-5 left-1/2 w-1 bg-blue-800 -z-10 transition-all duration-500"
                        style="height: calc(({{ $step - 1 }}/{{ count($titles) - 1 }}*100%))"></div>

                    @foreach ($titles as $index => $title)
                        <div wire:click="goToStep({{ $index + 1 }})"
                            class="flex flex-col items-center relative z-10 mb-6 cursor-pointer group">

                            <div
                                class="w-5 h-5 flex items-center justify-center rounded-full p-3
                {{ $step > $index ? 'bg-blue-800 text-white' : 'bg-slate-200 text-slate-500' }}
                group-hover:ring-2 ring-blue-400 font-medium text-xs transition-all duration-300">
                                {{ $index + 1 }}
                            </div>

                            <div
                                class="mt-2 text-xs text-center
                {{ $step == $index + 1 ? 'text-blue-800 font-semibold' : 'text-slate-500 group-hover:text-blue-800' }}">
                                {{ $title }}
                            </div>
                        </div>
                    @endforeach
                </div>


                <!-- Mobile: poziomo -->
                <div class="flex md:hidden w-full justify-between relative">
                    <div class="absolute top-1/2 left-0 right-0 h-1 bg-slate-400 -z-10"></div>
                    <div class="absolute top-1/2 left-0 h-1 bg-blue-800 -z-10 transition-all duration-500"
                        style="width: calc(({{ $step - 1 }}/{{ count($titles) - 1 }}*100%))"></div>

                    @foreach ($titles as $index => $title)
                        <div wire:click="goToStep({{ $index + 1 }})"
                            class="flex flex-col items-center z-10 cursor-pointer group">

                            <div
                                class="w-5 h-5 flex items-center justify-center rounded-full p-3
                {{ $step > $index ? 'bg-blue-800 text-white' : 'bg-slate-200 text-slate-500' }}
                group-hover:ring-2 ring-blue-400 font-medium text-xs transition-all duration-300">
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
                        {{ $titles[$step - 1] }}
                    </h2>
                    <div class="mt-1 h-0.5 bg-blue-900 w-full rounded-full"></div>
                </div>


                <div class="grid grid-cols-1 md:grid-cols-1 gap-x-12 gap-y-2 px-3">
                    @if ($step == 1)
                        <x-form.select name="tytul_zwrot" label="Tytuł" model="tytul_zwrot"
                            class="bg-white rounded shadow-sm" :options="[
                                'Pan' => 'Pan',
                                'Pani' => 'Pani',
                                'Ksiądz' => 'Ksiądz',
                                'Ojciec' => 'Ojciec',
                                'Kleryk' => 'Kleryk',
                                'Diakon' => 'Diakon',
                                'Siostra' => 'Siostra',
                                'Brat' => 'Brat',
                            ]" />
                        <x-form.input-text name="imie" label="Imię" model="imie"
                            class="bg-white rounded shadow-sm" />
                        <x-form.input-text name="imie_zakonne" label="Imię zakonne (jeżeli inne niż w dokumentach)"
                            model="imie_zakonne" class="bg-white rounded shadow-sm" />
                        <x-form.input-text name="nazwisko" label="Nazwisko" model="nazwisko"
                            class="bg-white rounded shadow-sm" />
                        <x-form.input-text name="nazwisko_rodowe" label="Nazwisko rodowe" model="nazwisko_rodowe"
                            class="bg-white rounded shadow-sm" />
                        <x-form.input-text name="imie_matki" label="Imię matki" model="imie_matki"
                            class="bg-white rounded shadow-sm" />
                        <x-form.input-text name="imie_ojca" label="Imię ojca" model="imie_ojca"
                            class="bg-white rounded shadow-sm" />
                        <x-form.input-text name="nazwisko_rodowe_matki" label="Nazwisko rodowe matki"
                            model="nazwisko_rodowe_matki" class="bg-white rounded shadow-sm" />
                        <x-form.input-text name="pesel" label="PESEL" model="pesel"
                            class="bg-white rounded shadow-sm" />
                        <x-form.input-text name="data_urodzenia" label="Data urodzenia" type="date"
                            model="data_urodzenia" class="bg-white rounded shadow-sm" />
                        <x-form.input-text name="email" label="Email" model="email"
                            class="bg-white rounded shadow-sm" />
                        <x-form.input-text name="telefon" label="Telefon" model="telefon"
                            class="bg-white rounded shadow-sm" />
                        <x-form.select name="plec" label="Płeć" :options="['' => '---', 'K' => 'Kobieta', 'M' => 'Mężczyzna']" model="plec"
                            class="bg-white rounded shadow-sm" />
                    @elseif($step == 2)
                        <x-form.input-text name="ulica" label="Ulica" model="ulica"
                            class="bg-white rounded shadow-sm" />
                        <x-form.input-text name="nr_domu" label="Nr domu" model="nr_domu"
                            class="bg-white rounded shadow-sm" />
                        <x-form.input-text name="nr_mieszkania" label="Nr mieszkania" model="nr_mieszkania"
                            class="bg-white rounded shadow-sm" />
                        <x-form.input-text name="kod_pocztowy" label="Kod pocztowy" model="kod_pocztowy"
                            class="bg-white rounded shadow-sm" />
                        <x-form.input-text name="poczta" label="Poczta" model="poczta"
                            class="bg-white rounded shadow-sm" />
                        <x-form.input-text name="miejscowosc" label="Miejscowość" model="miejscowosc"
                            class="bg-white rounded shadow-sm" />
                        <div class="mt-6">
                            <label class="inline-flex items-center space-x-2 text-slate-700 text-xs">
                                <input type="checkbox" wire:model.live="use_other_address"
                                    class="w-4 h-4 text-blue-500 rounded">
                                <span>Adres korespondencyjny (jeżeli inny niż zamieszkania)</span>
                            </label>
                        </div>

                        @if ($use_other_address)
                            <br>
                            <x-form.input-text name="ulica_koresp" label="Ulica" model="ulica_koresp"
                                class="bg-white rounded shadow-sm" />
                            <x-form.input-text name="numer_domu_koresp" label="Nr domu" model="numer_domu_koresp"
                                class="bg-white rounded shadow-sm" />
                            <x-form.input-text name="numer_mieszkania_koresp" label="Nr mieszkania"
                                model="numer_mieszkania_koresp" class="bg-white rounded shadow-sm" />
                            <x-form.input-text name="kod_pocztowy_koresp" label="Kod pocztowy"
                                model="kod_pocztowy_koresp" class="bg-white rounded shadow-sm" />
                            <x-form.input-text name="poczta_koresp" label="Poczta" model="poczta_koresp"
                                class="bg-white rounded shadow-sm" />
                            <x-form.input-text name="miejscowosc_koresp" label="Miejscowość"
                                model="miejscowosc_koresp" class="bg-white rounded shadow-sm" />
                        @endif
                    @elseif($step == 3)
                        <x-form.select name="rodzaj_wolontariatu" label="Rodzaj wolontariatu"
                            model="rodzaj_wolontariatu" class="bg-white rounded shadow-sm" :options="[
                                '' => '---',
                                'Kierownik' => 'Kierownik',
                                'Duszpasterz' => 'Duszpasterz',
                                'Wychowawca' => 'Wychowawca',
                                'Wolontariusz medyczny' => 'Wolontariusz medyczny',
                                'Wolontariusz specjalny' => 'Wolontariusz specjalny',
                                'Wolontariusz muzyczny' => 'Wolontariusz muzyczny',
                                'Biuro prasowe' => 'Biuro prasowe',
                                'Biuro obozu - sekretariat' => 'Biuro obozu - sekretariat',
                                'Biuro obozu - logistyka' => 'Biuro obozu - logistyka',
                                'Biuro obozu - księgowość' => 'Biuro obozu - księgowość',
                                'Biuro obozu - dzień sportu' => 'Biuro obozu - dzień sportu',
                                'Biuro obozu - liturgia' => 'Biuro obozu - liturgia',
                                'Inne' => 'Inne',
                            ]" />
                        <x-form.text-area name="preferencje"
                            label="Wpisz osoby, z którymi chiałbyś/abyś podjąć posługę wolontariusza
                            (kierownik, duszpasterz, inni wychowawcy i wolontariusze). UWAGA! Propozycje nie są wiążące
                            dla organizatorów obozów"
                            model="preferencje" class="md:col-span-2 bg-white rounded shadow-sm" />
                    @elseif($step == 4)
                        <x-form.select name="stypendysta_status"
                            label="Czy jestem stypendystą(tką) Fundacji Dzieło Nowego
                            Tysiąclecia:"
                            :options="[
                                '' => '---',
                                'jestem' => 'jestem',
                                'byłem' => 'byłem',
                                'nie jestem i nie byłem' => 'nie jestem i nie byłem',
                            ]" model="stypendysta_status" class="bg-white rounded shadow-sm" />

                        <div x-data="{ status: '' }" class="space-y-4">
                            <x-form.select name="status_wolontariusza" label="Student / maturzysta / osoba pracująca:"
                                :options="[
                                    '' => '---',
                                    'Student' => 'Student',
                                    'Maturzysta' => 'Maturzysta',
                                    'Osoba pracująca' => 'Osoba pracująca',
                                ]" model="status_wolontariusza" class="bg-white rounded shadow-sm"
                                x-model="status" />

                            <div x-show="status === 'Student'" x-transition>
                                <x-form.input-text name="wspolnota" label="Wspólnota akademicka" model="wspolnota"
                                    class="bg-white rounded shadow-sm" />
                                <x-form.input-text name="nazwa_uczelni" label="Nazwa uczelni" model="nazwa_uczelni"
                                    class="bg-white rounded shadow-sm" />
                                <x-form.input-text name="kierunek" label="Kierunek studiów" model="kierunek"
                                    class="bg-white rounded shadow-sm" />
                            </div>

                            <div x-show="status === 'Osoba pracująca'" x-transition>
                                <x-form.input-text name="miejsce_zatrudnienia" label="Miejsce zatrudnienia/posługi"
                                    model="miejsce_zatrudnienia" class="bg-white rounded shadow-sm" />
                                <x-form.input-text name="zawod_posluga" label="Zawód/posługa" model="zawod_posluga"
                                    class="bg-white rounded shadow-sm" />
                            </div>
                        </div>
                    @elseif($step == 5)
                        <x-form.select name="doswiadczenie"
                            label="Posługa na obozie Fundacji Dzieło Nowego Tysiąclecia jako
                            wolontariusz:"
                            :options="['' => '---', 'pierwszy raz' => 'pierwszy raz', 'kolejny raz' => 'kolejny raz']" model="doswiadczenie" class="bg-white rounded shadow-sm" />
                        <x-form.text-area name="doswiadczenie_opis"
                            label="Doświadczenie w zakresie pełnionego wolontariatu (np. kierownik,
                            wychowawca, doświadczenie w pracy z młodzieżą, doświadczenie medyczne, kwalifikacje
                            muzyczne, inne):"
                            model="doswiadczenie_opis" class="md:col-span-2 bg-white rounded shadow-sm" />
                    @elseif($step == 6)
                        <x-form.text-area name="uwagi_zdrowie"
                            label="Informacje o stanie zdrowia (choroby przewlekłe, na co aktualnie się
                            leczysz, uczuleniach, znoszeniu jazdy samochodem, przyjmowanych lekach, zabiegach lub
                            operacjach w ciągu ostatniego roku, ogólnym stanie zdrowia w ciągu ostatniego roku)"
                            model="uwagi_zdrowie" class="md:col-span-2 bg-white rounded shadow-sm" />

                        <div x-data="{ dieta: '' }" class="space-y-4">
                            <x-form.select name="dieta" label="Specjalistyczna dieta:" :options="['' => '---', 'tak' => 'Tak', 'nie' => 'Nie']"
                                model="dieta" class="bg-white rounded shadow-sm" x-model="dieta" />

                            <div x-show="dieta === 'tak'" x-transition>
                                <x-form.input-text name="jaka_dieta" label="Jaka to dieta?" model="jaka_dieta"
                                    class="bg-white rounded shadow-sm" />
                                <x-form.text-area name="dieta_info"
                                    label="W przypadku bardziej skomplikowanych diet (poza
                                    wegetariańską, bez laktozy, bez glutenu) proszę o poddanie przykładowych posiłków."
                                    model="dieta_info" class="md:col-span-2 bg-white rounded shadow-sm" />
                            </div>
                        </div>

                        <x-form.select name="tshirt" label="Rozmiar koszulki" :options="[
                            '' => '---',
                            'XS' => 'XS',
                            'S' => 'S',
                            'M' => 'M',
                            'L' => 'L',
                            'XL' => 'XL',
                            'XXL' => 'XXL',
                            'XXXL' => 'XXXL',
                        ]" model="tshirt"
                            class="bg-white rounded shadow-sm" />
                        <x-form.select name="chor" label="Chcę zaangażować się w chór obozowy:" model="chor"
                            class="bg-white rounded shadow-sm" :options="['' => '---', 'tak' => 'Tak', 'nie' => 'Nie']" />
                        <x-form.input-text name="instrument" label="Gram na instrumencie:" model="instrument"
                            class="bg-white rounded shadow-sm" />
                    @elseif($step == 7)
                        <x-form.text-area name="dodatkowe_info"
                            label="UWAGI (np. termin planowanego kursu wychowawcy; znajomość języka
                        ukraińskiego lub rosyjskiego; znajomość języka migowego; praca z osobami niedowidzącymi; dodatkowe kursy i szkolenia, które można wykorzystać podczas obozu)"
                            model="dodatkowe_info" class="md:col-span-2 bg-white rounded shadow-sm" />

                        <p class="text-xs">W tym miejscu <b>załącz skany</b> wszystkich wymaganych dokumentów
                            dla wolontariuszy (Wytyczne zostały przesłane jako załącznik do wiadomości mailowej z
                            zaproszeniem do posługi w trakcie obozu lub znajdziesz je pod linkiem: <a
                                href="../../zalaczniki/wymagania_wolontariusze.docx">Wymagania dla wolontariuszy na
                                obozach
                                Fundacji "Dzieło Nowego Tysiąclecia"</a>) - czyli: kurs wychowawcy; kurs kierownika; w
                            przypadku nauczycieli - zaświadczenie o zatrudnieniu, oświadczenie o niekaralnosci, badania
                            lekarskie ze szkoły; w przypadku wolontariusza medycznego - skan dyplomu, zaświadczenie o
                            byciu
                            studentem kierunku medycznego, zaświadczenie o ukończeniu kursu pierwszej pomocy
                            przedmedycznej,
                            zaświadczenie o byciu ratownikiem medycznym. </p>

                        <p>Wybierz sposób wysłania wymaganych dokumentów:</p>
                        <x-form.checkbox name="dokumenty_zalaczone" label="Załączam plik przez formularz"
                            model="dokumenty_zalaczone" class="bg-white rounded shadow-sm"
                            wire:model.live="dokumenty_zalaczone" />
                        @if ($dokumenty_zalaczone)
                            <br>
                            <x-form.file name="file" label="Załącz plik" model="file"
                                class="bg-white rounded shadow-sm" />
                        @endif

                        <x-form.checkbox name="dokumenty_wyslane_mailem"
                            label="Wysyłam dokumenty bezpośrednio na wolontariat@dzielo.pl"
                            model="dokumenty_wyslane_mailem" class="bg-white rounded shadow-sm" />
                        <x-form.checkbox name="dokumenty_beda_doslane"
                            label="Nie mam jeszcze wszystkich dokumentów, wyślę je później na adres: wolontariat@dzielo.pl"
                            model="dokumenty_beda_doslane" class="bg-white rounded shadow-sm" />
                    @elseif($step == 8)
                        <x-form.checkbox name="elektronika"
                            label="Niniejszym oświadczam, że ponoszę wszelką odpowiedzialność za wszystkie sprzęty i urządzenia elektroniczne przywiezione przeze mnie na obóz."
                            model="elektronika" class="bg-white rounded shadow-sm" />
                        <x-form.checkbox name="rodo"
                            label="Wyrażam zgodę na przetwarzanie moich danych osobowych przesłanych przy pomocy formularza dla potrzeb niezbędnych do uczestnictwa w obozach integracyjno-formacyjnych organizowanych przez Fundację 'Dzieło Nowego Tysiąclecia' zgodnie z dokumentem elektronicznym: KLAUZULA DO 'ZGŁOSZENIA NA OBÓZ FUNDACJI DZIEŁO NOWEGO TYSIACLECIA"
                            model="rodo" class="bg-white rounded shadow-sm" />
                        <x-form.checkbox name="wizerunek"
                            label="Wyrażam zgodę na przetwarzanie mojego wizerunku do celów związanych z promocją Fundacji 'Dzieło Nowego Tysiąclecia', co oznacza, że fotografie, filmy lub nagrania wykonane podczas obozu mogą być zamieszczone na stronie internetowej i mediach społeczościowych Fundacji lub wykorzystywane w jej materiałach promocyjnych."
                            model="wizerunek" class="bg-white rounded shadow-sm" />
                        <x-form.checkbox name="ochrona_maloletnich"
                            label="Zapoznałem się z Polityką Ochrony Małoletnich Fundacji „Dzieło Nowego Tysiąclecia” - https://dzielo.pl/polityka-ochrony-maloletnich"
                            model="ochrona_maloletnich" class="bg-white rounded shadow-sm" />
                    @elseif($step == 9)
                        <h4>Wypełniają osoby duchowne i konsekrowane</h4>
                        <h5>Podziękowania dla przełożonych księży, kleryków i sióstr zakonnych</h5>
                        <p>Jak co roku pragniemy wyrazić pisemne podziękowania dla przełożonych
                            księży, kleryków i sióstr posługujących na obozach wakacyjnych Fundacji "Dzieło Nowego
                            Tysiąclecia". <br>
                            Prosimy o wskazanie osoby, do której mamy skierować podziękowania.
                        </p>
                        <x-form.input-text name="zwrot" label="Zwrot" model="zwrot"
                            class="bg-white rounded shadow-sm" />
                        <x-form.input-text name="imie_przelozonego" label="Imię" model="imie_przelozonego"
                            class="bg-white rounded shadow-sm" />
                        <x-form.input-text name="nazwisko_przelozonego" label="Nazwisko"
                            model="nazwisko_przelozonego" class="bg-white rounded shadow-sm"/>
                        <x-form.input-text name="diecezja_przelozonego" label="Zgomadzenie / Diecezja"
                                model="diecezja_przelozonego" class="bg-white rounded shadow-sm" />
                        <x-form.input-text name="email_przelozonego" label="Email" model="email_przelozonego"
                                class="bg-white rounded shadow-sm"/>
                                <br>
                        <x-form.input-text name="ulica_przelozonego" label="Ulica"
                                    model="ulica_przelozonego" class="bg-white rounded shadow-sm" />
                        <x-form.input-text name="numer_domu_przelozonego" label="Numer domu"
                                    model="numer_domu_przelozonego" class="bg-white rounded shadow-sm" />
                        <x-form.input-text name="numer_mieszkania_przelozonego" label="Numer mieszkania"
                                    model="numer_mieszkania_przelozonego" class="bg-white rounded shadow-sm" />
                        <x-form.input-text name="kod_pocztowy_przelozonego" label="Kod pocztowy"
                                    model="kod_pocztowy_przelozonego" class="bg-white rounded shadow-sm" />
                        <x-form.input-text name="poczta_przelozonego" label="Poczta"
                                    model="poczta_przelozonego" class="bg-white rounded shadow-sm" />
                        <x-form.input-text name="miejscowosc_przelozonego" label="Miejscowość"
                                    model="miejscowosc_przelozonego" class="bg-white rounded shadow-sm" />
                    @endif
                </div>

                <div class="flex justify-between mt-6">
                    @if ($step > 1)
                        <button type="button" wire:click="prevStep"
                            class="px-6 py-2 bg-gray-300 rounded hover:bg-gray-400 transition">Wstecz</button>
                    @endif
                    @if ($step < 9)
                        <button type="button" wire:click="nextStep"
                            class="px-6 py-2 bg-blue-800 text-white rounded hover:bg-blue-900 transition">Dalej</button>
                    @else
                        <button type="button" wire:click="submit"
                            class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">Wyślij</button>
                    @endif
                </div>
            </div>

        </div>
    </div>

</div>

@extends('layouts.guest')

@section('content')
<div class="min-h-screen bg-slate-100 text-slate-800 font-sans">

    <!-- 🧭 Pasek nawigacyjny -->
    <div class="bg-slate-400 border-b border-gray-300">
        <div class="max-w-7xl mx-auto px-6 py-2 text-sm text-gray-700 flex items-center space-x-2">
            <a href="{{ route('welcome') }}" class="hover:text-blue-800 flex items-center gap-1">
                <i class="fas fa-house text-blue-800"></i>
                <span>Strona główna</span>
            </a>
            <span class="text-gray-600">››</span>
            <span class="font-medium text-blue-900">Wolontariusze</span>
        </div>
    </div>

    <!-- 🧾 SEKCJA GŁÓWNA -->
    <section class="py-14 flex grow">
        <div class="max-w-6xl mx-auto px-4">

            <!-- Nagłówek -->
            <header class="text-center mb-12">
                <h1 class="text-4xl font-bold text-blue-950 mb-3 tracking-tight">
                    Wolontariusze
                </h1>
                <p class="text-base text-gray-600 max-w-xl mx-auto leading-relaxed">
                    Wybierz odpowiedni formularz i zgłoś się na obóz.
                </p>
            </header>

            <!-- 📋 KARTY -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- ✅ KAFEL 1 – OBÓZ UCZNIOWSKI -->
                <div class="group bg-white border border-blue-200 hover:border-blue-300 shadow-md hover:shadow-lg
                            transition-all duration-300 rounded-xl p-6 flex flex-col items-center text-center">

                    <h3 class="text-2xl font-bold text-blue-900 mb-3">
                        Obóz uczniowski
                    </h3>

                    <p class="text-gray-600 mb-6 leading-relaxed text-xs">
                        Zgłoś się jako wolontariusz na obóz uczniów.
                    </p>

                <div class="text-sm text-gray-700 mb-8 space-y-1 text-start">
                    @if($obozUczniowie)
                        <p>
                            <span class="font-semibold text-blue-900">Termin obozu:</span>
                            {{ \Carbon\Carbon::parse($obozUczniowie->start_date)->translatedFormat('d F') }}
                            –
                            {{ \Carbon\Carbon::parse($obozUczniowie->end_date)->translatedFormat('d F Y') }}
                        </p>
                        <p>
                            <span class="font-semibold text-blue-900">Miejsce obozu:</span>
                            {{ $obozUczniowie->miejsce }}
                        </p>
                    @else
                        <p>Brak informacji o obozie.</p>
                    @endif
                </div>

                    <div class="flex flex-col w-full">
                        <a href="{{ route('wolontariusze.uczniowie') }}"
                           class="px-6 py-2 rounded-lg text-white font-semibold
                                  bg-green-700 hover:bg-green-800 hover:scale-[1.03]
                                  shadow-md transition-all duration-200 text-sm">
                                   <i class="fa-solid fa-file-circle-plus mr-2"></i>
                            Zgłoszenie
                        </a>
                    </div>
                </div>


                <!-- ✅ KAFEL 2 – OBÓZ MATURZYSTÓW -->
                <div class="group bg-white border border-blue-200 hover:border-blue-300 shadow-md hover:shadow-lg
                            transition-all duration-300 rounded-xl p-6 flex flex-col items-center text-center">

                    <h3 class="text-2xl font-bold text-blue-900 mb-3">
                        Obóz maturzystów
                    </h3>

                    <p class="text-gray-600 mb-6 leading-relaxed text-xs">
                        Pomóż maturzystom w przygotowaniach i zajęciach.
                    </p>

                    <div class="text-sm text-gray-700 mb-6 space-y-1 text-start">
                        <p><span class="font-semibold text-blue-900">Termin obozu:</span> 5–15 lipca 2026</p>
                        <p><span class="font-semibold text-blue-900">Miejsce obozu:</span> Częstochowa</p>
                    </div>

                    <div class="flex flex-col w-full">
                        <a href="#"
                           class="px-6 py-2 rounded-lg text-white font-semibold
                                  bg-green-700 hover:bg-green-800 hover:scale-[1.03]
                                  shadow-md transition-all duration-200 text-sm">
                                   <i class="fa-solid fa-file-circle-plus mr-2"></i>
                            Zgłoszenie
                        </a>
                    </div>
                </div>


                <!-- ✅ KAFEL 3 – OBÓZ STUDENCKI -->
                <div class="group bg-white border border-blue-200 hover:border-blue-300 shadow-md hover:shadow-lg
                            transition-all duration-300 rounded-xl p-6 flex flex-col items-center text-center">

                    <h3 class="text-2xl font-bold text-blue-900 mb-3">
                        Obóz studencki
                    </h3>

                    <p class="text-gray-600 mb-6 leading-relaxed text-xs">
                        Wsparcie dla studentów podczas letniego obozu.
                    </p>

                    <div class="text-sm text-gray-700 mb-6 space-y-1 text-start">
                        <p><span class="font-semibold text-blue-900">Termin obozu:</span> 5–15 sierpnia 2026</p>
                        <p><span class="font-semibold text-blue-900">Miejsce obozu:</span> Białka Tatrzańska</p>
                    </div>

                    <div class="flex flex-col w-full">
                        <a href="#"
                           class="px-6 py-2 rounded-lg text-white font-semibold
                                  bg-green-700 hover:bg-green-800 hover:scale-[1.03]
                                  shadow-md transition-all duration-200 text-sm">
                                   <i class="fa-solid fa-file-circle-plus mr-2"></i>
                            Zgłoszenie
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </section>
</div>
@endsection

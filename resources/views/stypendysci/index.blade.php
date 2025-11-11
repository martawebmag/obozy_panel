@extends('layouts.guest')

@section('content')
<div class="min-h-screen bg-slate-100 text-slate-800 font-sans">

    <!-- 🧭 Pasek nawigacyjny -->
    <div class="bg-slate-300 border-b border-gray-300">
        <div class="max-w-7xl mx-auto px-6 py-2 text-sm text-gray-700 flex items-center space-x-2">
            <a href="{{ route('welcome') }}" class="hover:text-blue-800 flex items-center gap-1">
                <i class="fas fa-house text-blue-800"></i>
                <span>Strona główna</span>
            </a>
            <span class="text-gray-400">››</span>
            <span class="font-medium text-blue-900">Stypendyści</span>
        </div>
    </div>

    <!-- 🧾 SEKCJA GŁÓWNA -->
    <section class="py-14 flex grow">
        <div class="max-w-6xl mx-auto px-4">

            <!-- Nagłówek -->
            <header class="text-center mb-12">
                <h1 class="text-4xl font-bold text-blue-950 mb-3 tracking-tight">
                    Stypendysto!
                </h1>
                <p class="text-base text-gray-600 max-w-xl mx-auto leading-relaxed">
                    Wybierz odpowiedni formularz, aby zapisać się na obóz wakacyjny.
                </p>
            </header>

<!-- 📋 KARTY -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <!-- ✅ KAFEL 1 – UCZNIOWIE -->
    <div class="group bg-white border border-blue-200 hover:border-blue-300 shadow-md hover:shadow-lg
                transition-all duration-300 rounded-xl p-6 flex flex-col items-center text-center">

        <h3 class="text-3xl font-bold text-blue-900 mb-3">
            Uczniowie
        </h3>
        <div class="h-1 w-24 bg-yellow-400 mb-6"></div>

        <p class="text-gray-600 mb-6 leading-relaxed text-xs">
            Zapisz się na obóz dla uczniów szkół podstawowych i średnich.
        </p>

        <!-- ✅ NOWE — INFORMACJE -->
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

        <div class="flex flex-col space-y-3 w-full">

            <a href="{{ route('stypendysci.uczniowie') }}"
               class="px-6 py-2 rounded-lg text-white font-semibold
                      bg-blue-900 hover:bg-blue-800 hover:scale-[1.03]
                      shadow-md transition-all duration-200 text-sm">
                      <i class="fa-solid fa-file-circle-plus mr-2"></i>
                Zgłoszenie
            </a>

            <a href="#"
               class="px-6 py-2 rounded-lg text-blue-900 font-semibold border border-yellow-400
                      bg-yellow-200 hover:bg-yellow-300 hover:scale-[1.03]
                      shadow-md transition-all duration-200 text-sm">
                       <i class="fa-solid fa-file-pen mr-2"></i>
                Usprawiedliwienie
            </a>

        </div>
    </div>



    <!-- ✅ KAFEL 2 – MATURZYŚCI -->
    <div class="group bg-white border border-blue-200 hover:border-blue-300 shadow-md hover:shadow-lg
                transition-all duration-300 rounded-xl p-6 flex flex-col items-center text-center">

        <h3 class="text-3xl font-bold text-blue-900 mb-3">
            Maturzyści
        </h3>
        <div class="h-1 w-24 bg-yellow-400 mb-6"></div>

        <p class="text-gray-600 mb-6 leading-relaxed text-xs">
            Dołącz do spotkania przygotowującego do nowych wyzwań po maturze.
        </p>

        <!-- ✅ NOWE — INFORMACJE -->
        <div class="text-sm text-gray-700 mb-8 space-y-1 text-start">
            @if($obozMaturzysci)
                <p>
                    <span class="font-semibold text-blue-900">Termin obozu:</span>
                    {{ \Carbon\Carbon::parse($obozMaturzysci->start_date)->translatedFormat('d F') }}
                    –
                    {{ \Carbon\Carbon::parse($obozMaturzysci->end_date)->translatedFormat('d F Y') }}
                </p>
                <p>
                    <span class="font-semibold text-blue-900">Miejsce obozu:</span>
                    {{ $obozMaturzysci->miejsce }}
                </p>
            @else
                <p>Brak informacji o obozie.</p>
            @endif
        </div>

        <div class="flex flex-col space-y-3 w-full">

            <a href="#"
               class="px-6 py-2 rounded-lg text-white font-semibold
                      bg-blue-900 hover:bg-blue-800 hover:scale-[1.03]
                      shadow-md transition-all duration-200 text-sm">
                      <i class="fa-solid fa-file-circle-plus mr-2"></i>
                Zgłoszenie
            </a>

            <a href="#"
               class="px-6 py-2 rounded-lg text-blue-900 font-semibold border border-yellow-400
                      bg-yellow-200 hover:bg-yellow-300 hover:scale-[1.03]
                      shadow-md transition-all duration-200 text-sm">
                       <i class="fa-solid fa-file-pen mr-2"></i>
                Usprawiedliwienie
            </a>

        </div>
    </div>



    <!-- ✅ KAFEL 3 – STUDENCI -->
    <div class="group bg-white border border-blue-200 hover:border-blue-300 shadow-md hover:shadow-lg
                transition-all duration-300 rounded-xl p-6 flex flex-col items-center text-center">

        <h3 class="text-3xl font-bold text-blue-900 mb-3">
            Studenci
        </h3>
        <div class="h-1 w-24 bg-yellow-400 mb-6"></div>

        <p class="text-gray-600 mb-6 leading-relaxed text-xs">
            Spotkaj innych stypendystów i rozwijaj swoje pasje na letnim obozie studenckim.
        </p>

        <!-- ✅ NOWE — INFORMACJE -->
        <div class="text-sm text-gray-700 mb-8 space-y-1 text-start">
            @if($obozStudenci)
                <p>
                    <span class="font-semibold text-blue-900">Termin obozu:</span>
                    {{ \Carbon\Carbon::parse($obozStudenci->start_date)->translatedFormat('d F') }}
                    –
                    {{ \Carbon\Carbon::parse($obozStudenci->end_date)->translatedFormat('d F Y') }}
                </p>
                <p>
                    <span class="font-semibold text-blue-900">Miejsce obozu:</span>
                    {{ $obozStudenci->miejsce }}
                </p>
            @else
                <p>Brak informacji o obozie.</p>
            @endif
        </div>

        <div class="flex flex-col space-y-3 w-full">

            <a href="{{ route('stypendysci.studenci') }}"
               class="px-6 py-2 rounded-lg text-white font-semibold
                      bg-blue-900 hover:bg-blue-800 hover:scale-[1.03]
                      shadow-md transition-all duration-200 text-sm">
                      <i class="fa-solid fa-file-circle-plus mr-2"></i>
                Zgłoszenie
            </a>

            <a href="#"
               class="px-6 py-2 rounded-lg text-blue-900 font-semibold border border-yellow-400
                      bg-yellow-200 hover:bg-yellow-300 hover:scale-[1.03]
                      shadow-md transition-all duration-200 text-sm">
                       <i class="fa-solid fa-file-pen mr-2"></i>
                Usprawiedliwienie
            </a>

        </div>
    </div>

</div>


        </div>
    </section>
</div>
@endsection

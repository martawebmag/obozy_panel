@extends('layouts.guest')

@section('content')
<div class="min-h-screen bg-slate-100 text-gray-800">


    <!-- 🌅 HERO SECTION -->
    <section class="max-w-7xl mx-auto px-8 py-12 md:py-24 flex flex-col md:flex-row items-center gap-12">
        <div class="md:w-1/2">
            <h1 class="text-4xl md:text-5xl font-bold text-blue-950 leading-tight mb-6">
                <span class="text-sky-600 bg-clip-text bg-linear-to-r from-sky-400 to-gray-600">Zapisz się</span>
                na wakacyjny obóz FDNT
            </h1>
            <p class="text-gray-700 mb-8 text-lg leading-relaxed">
                Dołącz do wspólnoty stypendystów. Rozwijaj się, inspiruj i przeżyj niezapomniane chwile w duchu Jana Pawła II.
            </p>
            <a href="{{ route('stypendysci.index') }}"
               class="inline-flex items-center gap-2 px-7 py-3 bg-gradient-to-r from-sky-800 to-sky-600 text-white font-semibold rounded-full shadow-md hover:shadow-lg hover:scale-103 transition mb-4">
                <i class="fas fa-clipboard-check"></i> Stypendyści - Formularz zapisów
            </a>
            <br>
            <a href="{{ route('wolontariusze.index') }}"
               class="inline-flex items-center gap-2 px-7 py-3 bg-gradient-to-r from-green-800/90 to-green-600/80 text-white font-semibold rounded-full shadow-md hover:shadow-lg hover:scale-103 transition">
                <i class="fas fa-clipboard-check"></i> Wolontariusze - Formularz zapisów
            </a>
        </div>

        <div class="md:w-1/2 relative">
            <div class="absolute -inset-2 bg-linear-to-r from-blue-200 to-slate-300 rounded-3xl blur opacity-40"></div>
            <div class="relative grid grid-cols-2 gap-4 rounded-3xl overflow-hidden">
                <img src="{{ asset('images/image3.jpg') }}" alt="zdjęcie obozu"
                     class="col-span-2 w-full h-64 object-cover rounded-xl shadow-md">
                <img src="{{ asset('images/image8.jpg') }}" alt="zdjęcie 2"
                     class="w-full h-40 object-cover rounded-xl shadow-md">
                <img src="{{ asset('images/image7.jpg') }}" alt="zdjęcie 3"
                     class="w-full h-40 object-cover rounded-xl shadow-md">
            </div>
        </div>
    </section>

    <!-- 💎 Sekcja DLACZEGO WARTO -->
    <section class="max-w-7xl mx-auto px-8 py-20 bg-white border-y border-slate-200">
        <h2 class="text-3xl font-bold text-sky-950 text-center mb-12">Dlaczego warto uczestniczyć?</h2>
        <div class="grid md:grid-cols-3 gap-10">
            @php
                $cards = [
                    ['icon' => 'fa-lightbulb', 'title' => 'Rozwój osobisty', 'text' => 'Zdobądź nowe umiejętności, spotkaj inspirujących ludzi i odkryj swój potencjał.'],
                    ['icon' => 'fa-users', 'title' => 'Wspólnota', 'text' => 'Poznaj innych stypendystów, zacieśnij relacje i współtwórz społeczność FDNT.'],
                    ['icon' => 'fa-heart', 'title' => 'Wartości', 'text' => 'Umacniaj wiarę, empatię i chęć służenia innym w duchu nauczania Jana Pawła II.']
                ];
            @endphp

            @foreach($cards as $card)
                <div class="group bg-slate-50 border border-slate-200 rounded-2xl p-10 shadow-sm hover:shadow-md transition transform hover:-translate-y-1 hover:bg-linear-to-br from-gray-50 to-blue-50">
                    <i class="fas {{ $card['icon'] }} text-5xl text-sky-600 mb-6 group-hover:text-amber-500 transition"></i>
                    <h3 class="text-xl font-semibold text-sky-950 mb-3">{{ $card['title'] }}</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">{{ $card['text'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <!-- ✨ Cytat -->
    <section class="max-w-5xl mx-auto px-8 p-16 text-center">
        <div class="bg-white border border-gray-200 rounded-2xl py-12 shadow-md">
            <blockquote class="text-xl md:text-2xl font-medium text-sky-950 italic">
                „Człowiek jest wielki nie przez to, co posiada, lecz przez to, kim jest.”
            </blockquote>
            <p class="mt-4 text-gray-500 text-sm uppercase tracking-widest">– św. Jan Paweł II</p>
        </div>
    </section>

</div>
@endsection


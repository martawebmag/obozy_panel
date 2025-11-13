@extends('layouts.app')

@section('content')
<div class="min-h-screen flex bg-gray-100">

    @include('biuro.sidebar')

    <main class="flex-1 p-8 md:p-10 bg-gray-50">

        <!-- Nagłówek -->
        <div class="mb-8">
            <h1 class="text-3xl md:text-4xl font-semibold text-slate-800 mb-4">
                Panel Biura FDNT
            </h1>
            <p class="text-gray-600 text-sm md:text-md max-w-4xl">
                Zarządzaj stypendystami, koordynatorami, obozami oraz generuj raporty.
                Kliknij w kafelek, aby przejść do odpowiedniej sekcji.
            </p>
        </div>

        <!-- Wyszukiwarka -->
        <a href="{{ route('biuro.search') }}"
           class="flex max-w-5xl mb-12 bg-white border border-slate-200 rounded-xl shadow-md p-5 hover:shadow-lg transition transform hover:-translate-y-0.5">
            <i class="fa-solid fa-magnifying-glass text-blue-400 text-2xl mr-4"></i>
            <h2 class="text-lg font-semibold text-slate-800">Wyszukiwarka stypendystów</h2>
        </a>

        <!-- 🔹 Kafelki główne -->
        <div class="max-w-5xl grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <!-- Uczestnicy -->
            <a href="#"
               class="flex items-center bg-white border border-slate-200 rounded-2xl shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5 p-5">
                <i class="fa-solid fa-user-graduate text-blue-400 text-2xl mr-4"></i>
                <h3 class="text-slate-800 font-semibold text-lg">Uczniowie</h3>
            </a>

            <a href="#"
               class="flex items-center bg-white border border-slate-200 rounded-2xl shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5 p-5">
                <i class="fa-solid fa-user-graduate text-blue-400 text-2xl mr-4"></i>
                <h3 class="text-slate-800 font-semibold text-lg">Studenci</h3>
            </a>

            <a href="#"
               class="flex items-center bg-white border border-slate-200 rounded-2xl shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5 p-5">
                <i class="fa-solid fa-user-graduate text-blue-400 text-2xl mr-4"></i>
                <h3 class="text-slate-800 font-semibold text-lg">Maturzyści</h3>
            </a>
        </div>

        <!-- 🔹 Kafelki organizacyjne -->
        <div class="max-w-5xl grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="{{ route('biuro.wolontariusze.index') }}"
               class="flex items-center bg-white border border-slate-200 rounded-2xl shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5 p-5">
                <i class="fa-solid fa-hands-helping text-blue-400 text-2xl mr-4"></i>
                <h3 class="text-slate-800 font-semibold text-lg">Wolontariusze</h3>
            </a>

            <a href="{{ route('biuro.koordynatorzy.index') }}"
               class="flex items-center bg-white border border-slate-200 rounded-2xl shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5 p-5">
                <i class="fa-solid fa-user-tie text-blue-400 text-2xl mr-4"></i>
                <h3 class="text-slate-800 font-semibold text-lg">Koordynatorzy</h3>
            </a>

            <a href="{{ route('biuro.obozy.index') }}"
               class="flex items-center bg-white border border-slate-200 rounded-2xl shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5 p-5">
                <i class="fa-solid fa-campground text-blue-400 text-2xl mr-4"></i>
                <h3 class="text-slate-800 font-semibold text-lg">Obozy</h3>
            </a>
        </div>

    </main>
</div>
@endsection

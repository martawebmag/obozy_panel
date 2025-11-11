@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex bg-gray-100 border-t-2 border-slate-300">

        @include('biuro.sidebar')

        <!-- 🧾 GŁÓWNA ZAWARTOŚĆ -->
        <main class="flex-1 p-10 bg-slate-50 shadow-inner border-l-2 border-slate-200">

            <!-- Nagłówek -->
            <h1 class="text-3xl font-bold text-slate-800 mb-6">
                Witaj w Panelu Biura FDNT
            </h1>
            <p class="mb-10 text-gray-700 text-md max-w-3xl">
                Tutaj możesz przeglądać zgłoszonych stypendystów, zarządzać koordynatorami, obozami oraz generować raporty.
                Skorzystaj z wyszukiwarki lub kliknij w odpowiedni kafelek, aby przejść do danej sekcji.
            </p>

            <!-- 🔎 Wyszukiwarka stypendystów -->
            <form action="#" method="GET"
                class="max-w-5xl mt-8 mb-12 bg-slate-200 border border-slate-300 rounded-xl shadow-lg p-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                    <i class="fa-solid fa-magnifying-glass mr-2 text-blue-600"></i>
                    Wyszukiwarka
                </h2>

                <p class="text-sm text-gray-600 mb-3">Podaj <strong>imię</strong>, <strong>nazwisko</strong> lub
                    <strong>PESEL</strong>:</p>

                <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                    <input type="text" name="query" placeholder="Wyszukaj..."
                        class="flex-1 border border-gray-300 p-2 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-500 text-sm transition"
                        value="">

                    <x-primary-button> <i class="fa-solid fa-magnifying-glass mr-2"></i> Szukaj </x-primary-button>

                </div>
            </form>

            <div class="max-w-5xl grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

                <!-- Uczniowie -->
                <a href="#"
                    class="flex items-center bg-slate-100 border border-slate-300
                    rounded-2xl shadow-sm hover:shadow-md transition transform hover:-translate-y-0.5 p-4">
                    <i class="fa-solid fa-user-graduate text-slate-400 text-2xl mr-4"></i>
                    <h3 class="text-slate-800 font-semibold text-lg">Uczniowie</h3>
                </a>

                <!-- Studenci -->
                <a href="#"
                    class="flex items-center bg-slate-100 border border-slate-300
                    rounded-2xl shadow-sm hover:shadow-md transition transform hover:-translate-y-0.5 p-4">
                    <i class="fa-solid fa-user-graduate text-slate-400 text-2xl mr-4"></i>
                    <h3 class="text-slate-800 font-semibold text-lg">Studenci</h3>
                </a>

                <!-- Maturzyści -->
                <a href="#"
                    class="flex items-center bg-slate-100 border border-slate-300
                    rounded-2xl shadow-sm hover:shadow-md transition transform hover:-translate-y-0.5 p-4">
                    <i class="fa-solid fa-user-graduate text-slate-400 text-2xl mr-4"></i>
                    <h3 class="text-slate-800 font-semibold text-lg">Maturzyści</h3>
                </a>
            </div>

            <!-- 🔘 Kafelki: Wolontariusze, Koordynatorzy, Obozy -->
            <div class="max-w-5xl grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Wolontariusze -->
                <a href="{{ route('biuro.wolontariusze.index') }}"
                    class="flex items-center bg-slate-100 border border-slate-300
                    rounded-2xl shadow-sm hover:shadow-md transition transform hover:-translate-y-0.5 p-4">
                    <i class="fa-solid fa-hands-helping text-slate-400 text-2xl mr-4"></i>
                    <h3 class="text-slate-800 font-semibold text-lg">Wolontariusze</h3>
                </a>

                <!-- Koordynatorzy -->
                <a href="{{ route('biuro.koordynatorzy.index') }}"
                    class="flex items-center bg-slate-100 border border-slate-300
                    rounded-2xl shadow-sm hover:shadow-md transition transform hover:-translate-y-0.5 p-4">
                    <i class="fa-solid fa-user-tie text-slate-400 text-2xl mr-4"></i>
                    <h3 class="text-slate-800 font-semibold text-lg">Koordynatorzy</h3>
                </a>

                <!-- Obozy -->
                <a href="{{ route('biuro.obozy.index') }}"
                    class="flex items-center bg-slate-100 border border-slate-300
                    rounded-2xl shadow-sm hover:shadow-md transition transform hover:-translate-y-0.5 p-4">
                    <i class="fa-solid fa-campground text-slate-400 text-2xl mr-4"></i>
                    <h3 class="text-slate-800 font-semibold text-lg">Obozy</h3>
                </a>

            </div>



        </main>
    </div>
@endsection

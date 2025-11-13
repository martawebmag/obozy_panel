@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex bg-gray-200 border-t-2 border-slate-300">

        @include('biuro.sidebar')

        <!-- 🧾 GŁÓWNA ZAWARTOŚĆ -->
        <main class="flex-1 p-10 bg-slate-50 shadow-inner border-l-2 border-slate-200">

    <form action="#" method="GET" class="max-w-5xl mt-8 mb-8 bg-slate-200 border border-slate-300 rounded-xl shadow-lg p-6">
        <h2 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
            <i class="fa-solid fa-magnifying-glass mr-2 text-blue-600"></i>
            Wyszukiwarka
        </h2>

        <p class="text-sm text-gray-600 mb-3">Podaj <strong>imię</strong>, <strong>nazwisko</strong> lub <strong>PESEL</strong>:</p>

        <div class="flex flex-col sm:flex-row sm:items-center gap-4">
            <input
                type="text"
                name="query"
                placeholder="Wyszukaj..."
                class="flex-1 border border-gray-300 p-3 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-500 text-sm transition"
                value="">

            <x-primary-button> <i class="fa-solid fa-magnifying-glass mr-2"></i> Szukaj </x-primary-button>

        </div>
    </form>

        </main>
    </div>

    @endsection

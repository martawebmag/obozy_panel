@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex bg-slate-100 border-t-2 border-slate-300">

        @include('biuro.sidebar')

        <!-- ✅ Główna zawartość -->
        <main class="flex-1 p-10 bg-slate-50">

            <div class="max-w-xl bg-white shadow-md border border-slate-200 rounded-xl p-8">

                <h2 class="text-2xl font-bold text-slate-800 mb-6">
                    ➕ Dodaj Stypendystę
                </h2>

                <!-- ✅ Błędy walidacji -->
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg border border-red-300">
                        <ul class="list-disc ml-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- ✅ Formularz -->
                <form method="POST" action="{{ route('biuro.stypendysci.store') }}">
                    @csrf

                    <!-- Imię -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-slate-700 mb-1">
                            Imię
                        </label>
                        <input type="text" name="name"
                               class="w-full border border-slate-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-400"
                               required>
                    </div>

                    <!-- Nazwisko -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-slate-700 mb-1">
                            Nazwisko
                        </label>
                        <input type="text" name="surname"
                               class="w-full border border-slate-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-400"
                               required>
                    </div>

                    <!-- Diecezja -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-slate-700 mb-1">
                            Diecezja
                        </label>

                        <select name="diocese"
                                class="w-full border border-slate-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-400"
                                required>
                            <option value="">-- wybierz diecezję --</option>

                            <option value="białostocka">Białostocka</option>
                            <option value="kielecka">Kielecka</option>
                            <option value="krakowska">Krakowska</option>


                            <!-- Dodaj więcej wg potrzeby -->
                        </select>
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-slate-700 mb-1">
                            Email
                        </label>
                        <input type="email" name="email"
                               class="w-full border border-slate-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-400"
                               required>
                    </div>

                    <!-- Przyciski -->
                    <div class="flex items-center justify-between">
                        <a href="{{ route('biuro.stypendysci.index') }}"
                           class="px-4 py-2 text-slate-700 border border-slate-400 rounded-lg hover:bg-slate-200">
                            ⬅ Powrót
                        </a>

                    <button class="bg-blue-800 hover:bg-blue-900 text-white px-4 py-2 rounded">
                        Dodaj
                    </button>
                    </div>

                </form>

            </div>

        </main>
    </div>
@endsection

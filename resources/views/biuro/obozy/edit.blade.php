@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex bg-slate-100 border-t-2 border-slate-300">

        @include('biuro.sidebar')

        <!-- 🧾 GŁÓWNA ZAWARTOŚĆ -->
        <main class="flex-1 p-10 bg-slate-50 shadow-inner border-l-2 border-slate-200">

            <h2 class="text-2xl font-semibold text-slate-700 mb-6">
                Edytuj obóz
            </h2>

            <!-- 🔹 Komunikaty -->
            @if (session('success'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" x-transition
                     class="bg-green-200 text-green-800 px-4 py-2 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 7000)" x-show="show" x-transition
                     class="bg-red-200 text-red-800 px-4 py-2 rounded mb-6">
                    <ul class="pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- 🔹 FORMULARZ -->
            <div class="bg-white border border-slate-200 rounded-2xl shadow-md px-6 py-5 max-w-md mb-10">

                <!-- 🔹 Tytuł -->
                <h3 class="text-xl font-bold text-slate-800 mb-6 border-b border-slate-200 pb-2">
                    Edytuj obóz
                </h3>

                <form action="{{ route('biuro.obozy.update', $oboz->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <!-- 🔹 Uczestnicy -->
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-slate-700">
                            Uczestnicy
                        </label>

                        <select name="uczestnicy"
                            class="w-full px-3 py-2 rounded-lg border border-slate-300 text-sm
                                   bg-slate-50 hover:bg-white
                                   focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                            <option value="Uczniowie"    {{ $oboz->uczestnicy === 'Uczniowie' ? 'selected' : '' }}>Uczniowie</option>
                            <option value="Maturzyści"   {{ $oboz->uczestnicy === 'Maturzyści' ? 'selected' : '' }}>Maturzyści</option>
                            <option value="Studenci"     {{ $oboz->uczestnicy === 'Studenci' ? 'selected' : '' }}>Studenci</option>
                        </select>
                    </div>

                    <!-- 🔹 Daty -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-slate-700">
                                Data startu
                            </label>
                            <input type="date" name="start_date" required
                                   value="{{ $oboz->start_date }}"
                                   class="w-full px-3 py-2 rounded-lg border border-slate-300 text-sm
                                          bg-slate-50 hover:bg-white cursor-pointer
                                          focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-slate-700">
                                Data końca
                            </label>
                            <input type="date" name="end_date" required
                                   value="{{ $oboz->end_date }}"
                                   class="w-full px-3 py-2 rounded-lg border border-slate-300 text-sm
                                          bg-slate-50 hover:bg-white cursor-pointer
                                          focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        </div>
                    </div>

                    <!-- 🔹 Miejsce -->
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-slate-700">
                            Miejsce
                        </label>
                        <input type="text" name="miejsce" placeholder="np. Zakopane"
                               value="{{ $oboz->miejsce }}"
                               class="w-full px-3 py-2 rounded-lg border border-slate-300 text-sm
                                      bg-slate-50 hover:bg-white
                                      focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                    </div>

                    <!-- Przyciski -->
                    <div class="flex items-center justify-between">
                        <a href="{{ route('biuro.obozy.index') }}"
                           class="px-4 py-2 text-slate-700 border border-slate-400 rounded-lg hover:bg-slate-200">
                            ⬅ Powrót
                        </a>

                        <button type="submit"
                                class="bg-blue-800 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow-md">
                            Zapisz zmiany
                        </button>
                    </div>

                </form>
            </div>

        </main>
    </div>
@endsection

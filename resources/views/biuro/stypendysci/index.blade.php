@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex bg-gray-200 border-t-2 border-slate-300">

        @include('biuro.sidebar')

        <!-- 🧾 GŁÓWNA ZAWARTOŚĆ -->
        <main class="flex-1 p-10 bg-slate-50 shadow-inner border-l-2 border-slate-200">

            <h1 class="text-2xl font-bold text-slate-800 mb-10">
                Stypendyści
            </h1>


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


            <div class="overflow-x-auto bg-white rounded-lg shadow border border-slate-200">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-blue-100">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-slate-700">#</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-slate-700">Typ uczestnika</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-slate-700">Imię</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-slate-700">Nazwisko</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-slate-700">Diecezja</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-slate-700"></th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-200">

                        @forelse($stypendysci as $stypendysta)
                            <tr>
                                <td class="px-4 py-2 text-sm text-slate-700">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 text-sm text-slate-700">{{ $stypendysta->typ_uczestnika }}</td>
                                <td class="px-4 py-2 text-sm text-slate-700">{{ $stypendysta->imie }}</td>
                                <td class="px-4 py-2 text-sm text-slate-700">{{ $stypendysta->nazwisko }}</td>
                                <td class="px-4 py-2 text-sm text-slate-700">{{ $stypendysta->diecezja }}</td>


                                <td class="px-4 py-2 text-sm text-slate-700 flex space-x-2">

                                    <a href="{{ route('biuro.stypendysci.edit', $stypendysta->id) }}"
                                        class="text-slate-600 border border-blue-300 hover:bg-slate-100 text-sm px-3 py-1 rounded-md">
                                        <i class="fa-solid fa-pen text-blue-500 mr-2"></i> Edytuj
                                    </a>

                                    <button type="submit" onclick="openDeleteModal({{ $stypendysta->id }})"
                                         class="text-slate-600 border border-red-300 hover:bg-slate-100 text-sm px-3 py-1 rounded-md">
                                       <i class="fa-solid fa-trash text-red-500 mr-2"></i> Usuń
                                    </button>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-6 text-center text-slate-500">
                                    Brak stypendystów.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>

            </div>

        </main>
    </div>
@endsection

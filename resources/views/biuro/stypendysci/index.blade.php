@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex bg-gray-200 border-t-2 border-slate-300">

        @include('biuro.sidebar')

        <!-- 🧾 GŁÓWNA ZAWARTOŚĆ -->
        <main class="flex-1 p-10 bg-slate-50 shadow-inner border-l-2 border-slate-200">

            <h1 class="text-2xl font-bold text-slate-800 mb-10">
                Wszyscy stypendyści zgłoszeni na obozy
            </h1>

            @if (session('success'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" x-transition
                    class="bg-green-200 text-green-800 px-4 py-2 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <!-- 🔹 Informacja o wynikach -->
            <div class="mb-2 text-sm text-slate-600">
                Znaleziono  <span class="font-bold">{{ $stypendysci->total() }}</span> uczestników.
            </div>

            <div class="overflow-x-auto bg-white rounded-lg shadow border border-slate-200">
                <table class="min-w-full text-sm text-slate-700">
                    <thead class="bg-slate-200">
                        <tr>
                            <th class="px-2 py-1 text-left font-medium text-slate-700 w-8">#</th>
                            <th class="px-2 py-1 text-left font-medium text-slate-700 w-28">Typ</th>
                            <th class="px-2 py-1 text-left font-medium text-slate-700 w-24">Imię</th>
                            <th class="px-2 py-1 text-left font-medium text-slate-700 w-28">Nazwisko</th>
                            <th class="px-2 py-1 text-left font-medium text-slate-700 w-28">PESEL</th>
                            <th class="px-2 py-1 text-left font-medium text-slate-700 w-28">Diecezja</th>
                            <th class="px-2 py-1 text-left font-medium text-slate-700 w-28">Ulica</th>
                            <th class="px-2 py-1 text-left font-medium text-slate-700 w-28">Miejscowość</th>
                            <th class="px-2 py-1 text-left font-medium text-slate-700 w-36"></th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-200 text-xs">
                        @forelse($stypendysci as $stypendysta)
                            <tr class="odd:bg-white even:bg-slate-50 hover:bg-slate-100 transition">
                                <td class="px-2 py-1 truncate">
                                    {{ ($stypendysci->currentPage() - 1) * $stypendysci->perPage() + $loop->iteration }}
                                </td>
                                <td class="px-2 py-1 truncate">{{ $stypendysta->typ_uczestnika }}</td>
                                <td class="px-2 py-1 truncate">{{ $stypendysta->imie }}</td>
                                <td class="px-2 py-1 truncate">{{ $stypendysta->nazwisko }}</td>
                                <td class="px-2 py-1 truncate">{{ $stypendysta->pesel }}</td>
                                <td class="px-2 py-1 truncate">{{ $stypendysta->diecezja }}</td>
                                <td class="px-2 py-1 truncate">{{ $stypendysta->ulica }}</td>
                                <td class="px-2 py-1 truncate">{{ $stypendysta->miejscowosc }}</td>

                                <td class="px-2 py-1 flex space-x-1 text-xs">
                                    <a href="{{ route('biuro.stypendysci.edit', $stypendysta->id) }}"
                                        class="flex items-center text-blue-600 border border-blue-200 px-2 py-0.5 rounded hover:bg-blue-50 truncate mr-4">
                                        <i class="fa-solid fa-pen mr-1 text-xs"></i> Edytuj
                                    </a>

                                    <button type="button" onclick="openDeleteModal({{ $stypendysta->id }})"
                                        class="flex items-center text-red-600 border border-red-200 px-2 py-0.5 rounded hover:bg-red-50 truncate">
                                        <i class="fa-solid fa-trash mr-1 text-xs"></i> Usuń
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-4 text-center text-slate-400 text-sm">
                                    Brak stypendystów.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- 🔹 Paginacja -->
            @if ($stypendysci->hasPages())
                <div class="mt-4 flex justify-center space-x-1 text-sm">
                    <!-- Poprzednia strona -->
                    @if ($stypendysci->onFirstPage())
                        <span
                            class="px-3 py-1 text-slate-400 border border-slate-200 rounded-md cursor-not-allowed">&lt;</span>
                    @else
                        <a href="{{ $stypendysci->previousPageUrl() }}"
                            class="px-3 py-1 text-slate-700 border border-slate-200 rounded-md hover:bg-slate-100">&lt;</a>
                    @endif

                    <!-- Numery stron -->
                    @foreach ($stypendysci->getUrlRange(1, $stypendysci->lastPage()) as $page => $url)
                        @if ($page == $stypendysci->currentPage())
                            <span
                                class="px-3 py-1 text-white bg-blue-600 border border-blue-600 rounded-md">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}"
                                class="px-3 py-1 text-slate-700 border border-slate-200 rounded-md hover:bg-slate-100">{{ $page }}</a>
                        @endif
                    @endforeach

                    <!-- Następna strona -->
                    @if ($stypendysci->hasMorePages())
                        <a href="{{ $stypendysci->nextPageUrl() }}"
                            class="px-3 py-1 text-slate-700 border border-slate-200 rounded-md hover:bg-slate-100">&gt;</a>
                    @else
                        <span
                            class="px-3 py-1 text-slate-400 border border-slate-200 rounded-md cursor-not-allowed">&gt;</span>
                    @endif
                </div>
            @endif

    </div>

    </main>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex bg-slate-100 border-t-2 border-slate-300">

        @include('biuro.sidebar')

        <!-- 🧾 GŁÓWNA ZAWARTOŚĆ -->
        <main class="flex-1 p-10 bg-slate-50 shadow-inner border-l-2 border-slate-200">

            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-semibold text-slate-700 mb-6">Zarządzanie obozami</h2>

                <a href="{{ route('biuro.obozy.create') }}"
                    class="bg-blue-800 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow-md text-md">
                    <i class="fa-solid fa-plus mr-2"></i> Dodaj obóz
                </a>
            </div>
            <!-- 🔹 LISTA OSTATNICH OBOZÓW -->
            <div>
                <h3 class="text-xl font-bold text-slate-800 mb-6 border-b border-slate-200 pb-2">
                    Ostatnie obozy
                </h3>

                <div class="overflow-x-auto bg-white rounded-lg shadow border border-slate-200">
                    <table class="min-w-full divide-y divide-slate-200 text-sm text-left text-slate-700">
                        <thead class="bg-blue-100">
                            <tr>
                                <th class="px-4 py-2 font-semibold text-slate-700">#</th>
                                <th class="px-4 py-2 font-semibold text-slate-700">Rok obozu</th>
                                <th class="px-4 py-2 font-semibold text-slate-700">Uczestnicy</th>
                                <th class="px-4 py-2 font-semibold text-slate-700">Początek</th>
                                <th class="px-4 py-2 font-semibold text-slate-700">Koniec</th>
                                <th class="px-4 py-2 font-semibold text-slate-700">Miejsce</th>
                                <th class="px-4 py-2 text-center font-semibold text-slate-700"></th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-200">
                            @forelse($obozy as $oboz)
                                <tr
                                    class="hover:bg-slate-50 transition
                    @if ($oboz->rok_obozu == date('Y')) bg-slate-100 @endif
                ">
                                    <td class="px-4 py-2">
                                        {{ ($obozy->currentPage() - 1) * $obozy->perPage() + $loop->iteration }}
                                    </td>

                                    <td class="px-4 py-2 font-semibold">
                                        {{ $oboz->rok_obozu }}
                                    </td>

                                    <td class="px-4 py-2">
                                        {{ ucfirst($oboz->uczestnicy) }}
                                    </td>

                                    <td class="px-4 py-2">
                                        {{ \Carbon\Carbon::parse($oboz->start_date)->format('d.m.Y') }}
                                    </td>

                                    <td class="px-4 py-2">
                                        {{ \Carbon\Carbon::parse($oboz->end_date)->format('d.m.Y') }}
                                    </td>

                                    <td class="px-4 py-2">
                                        {{ $oboz->miejsce }}
                                    </td>

                                    <td class="px-4 py-2 text-center flex gap-2 justify-center">

                                        <!-- Edytuj -->
                                        <a href="{{ route('biuro.obozy.edit', $oboz->id) }}"
                                            class="text-slate-600 border border-blue-300 hover:bg-slate-100 text-sm px-3 py-1 rounded-md inline-flex items-center">
                                            <i class="fa-solid fa-pen text-blue-500 mr-2"></i> Edytuj
                                        </a>

                                        <!-- Usuń -->
                                        <button onclick="openDeleteModal({{ $oboz->id }})"
                                            class="text-slate-600 border border-red-300 hover:bg-slate-100 text-sm px-3 py-1 rounded-md inline-flex items-center">
                                            <i class="fa-solid fa-trash text-red-500 mr-2"></i> Usuń
                                        </button>

                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="7" class="px-4 py-4 text-center text-slate-500">
                                        Brak danych
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>


                {{-- 🔹 PAGINACJA --}}
                @if ($obozy->hasPages())
                    <div class="mt-6 flex justify-center">
                        <div class="flex items-center space-x-1 text-sm">

                            {{-- Poprzednia strona --}}
                            @if ($obozy->onFirstPage())
                                <span
                                    class="px-3 py-1.5 rounded-md border border-slate-300 text-slate-400 cursor-not-allowed">
                                    <i class="fa-solid fa-chevron-left"></i>
                                </span>
                            @else
                                <a href="{{ $obozy->previousPageUrl() }}"
                                    class="px-3 py-1.5 rounded-md border border-slate-300 text-slate-600 hover:bg-slate-100">
                                    <i class="fa-solid fa-chevron-left"></i>
                                </a>
                            @endif

                            {{-- Numery stron --}}
                            @foreach ($obozy->links()->elements as $element)
                                @if (is_string($element))
                                    <span class="px-3 py-1.5 text-slate-400">{{ $element }}</span>
                                @endif

                                @if (is_array($element))
                                    @foreach ($element as $page => $url)
                                        @if ($page == $obozy->currentPage())
                                            <span
                                                class="px-3 py-1.5 rounded-md bg-blue-600 text-white border border-blue-600 font-medium">
                                                {{ $page }}
                                            </span>
                                        @else
                                            <a href="{{ $url }}"
                                                class="px-3 py-1.5 rounded-md border border-slate-300 text-slate-600 hover:bg-slate-100">
                                                {{ $page }}
                                            </a>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach

                            {{-- Następna --}}
                            @if ($obozy->hasMorePages())
                                <a href="{{ $obozy->nextPageUrl() }}"
                                    class="px-3 py-1.5 rounded-md border border-slate-300 text-slate-600 hover:bg-slate-100">
                                    <i class="fa-solid fa-chevron-right"></i>
                                </a>
                            @else
                                <span
                                    class="px-3 py-1.5 rounded-md border border-slate-300 text-slate-400 cursor-not-allowed">
                                    <i class="fa-solid fa-chevron-right"></i>
                                </span>
                            @endif

                        </div>
                    </div>
                @endif

            </div>
        </main>
    </div>


    <!-- 🔥 MODAL  -->
    <div id="deleteModal" class="fixed inset-0 items-center justify-center bg-black/40 hidden z-50">

        <div class="bg-white rounded-lg shadow-xl w-80 p-6">

            <h2 class="text-lg font-semibold text-slate-800 text-center">
                Czy na pewno chcesz usunąć ten obóz?
            </h2>

            <p class="text-sm text-slate-600 mt-2 text-center">
                Tej operacji nie można cofnąć.
            </p>

            <!-- Przyciski -->
            <div class="flex justify-center gap-4 mt-6">
                <button onclick="closeDeleteModal()"
                    class="px-4 py-2 bg-slate-200 text-slate-700 rounded hover:bg-slate-300">
                    Anuluj
                </button>

                <form id="deleteForm" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                        Usuń
                    </button>
                </form>
            </div>
        </div>

    </div>
    <script>
        function openDeleteModal(id) {
            const modal = document.getElementById('deleteModal');
            const form = document.getElementById('deleteForm');

            form.action = "/biuro/obozy/" + id; // route('biuro.obozy.destroy', oboz)

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeDeleteModal() {
            const modal = document.getElementById('deleteModal');
            modal.classList.add('hidden');
        }
    </script>

@endsection

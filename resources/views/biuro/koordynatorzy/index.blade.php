@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex bg-slate-100 border-t-2 border-slate-300">

        @include('biuro.sidebar')

        <!-- 🧾 GŁÓWNA ZAWARTOŚĆ -->
        <main class="flex-1 p-10 bg-slate-50">

            <!-- 🔹 Nagłówek + przycisk dodawania -->
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-semibold text-slate-700 mb-6">Koordynatorzy</h2>

                <a href="{{ route('biuro.koordynatorzy.create') }}"
                    class="bg-blue-800 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow-md text-md">
                    <i class="fa-solid fa-plus mr-2"></i> Dodaj Koordynatora
                </a>
            </div>

            <!-- 🔹 Tabela koordynatorów -->
            <div class="overflow-x-auto bg-white rounded-lg shadow border border-slate-200">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-blue-100">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-slate-700">#</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-slate-700">Imię</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-slate-700">Nazwisko</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-slate-700">Diecezja</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-slate-700">Email</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-slate-700"></th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-200">

                        @forelse($koordynatorzy as $koordynator)
                            <tr>
                                <td class="px-4 py-2 text-sm text-slate-700">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 text-sm text-slate-700">{{ $koordynator->name }}</td>
                                <td class="px-4 py-2 text-sm text-slate-700">{{ $koordynator->surname }}</td>
                                <td class="px-4 py-2 text-sm text-slate-700">{{ $koordynator->diocese }}</td>
                                <td class="px-4 py-2 text-sm text-slate-700">{{ $koordynator->email }}</td>

                                <td class="px-4 py-2 text-sm text-slate-700 flex space-x-2">

                                    <a href="{{ route('biuro.koordynatorzy.edit', $koordynator->id) }}"
                                        class="text-slate-600 border border-blue-300 hover:bg-slate-100 text-sm px-3 py-1 rounded-md">
                                        <i class="fa-solid fa-pen text-blue-500 mr-2"></i> Edytuj
                                    </a>

                                    <button type="submit" onclick="openDeleteModal({{ $koordynator->id }})"
                                         class="text-slate-600 border border-red-300 hover:bg-slate-100 text-sm px-3 py-1 rounded-md">
                                       <i class="fa-solid fa-trash text-red-500 mr-2"></i> Usuń
                                    </button>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-6 text-center text-slate-500">
                                    Brak koordynatorów.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>

            </div>

        </main>
    </div>



     <!-- 🔥 MODAL  -->
    <div id="deleteModal" class="fixed inset-0 items-center justify-center bg-black/40 hidden z-50">

        <div class="bg-white rounded-lg shadow-xl w-80 p-6">

            <h2 class="text-lg font-semibold text-slate-800 text-center">
                Czy na pewno chcesz usunąć koordynatora?
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

           form.action = "{{ route('biuro.koordynatorzy.destroy', ':id') }}".replace(':id', id);

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeDeleteModal() {
            const modal = document.getElementById('deleteModal');
            modal.classList.add('hidden');
        }
    </script>
@endsection

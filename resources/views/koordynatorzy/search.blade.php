@extends('layouts.app')

@section('content')

<div class="flex w-screen">
     @include('koordynatorzy.sidebar')

        <!-- Main Content -->
    <div class="w-screen bg-white p-8">

    @include('koordynatorzy.sidebar-mobile')


        <h1 class="text-xl font-bold mb-1 mt-4">Znajdź stypendystę </h1>
        <hr>
 <form action="{{ route('koordynatorzy.search') }}" method="GET" class="max-w-5xl mt-8 bg-gray-100 border border-gray-300 rounded-xl shadow-lg p-6">
        <h2 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
            <i class="fa-solid fa-magnifying-glass mr-2 text-sky-600"></i>
            Wyszukiwarka stypendystów
        </h2>

        <p class="text-sm text-gray-600 mb-3">Podaj <strong>imię</strong>, <strong>nazwisko</strong> lub <strong>PESEL</strong>:</p>

        <div class="flex flex-col sm:flex-row sm:items-center gap-4">
            <input
                type="text"
                name="query"
                placeholder="Wyszukaj..."
                class="flex-1 border border-gray-300 p-3 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-sky-400 focus:border-sky-500 text-sm transition"
                value="{{ request('query') }}">

            <x-primary-button> <i class="fa-solid fa-magnifying-glass mr-2"></i> Szukaj </x-primary-button>
        </div>

        {{-- @if($students->total()> 0)
        <p class="mt-4 text-xs text-gray-700">Znalezionych stypendystów: <strong> 100 </strong></p>
        @endif --}}
    </form>



    @if($students->count())
    <div class="max-w-5xl mt-10 mb-10">
        <div class="overflow-x-auto mt-6 rounded-md shadow-sm">
            <p class="mb-4">Stypendyści zapisani na obóz w 2025 roku (diecezja {{ Auth::user()->diocese }}):</p>

            <table class="min-w-full text-xs text-left text-gray-800 font-sans border border-gray-300">
                <thead class="bg-gray-700 text-white uppercase tracking-wider">
                    <tr>
                        <th class="px-3 py-2 border-b border-gray-500">#</th>
                        <th class="px-3 py-2 border-b border-gray-500">Imię</th>
                        <th class="px-3 py-2 border-b border-gray-500">Nazwisko</th>
                        <th class="px-3 py-2 border-b border-gray-500">PESEL</th>
                        <th class="px-3 py-2 border-b border-gray-500">Email</th>
                        <th class="px-3 py-2 border-b border-gray-500">Telefon</th>
                        <th class="px-3 py-2 border-b border-gray-500">Miejscowość</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $index => $student)
                        <tr class="bg-white even:bg-gray-100 hover:bg-sky-50 transition duration-100">
                            <td class="px-3 py-2 border-t border-gray-200">{{  $students->firstItem() + $loop->index }}</td>
                            <td class="px-3 py-2 border-t border-gray-200">{{ $student->imie }}</td>
                            <td class="px-3 py-2 border-t border-gray-200">{{ $student->nazwisko }}</td>
                            <td class="px-3 py-2 border-t border-gray-200">{{ $student->pesel }}</td>
                            <td class="px-3 py-2 border-t border-gray-200">{{ $student->email }}</td>
                            <td class="px-3 py-2 border-t border-gray-200">{{ $student->numer_telefonu }}</td>
                            <td class="px-3 py-2 border-t border-gray-200">{{ $student->miejscowosc }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        {{-- Paginacja (jeśli używasz paginate()) --}}
        <div class="mt-6">
            {{ $students->appends(['query' => request('query')])->links() }}
        </div>
    </div>
@else
    <div class="max-w-3xl mt-10 text-center text-sm text-gray-600">
        Brak wyników dla zapytania <strong>"{{ request('query') }}"</strong>.
    </div>
@endif

    </div>
</div>
 @endsection


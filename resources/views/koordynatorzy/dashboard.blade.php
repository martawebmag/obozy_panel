@extends('layouts.app')

@section('content')

<div class="flex w-screen">
     @include('koordynatorzy.sidebar')

        <!-- Main Content -->
<div class="w-screen bg-slate-100 p-8 min-h-screen text-slate-800">

    @include('koordynatorzy.sidebar-mobile')

    <h1 class="text-2xl font-semibold mt-4">Raporty </h1>
    <div class="h-[1px] w-[20%] bg-slate-200 mt-1 mb-8"></div>

    <p class="text-lg text-yellow-500 font-semibold mb-8">
        <i class="fa-solid fa-people-roof mr-2"></i> Diecezja {{ Auth::user()->diocese  }}
    </p>
    <p class="text-sm text-slate-600 mb-2">
        Aktualna lista stypendystów zapisanych na obozy fundacyjne:
    </p>

    <div class="overflow-x-auto">
        <table class="w-full max-w-5xl text-sm border-separate border-spacing-y-1">
            <thead class="text-slate-700 font-semibold border-b border-slate-300">
                <tr class="bg-slate-300">
                    <th class="text-left px-4 py-3">Obóz</th>
                    <th class="text-left px-4 py-3">Data</th>
                    <th class="text-left px-4 py-3">Miejsce</th>
                    <th class="text-left px-4 py-3">Liczba uczestników</th>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>

            <tbody>
                <!-- Obóz uczniów -->
                <tr class="bg-white hover:bg-blue-50 transition">
                    <td class="px-4 py-3 font-medium text-sky-700 flex items-center gap-2">
                        Obóz uczniów
                    </td>
                    @if(isset($obozUczniowie))
                        <td class="px-4 py-3 text-slate-700">
                            <span class="font-semibold">
                                {{ \Carbon\Carbon::parse($obozUczniowie->start_date)->translatedFormat('d F') }}
                                –
                                {{ \Carbon\Carbon::parse($obozUczniowie->end_date)->translatedFormat('d F Y') }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-slate-700">
                            {{ $obozUczniowie->miejsce }}
                        </td>
                        <td class="px-4 py-3 text-slate-700">
                            @if(isset($liczbaUczniow))
                                <span class="font-semibold">{{ $liczbaUczniow }}</span>
                            @endif
                        </td>
                    @else
                        <td colspan="3" class="text-sm text-slate-400">Brak informacji o obozie</td>
                    @endif

                    <td class="px-4 py-3">
                        <form action="{{ route('koordynatorzy.uczniowie.raport') }}" method="GET">
                            @csrf
                            <button
                                class="px-4 py-2 font-medium border text-emerald-600 border-emerald-600 rounded-md hover:bg-emerald-600 hover:text-white transition flex items-center gap-2">
                                <i class="fa-solid fa-download"></i> Pobierz (xls)
                            </button>
                        </form>
                    </td>
                </tr>

                <!-- Obóz studentów -->
                <tr class="bg-white hover:bg-blue-50 transition">
                    <td class="px-4 py-3 font-medium text-sky-700 flex items-center gap-2">
                        Obóz studentów
                    </td>
                     @if(isset($obozStudenci))
                    <td class="px-4 py-3 text-slate-700">
                        <span class="font-semibold">
                        {{ \Carbon\Carbon::parse($obozStudenci->start_date)->translatedFormat('d F') }}
                    –
                        {{ \Carbon\Carbon::parse($obozStudenci->end_date)->translatedFormat('d F Y') }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-slate-700">
                            {{ $obozStudenci->miejsce }}
                    @else
                        <span class="text-sm text-slate-400">Brak informacji o obozie</span>
                    @endif
                    </td>
                    <td class="px-4 py-3 text-slate-700">
                            @if(isset($liczbaStudentow))
                                <span class="font-semibold">{{ $liczbaStudentow }}</span>
                            @endif
                    </td>
                    <td class="px-4 py-3">
                        <form action="{{ route('koordynatorzy.studenci.raport') }}" method="GET">
                            @csrf
                            <button
                                class="px-4 py-2 font-medium border border-emerald-600 text-emerald-600 rounded-md hover:bg-emerald-600 hover:text-white transition flex items-center gap-2">
                                <i class="fa-solid fa-download"></i> Pobierz (xls)
                            </button>
                        </form>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

</div>



</div>
 @endsection


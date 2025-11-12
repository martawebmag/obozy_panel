{{-- Wersja desktopowa --}}
<div class="hidden md:flex">

    <aside class="w-[300px] min-h-screen bg-slate-800 border-r border-slate-700 shadow-xl px-5 py-7 text-slate-200">

        {{-- HEADER --}}
        <div class="text-center mb-6">

            <div class="flex justify-center mb-2">
                <i class="fa-solid fa-church text-3xl text-blue-500"></i>
            </div>

            <h2 class="text-lg font-semibold text-slate-100">
                Diecezja
            </h2>

            <p class="mt-1 text-xs font-semibold text-blue-400 tracking-wide uppercase">
                {{ Auth::user()->diocese }}
            </p>

            <div class="mt-4">
                <p class="text-sm text-slate-400 font-medium">Ks. Koordynator</p>
                <p class="text-sm font-semibold text-slate-200">
                    {{ Auth::user()->name }} {{ Auth::user()->surname }}
                </p>
            </div>
        </div>

        <hr class="border-slate-700 mb-8">

        {{-- MENU --}}
        <ul class="space-y-2 text-sm font-medium">

            {{-- Raporty --}}
            <li>
                <a href="{{ route('koordynatorzy.dashboard') }}"
                   class="flex items-center gap-3 px-4 py-2 rounded-lg transition
                   {{ request()->routeIs('koordynatorzy.dashboard')
                        ? 'bg-slate-700 text-white shadow-sm'
                        : 'text-slate-200 hover:bg-slate-700' }}">
                    <i class="fa-solid fa-file-pen text-base
                    {{ request()->routeIs('koordynatorzy.dashboard') ? 'text-blue-300' : 'text-blue-300' }}"></i>
                    <span>Raporty</span>
                </a>
            </li>

            {{-- Znajdź stypendystę --}}
            <li>
                <a href="#"
                   class="flex items-center gap-3 px-4 py-2 rounded-lg transition
                   {{ request()->routeIs('koordynatorzy.search')
                        ? 'bg-blue-700 text-white shadow-sm'
                        : 'text-slate-200 hover:bg-slate-700' }}">
                    <i class="fa-solid fa-magnifying-glass text-base
                    {{ request()->routeIs('koordynatorzy.search') ? 'text-white' : 'text-blue-300' }}"></i>
                    <span>Znajdź stypendystę</span>
                </a>
            </li>

            {{-- Historia obozowa --}}
            <li>
                <a href="#"
                   class="flex items-center gap-3 px-4 py-2 rounded-lg transition
                   {{ request()->routeIs('koordynatorzy.history')
                        ? 'bg-blue-700 text-white shadow-sm'
                        : 'text-slate-200 hover:bg-slate-700' }}">
                    <i class="fa-solid fa-clock-rotate-left text-base
                    {{ request()->routeIs('koordynatorzy.history') ? 'text-white' : 'text-blue-300' }}"></i>
                    <span>Historia obozowa</span>
                </a>
            </li>

        </ul>

        <hr class="border-slate-700 my-10">

        {{-- LOGOUT --}}
        <form method="POST" action="{{ route('logout') }}" class="mt-auto">
            @csrf
            <button type="submit"
                    class="inline-flex items-center gap-2 px-7 py-3 bg-gradient-to-r from-blue-900 to-blue-700 text-white font-semibold rounded-lg shadow-md hover:shadow-lg hover:scale-103 transition">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                Wyloguj się
            </button>
        </form>

    </aside>

</div>

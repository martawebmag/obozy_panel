{{-- Wersja desktopowa --}}
<div class="hidden md:flex">

    <aside class="w-[300px] min-h-screen bg-blue-100 border-r border-slate-200 shadow-xl px-5 py-7">

        {{-- HEADER --}}
        <div class="text-center mb-10">
            <div class="flex justify-center mb-4">
                <i class="fa-solid fa-church text-4xl text-blue-800"></i>
            </div>

            <h2 class="text-lg font-semibold text-slate-700">
                Diecezja
            </h2>

            <p class="mt-1 text-xs font-semibold text-blue-800 tracking-wide uppercase">
                {{ Auth::user()->diocese }}
            </p>

            <div class="mt-5">
                <p class="text-sm text-slate-500 font-medium">Ks. Koordynator</p>
                <p class="text-sm font-semibold text-slate-700">
                    {{ Auth::user()->name }} {{ Auth::user()->surname }}
                </p>
            </div>
        </div>

        <hr class="border-slate-300 mb-8">

        {{-- MENU --}}
        <ul class="space-y-2 text-sm font-medium text-slate-600">

            {{-- Raporty --}}
            <li>
                <a href="{{ route('koordynatorzy.dashboard') }}"
                   class="flex items-center gap-3 px-4 py-2 rounded-lg border border-transparent
                   hover:border-blue-500 hover:bg-blue-50 transition-all
                   {{ request()->routeIs('koordynatorzy.dashboard') ? 'bg-blue-50 text-slate-600 border shadow-sm' : '' }}">
                    <i class="fa-solid fa-file-pen text-base hover:text-slate-600
                    {{ request()->routeIs('koordynatorzy.dashboard') ? 'text-blue-800' : 'text-blue-800' }}"></i>
                    <span>Raporty</span>
                </a>
            </li>

            {{-- Znajdź stypendystę --}}
            <li>
                <a href="#"
                   class="flex items-center gap-3 px-4 py-2 rounded-lg border border-transparent
                   hover:border-blue-500 hover:bg-blue-50 transition-all
                   {{ request()->routeIs('koordynatorzy.search') ? 'bg-blue-600 text-white border-blue-500 shadow-sm' : '' }}">
                    <i class="fa-solid fa-magnifying-glass text-base
                    {{ request()->routeIs('koordynatorzy.search') ? 'text-white' : 'text-blue-800' }}"></i>
                    <span>Znajdź stypendystę</span>
                </a>
            </li>

            {{-- Historia obozowa --}}
            <li>
                <a href="#"
                   class="flex items-center gap-3 px-4 py-2 rounded-lg border border-transparent
                   hover:border-blue-500 hover:bg-blue-50 transition-all
                   {{ request()->routeIs('koordynatorzy.history') ? 'bg-blue-600 text-white border-blue-500 shadow-sm' : '' }}">
                    <i class="fa-solid fa-clock-rotate-left text-base
                    {{ request()->routeIs('koordynatorzy.history') ? 'text-white' : 'text-blue-800' }}"></i>
                    <span>Historia obozowa</span>
                </a>
            </li>

        </ul>

        <hr class="border-slate-300 my-10">

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

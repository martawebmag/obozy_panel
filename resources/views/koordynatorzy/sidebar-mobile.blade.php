<!-- Wersja mobile -->
<div x-data="{ sidebarOpen: false }" class="md:hidden">

    <!-- Przycisk otwierający sidebar -->
    <div class="flex justify-start p-2 bg-white shadow">
        <button @click="sidebarOpen = true" title="Otwórz menu" class="text-slate-800 hover:text-slate-600 text-2xl">
            <i class="fas fa-chevron-left"></i>
        </button>
    </div>

    <!-- Nakładka -->
    <div
        x-show="sidebarOpen"
        @click="sidebarOpen = false"
        class="fixed inset-0 bg-black/40 z-30"
        x-transition.opacity
    ></div>

    <!-- Sidebar -->
    <div
        x-show="sidebarOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="fixed top-0 left-0 w-4/5 max-w-xs h-full
               bg-slate-700 text-slate-100
               border-r border-slate-600
               shadow-xl px-4 py-6 z-40"
    >

        <!-- Nagłówek -->
        <div class="text-center mb-8">
            <i class="fa-solid fa-church text-4xl text-sky-400 mb-3"></i>
            <h2 class="text-lg font-bold text-slate-100">Diecezja</h2>
            <p class="text-xs uppercase tracking-wider text-sky-300">{{ Auth::user()->diocese }}</p>

            <div class="mt-4">
                <p class="text-sm font-semibold text-slate-200">Ksiądz Koordynator:</p>
                <p class="text-xs uppercase tracking-wide text-sky-300">
                    {{ Auth::user()->name }} {{ Auth::user()->surname }}
                </p>
            </div>
        </div>

        <hr class="border-slate-500 mb-6 w-3/4 mx-auto">

        <!-- Lista opcji -->
        <ul class="space-y-3 text-sm font-medium">
            <li>
                <a href="#"
                   class="group flex items-center gap-3 px-4 py-2 border border-slate-600 rounded-lg transition-all
                          hover:bg-slate-600 hover:border-slate-500 hover:text-white
                          {{ request()->routeIs('koordynator.dashboard') ? 'bg-slate-600 text-white border-slate-500 font-semibold' : 'text-slate-200' }}">
                    <i class="fa-solid fa-file-pen text-base text-sky-300
                               group-hover:text-white group-hover:scale-110 transition-transform duration-200"></i>
                    <span>Raporty</span>
                </a>
            </li>

            <li>
                <a href="#"
                   class="group flex items-center gap-3 px-4 py-2 border border-slate-600 rounded-lg transition-all
                          hover:bg-slate-600 hover:border-slate-500 hover:text-white
                          {{ request()->routeIs('koordynator.search') ? 'bg-slate-600 text-white border-slate-500 font-semibold' : 'text-slate-200' }}">
                    <i class="fa-solid fa-magnifying-glass text-base text-sky-300
                               group-hover:text-white group-hover:scale-110 transition-transform duration-200"></i>
                    <span>Znajdź stypendystę</span>
                </a>
            </li>

            <li>
                <a href="#"
                   class="group flex items-center gap-3 px-4 py-2 border border-slate-600 rounded-lg transition-all
                          hover:bg-slate-600 hover:border-slate-500 hover:text-white
                          {{ request()->routeIs('koordynator.history') ? 'bg-slate-600 text-white border-slate-500 font-semibold' : 'text-slate-200' }}">
                    <i class="fa-solid fa-clock-rotate-left text-base text-slate-300
                               group-hover:text-white group-hover:scale-110 transition-transform duration-200"></i>
                    <span>Historia obozowa</span>
                </a>
            </li>
        </ul>

        <hr class="border-slate-600 my-8 w-3/4 mx-auto">

        <!-- Wylogowanie -->
        <form method="POST" action="{{ route('logout') }}" class="flex justify-center">
            @csrf
            <button type="submit"
                    class="w-full flex items-center justify-center gap-2 px-4 py-2
                           bg-slate-600 text-white text-sm font-semibold rounded-lg shadow
                           hover:bg-slate-500 hover:shadow-md transition-all duration-200">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                Wyloguj się
            </button>
        </form>
    </div>
</div>

<!-- 📁 SIDEBAR -->
<aside class="w-64 bg-slate-800 text-slate-200 border-r border-slate-700 flex flex-col min-h-screen shadow-lg">

    <!-- 🔹 Nagłówek -->
    <div class="flex items-center justify-center h-16 border-b border-slate-700 bg-slate-900">
        <a href="{{ route('biuro.index') }}" class="flex items-center gap-2">
            <i class="fa-solid fa-briefcase text-slate-200 text-lg"></i>
            <h1 class="text-lg font-semibold tracking-wide text-white">
                Biuro
            </h1>
        </a>
    </div>

    <!-- 🔹 MENU -->
    <nav class="flex-1 px-3 py-4 text-sm space-y-4">

        <!-- 🔸 Sekcja: Uczestnicy -->
        <div class="space-y-2">
            <span class="text-xs uppercase text-slate-400 font-semibold tracking-wider px-1">
                Uczestnicy
            </span>

            <!-- Stypendyści -->
            <div class="space-y-1">
                <a href="{{ route('biuro.stypendysci.index') }}"
                   class="flex items-center gap-2 px-4 py-2 rounded-md transition hover:bg-slate-700">
                    <i class="fa-solid fa-user-graduate text-blue-400"></i>
                    <span class="font-medium text-slate-100 text-sm">Stypendyści</span>
                </a>

                <!-- Podzakładki -->
                <div class="ml-6 space-y-1">
                    <a href="{{ route('biuro.uczniowie.index') }}"
                       class="block px-3 py-1 text-slate-300 hover:bg-slate-700 rounded-md transition text-xs">
                        Uczniowie
                    </a>
                    <a href="{{ route('biuro.maturzysci.index') }}"
                       class="block px-3 py-1 text-slate-300 hover:bg-slate-700 rounded-md transition text-xs">
                        Maturzyści
                    </a>
                    <a href="{{ route('biuro.studenci.index') }}"
                       class="block px-3 py-1 text-slate-300 hover:bg-slate-700 rounded-md transition text-xs">
                        Studenci
                    </a>
                </div>
            </div>

            <!-- Wolontariusze -->
            <a href="{{ route('biuro.wolontariusze.index') }}"
               class="flex items-center gap-2 px-4 py-2 rounded-md transition hover:bg-slate-700 text-sm">
                <i class="fa-solid fa-hands-helping text-blue-400"></i>
                <span class="font-medium text-slate-100">Wolontariusze</span>
            </a>
        </div>

        <hr class="border-slate-700" />

        <!-- 🔸 Sekcja: Organizacja -->
        <div class="space-y-2">
            <span class="text-xs uppercase text-slate-400 font-semibold tracking-wider px-1">
                Organizacja
            </span>

            <a href="{{ route('biuro.koordynatorzy.index') }}"
               class="flex items-center gap-2 px-4 py-2 rounded-md transition hover:bg-slate-700 text-sm">
                <i class="fa-solid fa-user-tie text-blue-400"></i>
                <span class="font-medium text-slate-100">Koordynatorzy</span>
            </a>

            <a href="{{ route('biuro.obozy.index') }}"
               class="flex items-center gap-2 px-4 py-2 rounded-md transition hover:bg-slate-700 text-sm">
                <i class="fa-solid fa-campground text-blue-400"></i>
                <span class="font-medium text-slate-100">Obozy</span>
            </a>
        </div>

        <hr class="border-slate-700" />

        <a href="{{ route('biuro.search') }}"
            class="flex items-center gap-2 px-4 py-2 rounded-md transition hover:bg-slate-700 text-sm">
            <i class="fa-solid fa-search text-blue-400"></i>
            <span class="font-medium text-yellow-200">Znajdź stypendystę</span>
        </a>
    </nav>

</aside>

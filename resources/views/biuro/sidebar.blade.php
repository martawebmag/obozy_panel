<!-- 📁 SIDEBAR -->
<aside class="w-64 bg-blue-100 text-slate-700 border-r border-slate-300 flex flex-col min-h-screen">

    <!-- 🔹 Nagłówek -->
    <div class="flex items-center justify-center h-20 border-b border-slate-300 bg-blue-200">
        <a href="{{ route('biuro.index') }}" class="flex items-center gap-2">
            <i class="fa-solid fa-briefcase text-slate-700 text-xl"></i>
            <h1 class="text-xl font-semibold tracking-wide text-slate-800">
                Biuro
            </h1>
        </a>
    </div>

    <!-- 🔹 MENU -->
    <nav class="flex-1 px-4 py-6 text-sm space-y-6">

        <!-- 🔸 Sekcja: Uczestnicy -->
        <div class="space-y-3">
            <span class="text-xs uppercase text-slate-500 font-semibold tracking-wider px-2">
                Uczestnicy
            </span>

            <!-- Stypendyści (główna) -->
            <div class="space-y-1">
                <a href="{{ route('biuro.stypendysci.index') }}"
                   class="flex items-center gap-3 px-5 py-3 rounded-md transition hover:bg-blue-200">
                    <i class="fa-solid fa-user-graduate text-orange-600"></i>
                    <span class="font-semibold text-slate-800">Stypendyści</span>
                </a>

                <!-- Podzakładki -->
                <div class="ml-8 space-y-1">
                    <a href="#"
                       class="block px-4 py-2 text-slate-700 hover:text-blue-700 hover:bg-blue-200 rounded-md transition">
                        Uczniowie
                    </a>

                    <a href="#"
                       class="block px-4 py-2 text-slate-700 hover:text-blue-700 hover:bg-blue-200 rounded-md transition">
                        Maturzyści
                    </a>

                    <a href="#"
                       class="block px-4 py-2 text-slate-700 hover:text-blue-700 hover:bg-blue-200 rounded-md transition">
                        Studenci
                    </a>
                </div>
            </div>

            <!-- Wolontariusze -->
            <a href="{{ route('biuro.wolontariusze.index') }}"
               class="flex items-center gap-3 px-5 py-3 rounded-md transition hover:bg-blue-200">
                <i class="fa-solid fa-hands-helping text-green-600"></i>
                <span class="font-semibold text-slate-800">Wolontariusze</span>
            </a>
        </div>

        <hr class="border-slate-200" />

        <!-- 🔸 Sekcja: Organizacja -->
        <div class="space-y-3">
            <span class="text-xs uppercase text-slate-500 font-semibold tracking-wider px-2">
                Organizacja
            </span>

            <a href="{{ route('biuro.koordynatorzy.index') }}"
               class="flex items-center gap-3 px-5 py-3 rounded-md transition hover:bg-blue-200">
                <i class="fa-solid fa-user-tie text-yellow-600"></i>
                <span class="font-semibold text-slate-800">Koordynatorzy</span>
            </a>

            <a href="{{ route('biuro.obozy.index') }}"
               class="flex items-center gap-3 px-5 py-3 rounded-md transition hover:bg-blue-200">
                <i class="fa-solid fa-campground text-blue-600"></i>
                <span class="font-semibold text-slate-800">Obozy</span>
            </a>
        </div>

    </nav>

</aside>

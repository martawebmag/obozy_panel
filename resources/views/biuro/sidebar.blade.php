<!-- 📁 SIDEBAR -->
<aside class="w-64 bg-slate-800 text-slate-200 border-r border-slate-700 flex flex-col min-h-screen shadow-lg">

    <!-- 🔹 Nagłówek -->
    <div class="flex items-center justify-center h-20 border-b border-slate-700 bg-slate-900">
        <a href="{{ route('biuro.index') }}" class="flex items-center gap-2">
            <i class="fa-solid fa-briefcase text-slate-200 text-xl"></i>
            <h1 class="text-xl font-semibold tracking-wide text-white">
                Biuro
            </h1>
        </a>
    </div>

    <!-- 🔹 MENU -->
    <nav class="flex-1 px-4 py-6 text-sm space-y-6">

        <!-- 🔸 Sekcja: Uczestnicy -->
        <div class="space-y-3">
            <span class="text-xs uppercase text-slate-400 font-semibold tracking-wider px-2">
                Uczestnicy
            </span>

            <!-- Stypendyści -->
            <div class="space-y-1">
                <a href="{{ route('biuro.stypendysci.index') }}"
                   class="flex items-center gap-3 px-5 py-3 rounded-md transition hover:bg-slate-700">
                    <i class="fa-solid fa-user-graduate text-blue-400"></i>
                    <span class="font-medium text-slate-100">Stypendyści</span>
                </a>

                <!-- Podzakładki -->
                <div class="ml-8 space-y-1">
                    <a href="#"
                       class="block px-4 py-2 text-slate-300 hover:bg-slate-700 rounded-md transition">
                        Uczniowie
                    </a>

                    <a href="#"
                       class="block px-4 py-2 text-slate-300 hover:bg-slate-700 rounded-md transition">
                        Maturzyści
                    </a>

                    <a href="#"
                       class="block px-4 py-2 text-slate-300 hover:bg-slate-700 rounded-md transition">
                        Studenci
                    </a>
                </div>
            </div>

            <!-- Wolontariusze -->
            <a href="{{ route('biuro.wolontariusze.index') }}"
               class="flex items-center gap-3 px-5 py-3 rounded-md transition hover:bg-slate-700">
                <i class="fa-solid fa-hands-helping text-blue-400"></i>
                <span class="font-medium text-slate-100">Wolontariusze</span>
            </a>
        </div>

        <hr class="border-slate-700" />

        <!-- 🔸 Sekcja: Organizacja -->
        <div class="space-y-3">
            <span class="text-xs uppercase text-slate-400 font-semibold tracking-wider px-2">
                Organizacja
            </span>

            <a href="{{ route('biuro.koordynatorzy.index') }}"
               class="flex items-center gap-3 px-5 py-3 rounded-md transition hover:bg-slate-700">
                <i class="fa-solid fa-user-tie text-blue-400"></i>
                <span class="font-medium text-slate-100">Koordynatorzy</span>
            </a>

            <a href="{{ route('biuro.obozy.index') }}"
               class="flex items-center gap-3 px-5 py-3 rounded-md transition hover:bg-slate-700">
                <i class="fa-solid fa-campground text-blue-400"></i>
                <span class="font-medium text-slate-100">Obozy</span>
            </a>
        </div>

    </nav>

</aside>

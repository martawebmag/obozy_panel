<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png">
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="min-h-screen flex flex-col bg-gray-100">

    {{-- NAV --}}
    <nav class="bg-slate-200 border-b border-slate-400/20">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">

            {{-- Logo + nazwa --}}
            <a href="/" class="flex items-center space-x-4">
                <img src="{{ asset('images/logoFDNT.png') }}" alt="logo"
                    class="w-16 h-16">
                <span class="text-xl font-bold text-slate-800 tracking-tight">
                    Fundacja „Dzieło Nowego Tysiąclecia”
                </span>
            </a>

            {{-- ✅ Pokaż pełną nawigację TYLKO na stronie głównej --}}
            @if (request()->is('/'))
                {{-- <div class="flex space-x-8">
                    <a href="{{ route('stypendysci.index') }}" class="text-blue-800 font-semibold uppercase hover:text-blue-600">Stypendyści</a>
                    <a href="{{ route('wolontariusze.index') }}" class="text-blue-800 font-semibold uppercase hover:text-blue-600">Wolontariusze</a>
                </div> --}}
            @auth
                <div class="flex space-x-8">
                    <a href="{{ route(auth()->user()->dashboardRoute()) }}" class="text-sky-700 font-semibold"><i class="fa-solid fa-dashboard mr-1"></i> Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button
                            class="text-red-900 font-semibold flex items-center space-x-1">
                            <i class="fa-solid fa-right-from-bracket mr-1"></i>
                            <span>Wyloguj</span>
                        </button>
                    </form>

                </div>
            @endauth
            @endif

            @if(request()->is('login') || request()->is('register') || request()->is('forgot-password') || request()->is('reset-password/*') || request()->is('verify-email') || request()->is('panel'))
                <div class="flex space-x-6">
                    <a href="{{ route('login') }}"
                    class="text-slate-700 font-semibold hover:underline">
                    <i class="fa-solid fa-arrow-right-to-bracket text-sky-600 mr-1"></i> Logowanie
                    </a>

                    <a href="{{ route('register') }}"
                    class="text-slate-700 font-semibold hover:underline">
                    <i class="fa-solid fa-id-card text-sky-600 mr-1"></i> Rejestracja
                    </a>
                </div>
            @endif
    </nav>

    {{-- CONTENT --}}
    <main class="flex-grow mx-auto w-full">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-slate-700 text-blue-50 py-4 text-center text-sm border-t border-blue-900 mt-auto">
        <p>&copy; {{ date('Y') }} Fundacja Dzieło Nowego Tysiąclecia. Wszelkie prawa zastrzeżone.</p>
    </footer>
 @livewireScripts
</body>
</html>


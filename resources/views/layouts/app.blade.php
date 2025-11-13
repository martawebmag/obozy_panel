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
<nav class="bg-slate-200 border-b border-slate-300 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">

        <!-- Logo -->
        <a href="/" class="flex items-center space-x-3">
            <img src="{{ asset('images/logoFDNT.png') }}" alt="logo" class="w-14 h-14 rounded-md shadow-sm">
            <span class="text-lg sm:text-xl font-semibold text-slate-800 tracking-tight">
                Fundacja „Dzieło Nowego Tysiąclecia”
            </span>
        </a>

        <!-- Prawa część: Dashboard + Dropdown -->
        <div class="flex items-center space-x-4">

            @if(request()->is('profile'))
                <a href="{{ route(auth()->user()->dashboardRoute()) }}"
                   class="hidden sm:inline-flex items-center px-3 py-1.5 text-sm font-medium text-blue-700 hover:text-blue-800 hover:bg-blue-50 rounded transition">
                    <i class="fa-solid fa-dashboard mr-1"></i> Dashboard
                </a>
            @endif

            <!-- Dropdown -->
            <div class="relative" x-data="{ open: false }" @keydown.escape="open = false" @click.away="open = false">
                <button @click="open = !open"
                        class="inline-flex items-center px-4 py-2 border border-slate-300 rounded-md text-sm font-medium text-slate-700 bg-slate-50 hover:bg-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                    <span>{{ Auth::user()->name }} {{ Auth::user()->surname }}</span>
                    <svg class="ml-2 h-4 w-4 fill-current text-slate-500 transition-transform"
                         :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div x-show="open" x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     class="absolute right-0 mt-2 w-48 bg-slate-50 border border-slate-300 rounded-md shadow-lg z-50">

                    <x-dropdown-link :href="route('profile.edit')" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-200 hover:text-slate-900">
                        Profil
                    </x-dropdown-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-200 hover:text-slate-900">
                            Wyloguj
                        </x-dropdown-link>
                    </form>

                </div>
            </div>
        </div>
    </div>
</nav>



    {{-- CONTENT --}}
    <main class="flex-grow mx-auto w-full">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('layouts.footer')
 @livewireScripts
</body>
</html>


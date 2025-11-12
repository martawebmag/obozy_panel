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
    <nav class="bg-slate-300 border-b border-slate-400/40">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="/" class="flex items-center space-x-4">
                <img src="{{ asset('images/logoFDNT.png') }}" alt="logo"
                     class="w-16 h-16">
                <span class="text-xl font-bold text-slate-800 tracking-tight">
                    Fundacja „Dzieło Nowego Tysiąclecia”
                </span>
            </a>

            <div class="flex items-center space-x-4">

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @if(request()->is('profile'))
                    <div class="flex mr-4">
                        <a href="{{ route(auth()->user()->dashboardRoute()) }}" class="text-blue-700">
                            <i class="fa-solid fa-dashboard mr-1"></i> Dashboard
                        </a>
                    </div>
                @endif
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-slate-300 text-md leading-4 font-medium rounded-md text-slate-600 bg-white focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }} {{ Auth::user()->surname }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profil') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Wyloguj') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
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


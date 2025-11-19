@extends('layouts.guest')

@section('content')
<div class="min-h-screen bg-slate-100 text-gray-800 font-sans flex items-start">

    <section class="max-w-6xl mx-auto w-full px-6 py-14 grid md:grid-cols-2 gap-10">

        <!-- 🔹 LEWA – nagłówki + logo -->
        <div class="flex flex-col justify-start">


            <h1 class="text-3xl md:text-4xl font-bold text-sky-950 leading-tight mt-10 mb-8">
                Panel Biura Fundacji
                <br> i Koordynatorów Diecezjalnych
            </h1>

            <p class="text-gray-700 mb-10 text-lg leading-relaxed max-w-xl">
                Zaloguj się, aby zarządzać zapisami, uczestnikami oraz dokumentami obozowymi
                i uzyskać dostęp do panelu administracyjnego FDNT.
            </p>

            <!-- 🔗 Rejestracja -->
            <div class="text-md mt-2">
                <span class="text-gray-700">Nie masz konta?</span>
                <a href="{{ route('register') }}"
                   class="text-sky-700 font-medium hover:underline">
                    Zarejestruj się
                </a>
            </div>

        </div>


        <!-- 🔒 PRAWA – formularz -->
        <div class="bg-white border border-slate-200 rounded-2xl p-8 shadow-md w-full max-w-sm md:ml-auto mx-auto">

            <h2 class="text-2xl font-semibold text-sky-950 text-center mb-8">
                Zaloguj się do panelu
            </h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="text-gray-700 font-medium">Email</label>
                    <input id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required autofocus
                        class="w-full mt-2 px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-sky-500"/>
                </div>

                <!-- Hasło -->
                <div class="mt-6">
                    <label for="password" class="text-gray-700 font-medium">Hasło</label>
                    <input id="password"
                        type="password"
                        name="password"
                        required
                        class="w-full mt-2 px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-sky-500"/>
                </div>

                <!-- Zapamiętaj mnie -->
                <div class="mt-4 flex items-center">
                    <input id="remember_me" type="checkbox" name="remember"
                           class="rounded border-gray-300 text-sky-600 focus:ring-sky-500"/>
                    <label for="remember_me" class="ms-2 text-sm text-gray-600">
                        Zapamiętaj mnie
                    </label>
                </div>

                <!-- Reset hasła -->
                @if (Route::has('password.request'))
                    <div class="mt-4 text-right">
                        <a href="{{ route('password.request') }}"
                           class="text-sm text-sky-700 hover:text-sky-900">
                            Zapomniałeś hasła?
                        </a>
                    </div>
                @endif

                <button
                    class="w-full mt-8 bg-gradient-to-r from-sky-800 to-sky-700 text-white font-semibold py-3 rounded-lg shadow hover:shadow-md hover:scale-103 transition">
                    Zaloguj
                </button>
            </form>

        </div>

    </section>

</div>
@endsection

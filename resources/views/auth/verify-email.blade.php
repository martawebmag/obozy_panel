@extends('layouts.guest')

@section('content')

<div class="max-w-md mx-auto bg-white border-gray-300 border rounded-lg p-8 mt-8 shadow-sm">
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Dziękujemy za rejestrację! Zanim zaczniesz, prosimy o potwierdzenie adresu e-mail, klikając link, który właśnie wysłaliśmy na Twoją skrzynkę pocztową. Jeśli nie otrzymałeś wiadomości e-mail, chętnie wyślemy Ci kolejną.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Na adres e-mail podany podczas rejestracji wysłano nowy link weryfikacyjny.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Wyślij ponownie e-mail weryfikacyjny') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Wyloguj') }}
            </button>
        </form>
    </div>
@endsection

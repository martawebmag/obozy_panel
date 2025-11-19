@extends('layouts.guest')

@section('content')

<div class="max-w-md mx-auto bg-white border-gray-300 border rounded-lg p-8 mt-8 shadow-sm">
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Proszę potwierdzić hasło przed kontynuowaniem.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Hasło')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('Powtórz hasło') }}
            </x-primary-button>
        </div>
    </form>
@endsection

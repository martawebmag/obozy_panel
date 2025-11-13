@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex bg-gray-200 border-t-2 border-slate-300">

        @include('biuro.sidebar')

        <!-- 🧾 GŁÓWNA ZAWARTOŚĆ -->
        <main class="flex-1 p-10 bg-slate-50 shadow-inner border-l-2 border-slate-200">

            @if (session('success'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" x-transition
                    class="bg-green-200 text-green-800 px-4 py-2 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <div x-data="{ tab: 'zgloszenia' }" class="mb-6" x-cloak>

                <!-- 🔹 Przełączniki -->
                <div class="flex space-x-2 mb-4">
                    <button @click="tab = 'zgloszenia'"
                        :class="tab === 'zgloszenia' ? 'bg-blue-600 text-white' : 'bg-gray-300 text-gray-700'"
                        class="px-4 py-2 rounded font-medium transition">
                        Zgłoszenia
                    </button>

                    <button @click="tab = 'usprawiedliwienia'"
                        :class="tab === 'usprawiedliwienia' ? 'bg-blue-600 text-white' : 'bg-gray-300 text-gray-700'"
                        class="px-4 py-2 rounded font-medium transition">
                        Usprawiedliwienia
                    </button>
                </div>

                <!-- 🔹 Zgłoszenia -->
                <template x-if="tab === 'zgloszenia'">
                    <div x-transition:enter="transition ease-out duration-500"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform -translate-y-2">
                        @include('biuro.stypendysci.uczniowie.zgloszenia')
                    </div>
                </template>

                <!-- 🔹 Usprawiedliwienia -->
                <template x-if="tab === 'usprawiedliwienia'">
                    <div x-transition:enter="transition ease-out duration-500"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform -translate-y-2">
                        @include('biuro.stypendysci.uczniowie.usprawiedliwienia')
                    </div>
                </template>

            </div>



        </main>
    </div>
@endsection

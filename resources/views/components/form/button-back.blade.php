@props([
    'type' => 'button',       // Typ buttona: button, submit, reset
    'variant' => 'secondary',   // Wariant: primary, secondary
])

@php
    // Klasy dla różnych wariantów
    $baseClasses = 'px-4 py-2 rounded font-medium focus:outline-none focus:ring transition';
    $variantClasses = match($variant) {
        'secondary' => 'bg-gray-200 text-gray-800 hover:bg-gray-300 focus:ring-gray-300',
        default => 'bg-sky-600 text-white hover:bg-sky-700 focus:ring-sky-600',
    };
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => "$baseClasses $variantClasses"]) }}>
    {{ $slot }}
</button>

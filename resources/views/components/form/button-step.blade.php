@props([
    'variant' => 'next',
    'type' => 'button',
])

@php
    $classes = match($variant) {
        'prev' => 'px-8 py-2 bg-gray-300 rounded hover:bg-gray-400 transition',
        'next' => 'px-8 py-2 bg-sky-700 text-white rounded hover:bg-sky-800 transition',
        'submit' => 'px-8 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition',
        default => '',
    };
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</button>

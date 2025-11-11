@props([
    'label' => '',   // Tekst przy checkboxie
    'name',          // Nazwa pola (required)
    'value' => 1,    // Wartość checkboxa
    'checked' => false, // Domyślnie zaznaczony czy nie
    'model' => '',
])

<div class="mb-2 flex items-center">
    <input
        type="checkbox"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ $value }}"
        wire:model.lazy="{{ $model }}"
        {{ old($name, $checked) ? 'checked' : '' }}
        {{ $attributes->merge(['class' => 'h-4 w-4 text-blue-600 border-slate-300 rounded focus:ring focus:ring-blue-200']) }}
    >
    @if($label)
        <label for="{{ $name }}" class="ml-2 block text-slate-700 text-xs">
            {{ $label }}
        </label>
    @endif
</div>

@error($name)
    <p class="text-red-500 text-xs mt-1 ml-6">{{ $message }}</p>
@enderror

@props([
    'label' => '',       // Tekst labelki
    'name',              // Nazwa selecta (required)
    'options' => [],     // Tablica opcji ['value' => 'Etykieta']
    'value' => '',       // Wartość domyślna
    'placeholder' => '', // Placeholder (opcjonalny pierwszy element)
    'model' => '',
])

<div class="mb-2 w-full">
    @if($label)
        <label for="{{ $name }}" class="block text-slate-700 text-xs mb-1">
            {{ $label }}
        </label>
    @endif

    <select
        name="{{ $name }}"
        id="{{ $name }}"
        wire:model.lazy="{{ $model }}"

        {{ $attributes->merge(['class' => 'w-full border border-slate-300 rounded px-2 py-1 focus:outline-none focus:ring focus:border-blue-200  text-xs']) }}
    >
        @if($placeholder)
            <option value="">{{ $placeholder }}</option>
        @endif

        @foreach($options as $optionValue => $optionLabel)
            <option value="{{ $optionValue }}" {{ old($name, $value) == $optionValue ? 'selected' : '' }}>
                {{ $optionLabel }}
            </option>
        @endforeach
    </select>

    @error($name)
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>

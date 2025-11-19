@props([
    'label' => '',       // Tekst labelki
    'name',              // Nazwa selecta (required)
    'options' => [],     // Tablica opcji ['value' => 'Etykieta']
    'value' => '',       // Wartość domyślna
    'placeholder' => '', // Placeholder (opcjonalny pierwszy element)
    'model' => '',
    'required' => false,
])

<div class="w-full">
    @if($label)
        <label for="{{ $name }}" class="block text-black text-xs ml-1">
            {{ $label }}

            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <select
        name="{{ $name }}"
        id="{{ $name }}"
        wire:model.lazy="{{ $model }}"

        {{ $attributes->merge(['class' => 'w-full border border-slate-300 rounded bg-white shadow-sm px-2 py-1 focus:border-sky-600 text-xs']) }}
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
        <p class="text-red-500 text-[14px] mt-1">{{ $message }}</p>
    @enderror
</div>

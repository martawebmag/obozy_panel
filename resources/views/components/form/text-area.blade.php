@props([
    'label' => '',         // Tekst labelki
    'name',                // Nazwa pola (required)
    'value' => '',         // Wartość domyślna
    'placeholder' => '',   // Placeholder
    'rows' => 4,           // Ilość wierszy
    'model' => '',
])

<div class="mb-2 w-full">
    @if($label)
        <label for="{{ $name }}" class="block text-slate-700 text-xs mb-1">
            {{ $label }}
        </label>
    @endif

    <textarea
        name="{{ $name }}"
        id="{{ $name }}"
        rows="{{ $rows }}"
        placeholder="{{ $placeholder }}"
        wire:model.lazy="{{ $model }}"
        {{ $attributes->merge(['class' => 'w-full border border-slate-300 rounded px-2 py-1 focus:outline-none focus:ring focus:border-blue-200']) }}
    >{{ old($name, $value) }}</textarea>

    @error($name)
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>

@props([
    'label' => '',         // Tekst labelki
    'name',                // Nazwa pola (required)
    'value' => '',         // Wartość domyślna
    'placeholder' => '',   // Placeholder
    'rows' => 4,           // Ilość wierszy
    'model' => '',
])

<div class="w-full">
    @if($label)
        <label for="{{ $name }}" class="block text-black text-xs mb-0.5">
            {{ $label }}
        </label>
    @endif

    <textarea
        name="{{ $name }}"
        id="{{ $name }}"
        rows="{{ $rows }}"
        placeholder="{{ $placeholder }}"
        wire:model.lazy="{{ $model }}"
        {{ $attributes->merge(['class' => 'w-full border border-slate-300 rounded bg-white shadow-sm px-2 py-1 focus:outline-none focus:ring-sky-500 text-xs']) }}
    >{{ old($name, $value) }}</textarea>

    @error($name)
        <p class="text-red-500 text-[14px] mt-1">{{ $message }}</p>
    @enderror
</div>

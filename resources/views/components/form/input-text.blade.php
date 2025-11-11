@props([
    'label' => '',
    'name',
    'type' => 'text',
    'value' => '',
    'model' => '',
])

<div class="mb-2 w-full">
    @if($label)
        <label for="{{ $name }}" class="block text-black text-xs mb-1 ml-1">
            {{ $label }}
        </label>
    @endif

    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, $value) }}"
        wire:model.lazy="{{ $model }}"
        {{ $attributes->merge(['class' => 'w-full border border-slate-300 bg-slate-50 rounded px-2 py-1 text-xs text-slate-900 focus:outline-none focus:ring focus:border-blue-200']) }}
    >

    @error($name)
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>

@props([
    'label' => '',
    'name',
    'type' => 'text',
    'value' => '',
    'model' => '',
    'required' => false,
])

<div class="w-full">
    @if($label)
        <label for="{{ $name }}" class="block text-black text-xs ml-1 mb-0.5">
            {{ $label }}

            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, $value) }}"
        wire:model.lazy="{{ $model }}"
        {{ $attributes->merge(['class' => 'w-full border border-slate-300 rounded bg-white shadow-sm px-2 py-1 text-xs text-slate-900 focus:ring-sky-500']) }}
    >

    @error($name)
        <p class="text-red-500 text-[14px] mt-1">{{ $message }}</p>
    @enderror
</div>

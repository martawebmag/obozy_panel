@props([
    'label' => '',
    'name',
    'type' => 'text',
    'value' => '',
    'model' => '',
    'required' => false,
])

<div class="mb-2 w-full">
    @if($label)
        <label for="{{ $name }}" class="block text-black text-xs mb-1 ml-1">
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
        {{ $attributes->merge(['class' => 'w-full border border-slate-300 bg-slate-50 rounded px-2 py-1 text-xs text-slate-900 focus:outline-none focus:ring focus:border-blue-200']) }}
    >

    @error($name)
        <p class="text-red-500 text-[14px] mt-1">{{ $message }}</p>
    @enderror
</div>

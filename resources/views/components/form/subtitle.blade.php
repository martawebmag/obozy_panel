@props([
    'label' => '',
])

<div class="w-full">

        <div {{ $attributes->merge(['class' => 'text-md bg-slate-200 px-1 mb-4']) }}>
            {{ $label }}
        </div>

</div>

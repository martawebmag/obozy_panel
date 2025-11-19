@props([
    'name',
    'label' => null,
])

<div class="mb-2">
    @if($label)
        <label for="{{ $name }}" class="block text-sm text-gray-700 mb-1">
            {{ $label }}
        </label>
    @endif

    <div
        x-data="{ fileName: '' }"
        class="flex items-center w-full"
    >
        <!-- UI wrapper -->
        <label
            for="{{ $name }}"
            class="
                flex items-center justify-center
                px-4 py-2 text-sm text-white bg-sky-600
                rounded-l-lg cursor-pointer hover:bg-sky-700
                transition duration-150"
        >
            Wybierz plik
        </label>

        <!-- file info + real input -->
        <div
            class="
                flex-1 px-3 py-2 border border-gray-300
                rounded-r-lg bg-white text-gray-700 text-sm
                shadow-sm
            "
        >
            <span x-text="fileName || 'Nie wybrano pliku'"></span>
        </div>

        <input
            type="file"
            name="{{ $name }}"
            id="{{ $name }}"
            class="hidden"
            @change="fileName = $event.target.files[0]?.name"
            {{ $attributes }}
        >
    </div>

    @error($name)
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>

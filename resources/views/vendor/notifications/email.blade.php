<x-mail::message>
{{-- Nagłówek --}}
<div class="text-center mb-6">
    @if (!empty($greeting))
        <h1 class="text-2xl font-bold text-slate-800">{{ $greeting }}</h1>
    @else
        <h1 class="text-2xl font-bold text-slate-800">
            @if ($level === 'error')
                @lang('Ups! Coś poszło nie tak!')
            @else
                @lang('Cześć!')
            @endif
        </h1>
    @endif
</div>

{{-- Wprowadzenie --}}
<div class="mb-6 text-slate-700 text-base leading-relaxed">
@foreach ($introLines as $line)
    <p class="mb-2">Otrzymałeś maila z związku z założeniem konta na stronie obozy/panel. Ustaw teraz swoje hasło i korzystaj z panelu.</p>
@endforeach
</div>

{{-- Przycisk akcji --}}
@isset($actionText)
<?php
    $color = match ($level) {
        'success', 'error' => $level,
        default => 'primary',
    };
?>
<div class="text-center my-6">
    <x-mail::button :url="$actionUrl" :color="$color" class="px-6 py-3 rounded-lg font-semibold bg-blue-800 text-white">
        Ustaw hasło
    </x-mail::button>
</div>
@endisset

{{-- Outro --}}
<div class="mb-6 text-slate-700 text-base leading-relaxed">
    <p class="mb-2">Link resetujący hasło jest ważny 60 minut</p>
</div>

{{-- Stopka / Podpis --}}
<div class="mt-8 text-sm text-slate-500 text-center">
    @if (!empty($salutation))
        {{ $salutation }}
    @else
        @lang('Pozdrawiamy,')<br>
        <strong>FDNT</strong>
    @endif
</div>

{{-- Subcopy / link alternatywny --}}
@isset($actionText)
<x-slot:subcopy>
    <p class="text-xs text-slate-400 mt-4 text-center">
        @lang(
            "Jeśli masz problem z kliknięciem przycisku \"Ustaw hasło\", skopiuj i wklej poniższy link do przeglądarki:",
            ['actionText' => $actionText]
        )<br>
        <span class="break-all">{{ $displayableActionUrl }}</span>
    </p>
</x-slot:subcopy>
@endisset
</x-mail::message>

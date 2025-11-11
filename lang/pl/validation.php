<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Linie językowe walidacji
    |--------------------------------------------------------------------------
    |
    | Poniższe linie zawierają domyślne komunikaty błędów używane przez klasę
    | walidatora. Możesz dowolnie modyfikować te wiadomości.
    |
    */

    'accepted' => 'Pole :attribute musi zostać zaakceptowane.',
    'active_url' => 'Pole :attribute nie jest prawidłowym adresem URL.',
    'after' => 'Pole :attribute musi być datą po :date.',
    'after_or_equal' => 'Pole :attribute musi być datą nie wcześniejszą niż :date.',
    'alpha' => 'Pole :attribute może zawierać tylko litery.',
    'alpha_dash' => 'Pole :attribute może zawierać tylko litery, cyfry, myślniki i podkreślenia.',
    'alpha_num' => 'Pole :attribute może zawierać tylko litery i cyfry.',
    'array' => 'Pole :attribute musi być tablicą.',
    'before' => 'Pole :attribute musi być datą przed :date.',
    'before_or_equal' => 'Pole :attribute musi być datą nie późniejszą niż :date.',
    'between' => [
        'numeric' => 'Pole :attribute musi zawierać się między :min a :max.',
        'file' => 'Plik :attribute musi mieć między :min a :max kilobajtów.',
        'string' => 'Pole :attribute musi zawierać od :min do :max znaków.',
        'array' => 'Pole :attribute musi mieć od :min do :max elementów.',
    ],
    'boolean' => 'Pole :attribute musi być prawdą lub fałszem.',
    'confirmed' => 'Potwierdzenie pola :attribute nie zgadza się.',
    'date' => 'Pole :attribute nie jest prawidłową datą.',
    'date_equals' => 'Pole :attribute musi być datą równą :date.',
    'date_format' => 'Pole :attribute nie pasuje do formatu :format.',
    'different' => 'Pola :attribute i :other muszą się różnić.',
    'digits' => 'Pole :attribute musi mieć :digits cyfr.',
    'digits_between' => 'Pole :attribute musi mieć od :min do :max cyfr.',
    'email' => 'Pole :attribute musi być prawidłowym adresem e-mail.',
    'ends_with' => 'Pole :attribute musi kończyć się jednym z: :values.',
    'exists' => 'Wybrane :attribute jest nieprawidłowe.',
    'file' => 'Pole :attribute musi być plikiem.',
    'filled' => 'Pole :attribute jest wymagane.',
    'gt' => [
        'numeric' => 'Pole :attribute musi być większe niż :value.',
        'file' => 'Plik :attribute musi być większy niż :value kilobajtów.',
        'string' => 'Pole :attribute musi mieć więcej niż :value znaków.',
        'array' => 'Pole :attribute musi mieć więcej niż :value elementów.',
    ],
    'gte' => [
        'numeric' => 'Pole :attribute musi być większe lub równe :value.',
        'file' => 'Plik :attribute musi mieć co najmniej :value kilobajtów.',
        'string' => 'Pole :attribute musi mieć co najmniej :value znaków.',
        'array' => 'Pole :attribute musi mieć co najmniej :value elementów.',
    ],
    'image' => 'Pole :attribute musi być obrazem.',
    'in' => 'Wybrane :attribute jest nieprawidłowe.',
    'integer' => 'Pole :attribute musi być liczbą całkowitą.',
    'ip' => 'Pole :attribute musi być prawidłowym adresem IP.',
    'json' => 'Pole :attribute musi być poprawnym ciągiem JSON.',
    'max' => [
        'numeric' => 'Pole :attribute nie może być większe niż :max.',
        'file' => 'Plik :attribute nie może być większy niż :max kilobajtów.',
        'string' => 'Pole :attribute nie może mieć więcej niż :max znaków.',
        'array' => 'Pole :attribute nie może mieć więcej niż :max elementów.',
    ],
    'mimes' => 'Pole :attribute musi być plikiem typu: :values.',
    'min' => [
        'numeric' => 'Pole :attribute musi być co najmniej :min.',
        'file' => 'Plik :attribute musi mieć co najmniej :min kilobajtów.',
        'string' => 'Pole :attribute musi mieć co najmniej :min znaków.',
        'array' => 'Pole :attribute musi mieć co najmniej :min elementów.',
    ],
    'not_in' => 'Wybrane :attribute jest nieprawidłowe.',
    'numeric' => 'Pole :attribute musi być liczbą.',
    'required' => 'To pole jest wymagane.',
    'same' => 'Pola :attribute i :other muszą być takie same.',
    'size' => [
        'numeric' => 'Pole :attribute musi mieć rozmiar :size.',
        'file' => 'Plik :attribute musi mieć :size kilobajtów.',
        'string' => 'Pole :attribute musi mieć :size znaków.',
        'array' => 'Pole :attribute musi zawierać :size elementów.',
    ],
    'string' => 'Pole :attribute musi być tekstem.',
    'unique' => 'Pole :attribute już istnieje.',
    'url' => 'Pole :attribute musi być prawidłowym adresem URL.',

    /*
    |--------------------------------------------------------------------------
    | Własne komunikaty
    |--------------------------------------------------------------------------
    |
    | Tutaj możesz zdefiniować własne komunikaty dla poszczególnych pól.
    |
    */

    'custom' => [
        'pesel' => [
            'digits' => 'PESEL musi mieć dokładnie 11 cyfr.',
            'unique' => 'Użytkownik z takim numerem PESEL już istnieje.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Atrybuty pól
    |--------------------------------------------------------------------------
    |
    | Te linie pozwalają zamienić nazwy pól (np. "email") na coś bardziej ludzkiego.
    |
    */

    'attributes' => [
        'imie' => 'imię',
        'nazwisko' => 'nazwisko',
        'pesel' => 'PESEL',
        'data_urodzenia' => 'data urodzenia',
        'email_dzielo' => 'adres e-mail służbowy',
        'email_prywatny' => 'adres e-mail prywatny',
        'telefon' => 'numer telefonu',
        'ulica' => 'ulica',
        'nr_domu' => 'numer domu',
        'nr_mieszkania' => 'numer mieszkania',
        'kod_pocztowy' => 'kod pocztowy',
        'poczta' => 'poczta',
        'miejscowosc' => 'miejscowość',
        'wojewodztwo' => 'województwo',
        'diecezja' => 'diecezja',
        'imie_opiekuna' => 'imię opiekuna',
        'nazwisko_opiekuna' => 'nazwisko opiekuna',
        'telefon_opiekuna' => 'telefon opiekuna',
        'pesel_opiekuna' => 'PESEL opiekuna',
    ],
];

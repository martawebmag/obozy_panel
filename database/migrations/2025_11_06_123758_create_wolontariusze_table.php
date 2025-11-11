<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wolontariusze', function (Blueprint $table) {
            $table->id();
            // Dane osobowe
            $table->string('tytul_zwrot')->nullable();
            $table->string('imie');
            $table->string('imie_zakonne')->nullable();
            $table->string('nazwisko');
            $table->string('nazwisko_rodowe')->nullable();
            $table->string('imie_matki')->nullable();
            $table->string('imie_ojca')->nullable();
            $table->string('nazwisko_rodowe_matki')->nullable();
            $table->string('pesel', 11)->unique();
            $table->date('data_urodzenia')->nullable();
            $table->string('email')->nullable();
            $table->string('telefon')->nullable();
            $table->enum('plec', ['M', 'K'])->nullable();

            // Adres zamieszkania
            $table->string('ulica')->nullable();
            $table->string('numer_domu')->nullable();
            $table->string('numer_mieszkania')->nullable();
            $table->string('kod_pocztowy')->nullable();
            $table->string('poczta')->nullable();
            $table->string('miejscowosc')->nullable();

            // Adres korespondencyjny
            $table->string('ulica_koresp')->nullable();
            $table->string('numer_domu_koresp')->nullable();
            $table->string('numer_mieszkania_koresp')->nullable();
            $table->string('kod_pocztowy_koresp')->nullable();
            $table->string('poczta_koresp')->nullable();
            $table->string('miejscowosc_koresp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wolontariusze');
    }
};

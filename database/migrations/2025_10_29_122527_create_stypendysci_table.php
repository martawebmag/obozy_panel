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
        Schema::create('stypendysci', function (Blueprint $table) {
            $table->id();
            $table->enum('typ_uczestnika', ['Uczen', 'Student', 'Maturzysta'])->default('Uczen');
            $table->string('imie')->nullable();
            $table->string('nazwisko')->nullable();
            $table->string('pesel')->nullable();
            $table->date('data_urodzenia')->nullable();
            $table->string('email_dzielo')->nullable();
            $table->string('email_prywatny')->nullable();
            $table->string('telefon')->nullable();
            $table->enum('plec', ['Kobieta','Mężczyzna'])->nullable();
            $table->string('ulica')->nullable();
            $table->string('nr_domu')->nullable();
            $table->string('nr_mieszkania')->nullable();
            $table->string('kod_pocztowy')->nullable();
            $table->string(column: 'poczta')->nullable();
            $table->string('miejscowosc')->nullable();
            $table->string('wojewodztwo')->nullable();
            $table->string('diecezja')->nullable();
            $table->string('wspolnota_akademicka')->nullable();

            $table->string('imie_matki')->nullable();
            $table->string('nazwisko_matki')->nullable();
            $table->string('nazwisko_rodowe_matki')->nullable();
            $table->string('telefon_matki')->nullable();
            $table->string('pesel_matki')->nullable();
            $table->string('email_matki')->nullable();
            $table->string('matka_zmarla')->nullable();
            $table->string('imie_ojca')->nullable();
            $table->string('nazwisko_ojca')->nullable();
            $table->string('telefon_ojca')->nullable();
            $table->string('pesel_ojca')->nullable();
            $table->string('email_ojca')->nullable();
            $table->string('ojciec_zmarl')->nullable();

            $table->string('imie_opiekuna_prawnego')->nullable();
            $table->string('nazwisko_opiekuna_prawnego')->nullable();
            $table->string('telefon_opiekuna_prawnego')->nullable();
            $table->string('pesel_opiekuna_prawnego')->nullable();
            $table->string('email_opiekuna_prawnego')->nullable();
            $table->string('prawa_rodzicielskie')->nullable();
            $table->string('prawa_informacje')->nullable();

            $table->string('imie_opiekuna')->nullable();
            $table->string('nazwisko_opiekuna')->nullable();
            $table->string('telefon_opiekuna')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stypendysci');
    }
};

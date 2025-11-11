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
        Schema::create('wolontariusze_zgloszenia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wolontariusz_id')->constrained('wolontariusze')->onDelete('cascade');
            $table->foreignId('oboz_id')->constrained('obozy')->onDelete('cascade');

            $table->string('rodzaj_wolontariatu')->nullable();
            $table->text('preferencje')->nullable();
            $table->string('koszulka_rozmiar')->nullable();
            $table->string('stypendysta_status')->nullable();
            $table->string('status_wolontariusza')->nullable();
            $table->string('wspolnota')->nullable();
            $table->string('nazwa_uczelni')->nullable();
            $table->string('kierunek')->nullable();
            $table->string('miejsce_zatrudnienia')->nullable();
            $table->string('zawod_posluga')->nullable();
            $table->boolean('doswiadczenie')->default(false);
            $table->text('doswiadczenie_opis')->nullable();

            // Zdrowie i dieta
            $table->boolean('chor')->default(false);
            $table->string('instrument')->nullable();
            $table->text('uwagi_zdrowie')->nullable();
            $table->string('dieta')->nullable();
            $table->string('jaka_dieta')->nullable();
            $table->text('dieta_info')->nullable();
            $table->text('dodatkowe_info')->nullable();

            // Dokumenty
            $table->boolean('dokumenty_zalaczone')->default(false);
            $table->boolean('dokumenty_wyslane_mailem')->default(false);
            $table->boolean('dokumenty_beda_doslane')->default(false);
            $table->boolean('elektronika')->default(false);

            // Zgody
            $table->boolean('rodo')->default(false);
            $table->boolean('wizerunek')->default(false);
            $table->boolean('ochrona_maloletnich')->default(false);

            // Dane przełożonego
            $table->string('imie_przelozonego')->nullable();
            $table->string('nazwisko_przelozonego')->nullable();
            $table->string('diecezja_przelozonego')->nullable();
            $table->string('email_przelozonego')->nullable();
            $table->string('ulica_przelozonego')->nullable();
            $table->string('numer_domu_przelozonego')->nullable();
            $table->string('numer_mieszkania_przelozonego')->nullable();
            $table->string('kod_pocztowy_przelozonego')->nullable();
            $table->string('poczta_przelozonego')->nullable();
            $table->string('miejscowosc_przelozonego')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wolontariusze_zgloszenia');
    }
};

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
        Schema::create('zgloszenia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stypendysta_id')->constrained('stypendysci')->onDelete('cascade');
            $table->foreignId('oboz_id')->constrained('obozy')->onDelete('cascade');
            $table->year('rok_obozu')->nullable();
            $table->string('zdrowie')->nullable();
            $table->string('dieta')->nullable();
            $table->string('jaka_dieta')->nullable();
            $table->string('dieta_info')->nullable();

            $table->string('szkola')->nullable();
            $table->string('klasa')->nullable();

            $table->string('obrona')->nullable();
            $table->string('sesja')->nullable();
            $table->string('koniecSesji')->nullable();
            $table->string('tshirt')->nullable();
            $table->string('chor')->nullable();
            $table->string('instrument')->nullable();
            $table->string('posluga')->nullable();
            $table->string('medycyna')->nullable();
            $table->string('uwagi')->nullable();

            $table->string('tezec')->nullable();
            $table->string('blonica')->nullable();
            $table->string('inne_szczepienia')->nullable();
            $table->date('data_przyjazdu')->nullable();
            $table->date('data_wyjazdu')->nullable();

            $table->string('regulamin')->nullable();
            $table->string('szpital')->nullable();
            $table->string(column: 'elektronika')->nullable();
            $table->string(column: 'informacje')->nullable();
            $table->string('rodo')->nullable();
            $table->string('wizerunek')->nullable();
            $table->string('ochrona_maloletnich')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zgloszenia');
    }
};

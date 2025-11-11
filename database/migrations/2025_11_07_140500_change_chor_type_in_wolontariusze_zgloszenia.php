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
        Schema::table('wolontariusze_zgloszenia', function (Blueprint $table) {
             $table->string('chor')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wolontariusze_zgloszenia', function (Blueprint $table) {
            $table->boolean('chor')->change();
        });
    }
};

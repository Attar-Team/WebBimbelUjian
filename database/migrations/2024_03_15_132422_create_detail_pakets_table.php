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
        Schema::create('detail_paket', function (Blueprint $table) {
            $table->id('detail_paket_id');
            $table->foreignId('kursus_id');
            $table->foreignId('paket_id');
            $table->foreignId('ujian_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pakets');
    }
};

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
        Schema::create('detail_jawaban', function (Blueprint $table) {
            $table->id('detail_jawaban_id');
            $table->foreignId('ujian_id');
            $table->foreignId('soal_id');
            $table->foreignId('detail_soal_id');
            $table->boolean('status_kebenaran');
            $table->boolean('status_keraguan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_jawabans');
    }
};

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
        Schema::create('detail_soal', function (Blueprint $table) {
            $table->id('detail_soal_id');
            $table->foreignId('soal_id');
            $table->string('isi_jawaban');
            $table->string('foto');
            $table->boolean('jawaban_benar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_soals');
    }
};

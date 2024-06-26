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
        Schema::create('answer_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('answer_id');
            $table->foreignId('question_id');
            $table->foreignId('question_detail_id')->nullable();
            $table->integer('number_question')->nullable();
            $table->boolean('is_correct')->nullable();
            $table->boolean('is_doubtful')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answer_details');
    }
};

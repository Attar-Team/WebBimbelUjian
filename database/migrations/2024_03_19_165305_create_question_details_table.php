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
        Schema::create('question_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id');
            $table->string('content_answer');
            $table->string('photo');
            $table->boolean('correct_answer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_details');
    }
};

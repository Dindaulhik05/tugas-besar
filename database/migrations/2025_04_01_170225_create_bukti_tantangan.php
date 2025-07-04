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
        Schema::create('bukti_tantangan', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id'); // Kolom 'user_id'
            $table->unsignedInteger('challenge_id'); // Kolom 'challenge_id'
            $table->string('file_path', 255); // Kolom 'file_path'
            $table->enum('status', ['pending', 'completed'])->default('pending'); // Kolom 'status'
            $table->tinyInteger('is_claimed', false, true)->default(0); // Kolom 'is_claimed'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukti_tantangan');
    }
};

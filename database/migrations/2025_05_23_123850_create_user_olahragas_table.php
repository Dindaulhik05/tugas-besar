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
        Schema::create('user_olahraga', function (Blueprint $table) {
            $table->id();
           $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Definisikan olahraga_id sebagai foreign key
            $table->unsignedBigInteger('olahraga_id');
            $table->foreign('olahraga_id')->references('id')->on('olahraga')->onDelete('cascade');

            // Kolom untuk waktu olahraga
            $table->datetime('waktu_olahraga'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_olahraga');
    }
};

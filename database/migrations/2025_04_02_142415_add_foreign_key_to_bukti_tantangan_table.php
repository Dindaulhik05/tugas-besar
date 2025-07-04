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
        Schema::table('bukti_tantangan', function (Blueprint $table) {
             // Pastikan kolom user_id sudah ada sebelum menambah foreign key
             $table->foreign('user_id')
             ->references('id') // Kolom id pada tabel users
             ->on('users') // Tabel users
             ->onDelete('cascade'); // Hapus data bukti_tantangan jika
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bukti_tantangan', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
    }
};

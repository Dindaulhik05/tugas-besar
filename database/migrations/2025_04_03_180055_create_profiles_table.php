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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 255);  // Kolom nama
            $table->string('berat_badan', 50);  // Kolom berat badan
            $table->integer('tinggi_badan');  // Kolom tinggi badan
            $table->date('tanggal_lahir')->nullable();  // Kolom tanggal lahir (nullable)
            $table->string('jenis_kelamin', 20);  // Kolom jenis kelamin
            $table->string('no_telepon', 20);  // Kolom nomor telepon
            $table->text('alamat')->nullable();  // Kolom alamat (nullable)
            $table->string('profile_picture', 255);  // Kolom gambar profil
            $table->integer('total_points')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};

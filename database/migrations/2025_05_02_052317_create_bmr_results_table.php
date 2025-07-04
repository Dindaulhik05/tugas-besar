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
        Schema::create('bmr_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->enum('jenis_kelamin', ['pria', 'wanita']);
            $table->float('berat_badan'); // dalam kg
            $table->float('tinggi_badan'); // dalam cm
            $table->integer('usia'); // dalam tahun
            $table->string('tingkat_aktivitas');
            $table->string('tujuan_kalori'); // contoh: "turun berat", "naik berat", dll
            $table->float('bmr'); // Basal Metabolic Rate
            $table->float('tdee'); // Total Daily Energy Expenditure
            $table->float('target_kalori'); // jumlah kalori harian yang disarankan
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bmr_results');
    }
};

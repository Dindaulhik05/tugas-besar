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
        Schema::table('bmr_results', function (Blueprint $table) {
        // Change jenis_kelamin from ENUM to STRING (VARCHAR)
        $table->string('jenis_kelamin')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bmr_results', function (Blueprint $table) {
        // Revert back to ENUM if needed
        $table->enum('jenis_kelamin', ['pria', 'wanita'])->change();
    });
    }
};

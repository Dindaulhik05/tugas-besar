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
        Schema::table('profiles_admin', function (Blueprint $table) {
            $table->string('phone')->nullable();  // No telephone
            $table->string('gender')->nullable();  // Jenis kelamin
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles_admin', function (Blueprint $table) {
            $table->dropColumn(['phone', 'gender']);
        });
    }
};

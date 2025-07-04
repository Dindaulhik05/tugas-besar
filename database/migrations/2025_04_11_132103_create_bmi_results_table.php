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
        Schema::create('bmi_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // foreign key ke users
            $table->float('berat');
            $table->float('tinggi');
            $table->string('jenis_kelamin', 10);
            $table->integer('usia');
            $table->float('bmi');
            $table->text('kategori');
            $table->text('berat_ideal');
            $table->text('saran');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bmi_results');
    }
};

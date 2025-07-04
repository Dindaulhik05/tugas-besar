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
        Schema::create('challenges', function (Blueprint $table) {
            $table->id();
            $table->string('no_tantangan', 50);
            $table->string('title', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('details', 255);
            $table->string('video_embed_url', 255)->nullable();
            $table->string('video_thumbnail', 255)->nullable();
            $table->string('tag', 100)->nullable();
            $table->string('duration', 50)->nullable();
            $table->text('svg');
            $table->integer('poin_tantangan', false, true)->length(5);
            $table->enum('status_tantangan', ['pending', 'completed'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('challenges');
    }
};

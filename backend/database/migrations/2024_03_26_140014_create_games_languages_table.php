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
        Schema::create('games_languages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('game_id');
            $table->unsignedBigInteger('language_id');
            $table->boolean('interface')->default(false);
            $table->boolean('full_audio')->default(false);
            $table->boolean('subtitles')->default(false);
            $table->timestamps();

            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games_languages');
    }
};

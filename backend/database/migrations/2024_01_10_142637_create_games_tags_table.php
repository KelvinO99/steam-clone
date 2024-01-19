<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('games_tags', function (Blueprint $table) {
            $table->id();
            $table->integer('game_id');
            $table->integer('tag_id');
            $table->timestamps();

            //$table->foreignId('game')->references('id')->on('games')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('tag')->references('id')->on('tags')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('games_tags');
    }
};
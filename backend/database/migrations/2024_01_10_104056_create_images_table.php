<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('game_id');
            $table->string('image_path')->nullable();
            $table->timestamps();

            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};

/*
    $table->string('PLACEHOLDER_COLUMN_NAME');
    $table->integer('PLACEHOLDER_COLUMN_NAME');
    $table->boolean('PLACEHOLDER_COLUMN_NAME');
*/
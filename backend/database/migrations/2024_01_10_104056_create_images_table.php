<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('PLACEHOLDER_TABLE_NAME', function (Blueprint $table) {
            $table->id();
            $table->integer('game_id');
            $table->string('image');
            $table->timestamps();

            $table->foreignId('game')->references('id')->on('games')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('PLACEHOLDER_TABLE_NAME');
    }
};

/*
    $table->string('PLACEHOLDER_COLUMN_NAME');
    $table->integer('PLACEHOLDER_COLUMN_NAME');
    $table->boolean('PLACEHOLDER_COLUMN_NAME');
*/
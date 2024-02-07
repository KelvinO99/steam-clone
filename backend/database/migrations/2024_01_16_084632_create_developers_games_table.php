<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('developers_games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('developer_id');
            $table->unsignedBigInteger('game_id');
            $table->timestamps();

            $table->foreign('developer_id')->references('id')->on('developers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('developers_games');
    }
};

/*
    $table->string('PLACEHOLDER_COLUMN_NAME');
    $table->integer('PLACEHOLDER_COLUMN_NAME');
    $table->boolean('PLACEHOLDER_COLUMN_NAME');
*/
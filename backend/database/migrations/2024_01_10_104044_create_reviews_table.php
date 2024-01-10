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
            $table->integer('user_id');
            $table->integer('game_id');
            $table->date('date_of_review');
            $table->boolean('is_recommended');
            $table->longtext('description');
            $table->hours_played('float');
            $table->timestamps();

            $table->foreignId('game')->references('id')->on('games')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
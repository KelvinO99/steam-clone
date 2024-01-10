<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users_achievements', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('achievement_id');
            $table->timestamps();
            
            $table->foreignId('user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('achievement')->references('id')->on('achievements')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users_achievements');
    }
};

/*
    $table->string('PLACEHOLDER_COLUMN_NAME');
    $table->integer('PLACEHOLDER_COLUMN_NAME');
    $table->boolean('PLACEHOLDER_COLUMN_NAME');
*/
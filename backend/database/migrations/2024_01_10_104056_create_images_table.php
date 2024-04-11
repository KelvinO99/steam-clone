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
            $table->unsignedBigInteger('game_id')->nullable()->default(null);
            $table->unsignedBigInteger('user_id')->nullable()->default(null);
            $table->unsignedBigInteger('achievement_id')->nullable()->default(null);
            $table->unsignedBigInteger('pegi_id')->nullable()->default(null);
            $table->unsignedBigInteger('steam_id')->nullable()->default(null); //no foreign key
            $table->string('image_path')->default('null');
            $table->timestamps();

            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('achievement_id')->references('id')->on('achievements')->onDelete('cascade')->onUpdate('cascade');
            //$table->foreign('pegi_id')->references('id')->on('games')->onDelete('cascade')->onUpdate('cascade');
            //no steam_id foreign key
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('system_requirements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('game_id');
            $table->unsignedBigInteger('platform_id');
            $table->enum('rank', ['Minimum Requirements', 'Recommended Requirements']);
            $table->unsignedBigInteger('os_id');
            $table->unsignedBigInteger('cpu_id');
            $table->unsignedBigInteger('ram_id');
            $table->unsignedBigInteger('gpu_id');
            $table->unsignedBigInteger('directx_id');
            $table->unsignedBigInteger('network_id');
            $table->unsignedBigInteger('storage_id');
            $table->unsignedBigInteger('audio_id');
            $table->unsignedBigInteger('notes_id');
            $table->timestamps();

            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('platform_id')->references('id')->on('system_characteristics')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('os_id')->references('id')->on('system_characteristics')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('cpu_id')->references('id')->on('system_characteristics')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ram_id')->references('id')->on('system_characteristics')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('gpu_id')->references('id')->on('system_characteristics')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('directx_id')->references('id')->on('system_characteristics')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('network_id')->references('id')->on('system_characteristics')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('storage_id')->references('id')->on('system_characteristics')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('audio_id')->references('id')->on('system_characteristics')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('notes_id')->references('id')->on('system_characteristics')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('system_requirements');
    }
};


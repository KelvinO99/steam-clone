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
            $table->string('name');
            $table->boolean('is_genre');
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('PLACEHOLDER_TABLE_NAME');
    }
};
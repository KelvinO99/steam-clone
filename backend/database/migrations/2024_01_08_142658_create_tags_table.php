<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('PLACEHOLDER');
            $table->boolean('is_genre')->default(false);
            $table->unsignedBigInteger('image_id')->nullable()->default(1);
            $table->timestamps();

            $table->foreign('image_id')->references('id')->on('images');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};

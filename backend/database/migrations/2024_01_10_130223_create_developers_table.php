<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('developers', function (Blueprint $table) {
            $table->id();
            //$table->integer('user_id');
            $table->boolean('is_publisher');
            $table->text('description');
            $table->timestamps();

            $table->foreignId('user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('developers');
    }
};

/*
    $table->string('PLACEHOLDER_COLUMN_NAME');
    $table->integer('PLACEHOLDER_COLUMN_NAME');
    $table->boolean('PLACEHOLDER_COLUMN_NAME');
*/
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
            $table->enum('PLACEHOLDER_COLUMN_NAME');
            $table->string('PLACEHOLDER_COLUMN_NAME');
            $table->timestamps();

            $table->foreignId('PLACEHOLDER_COLUMN1')->references('PLACEHOLDER_EXT_COLUMN1')->on('PLACEHOLDER_EXT_TABLE_NAME1')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('PLACEHOLDER_COLUMN2')->references('PLACEHOLDER_EXT_COLUMN2')->on('PLACEHOLDER_EXT_TABLE_NAME2')->onDelete('cascade')->onUpdate('cascade');
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

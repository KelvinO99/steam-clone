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
            $table->integer('developer_id');
            $table->boolean('is_dlc');
            $table->integer('parent_id');
            $table->string('name');
            $table->float('price');
            $table->float('discounted_price');
            $table->integer('discounted_percentage');
            $table->text('short_description');
            $table->text('long_description');
            $table->string('pegi');
            $table->timestamps();

            $table->foreignId('parent')->references('id')->on('games')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('PLACEHOLDER_TABLE_NAME');
    }
};
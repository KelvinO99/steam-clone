<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_dlc');
            //$table->unsignedBigInteger('parent_id');
            $table->string('name');
            $table->date('date');
            $table->float('base_price');
            $table->float('discounted_price');
            $table->integer('discounted_percentage');
            $table->text('short_description');
            $table->text('long_description');
            $table->integer('pegi_id');
            $table->timestamps();

            //$table->foreign('parent_id')->references('id')->on('games')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
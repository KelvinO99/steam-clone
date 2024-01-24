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
            $table->boolean('is_dlc')->default(false);
            //$table->unsignedBigInteger('parent_id');
            $table->string('name');
            $table->date('date')->default('2000-01-01');
            $table->float('base_price', 8, 2)->default(0.00);
            $table->float('discounted_price', 8, 2)->default(0.00);
            $table->integer('discounted_percentage')->default(0);
            $table->text('short_description')->default('Descrizione breve');
            $table->text('long_description')->default('Descrizione lunga');
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
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
            $table->string('name')->default('PLACEHOLDER');
            $table->date('date')->default('1970-01-01');
            $table->float('base_price', 8, 2)->default(0.00);
            $table->boolean('is_discounted')->default(false);
            $table->float('discounted_price', 8, 2)->default(0.00)->nullable(); //nullable perché non sempre
            $table->integer('discounted_percentage')->default(0)->nullable();   //è scontato un gioco -chris
            $table->text('short_description')->default('Descrizione breve');
            $table->text('long_description')->default('Descrizione lunga');
            $table->integer('pegi_id')->default('0');
            $table->timestamps();

            //$table->foreign('parent_id')->references('id')->on('games')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
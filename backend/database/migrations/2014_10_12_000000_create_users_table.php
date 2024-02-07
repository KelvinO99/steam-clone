<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            //$table->string('name');
            $table->string('username')->default('PLACEHOLDER');
            $table->string('email')->unique()->default('PLACEHOLDER');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default('PLACEHOLDER');
            $table->float('wallet')->default(0.00);
            $table->unsignedBigInteger('image_id')->default(5); //NON SI METTE NULL VAFFANCUKLO
            //$table->string('role')->default('user');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('image_id')->references('id')->on('images');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

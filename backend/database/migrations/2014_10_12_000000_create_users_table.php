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
            $table->unsignedBigInteger('country_id')->default(1);
            $table->unsignedBigInteger('language_id')->default(1);
            //$table->integer('level'); //in backlog
            $table->text('description')->default('no information given');
            $table->float('wallet')->default(0.00);
            //$table->string('role')->default('user');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('language_id')->references('id')->on('languages');

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

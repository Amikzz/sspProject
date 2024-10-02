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
        Schema::create('skill_sharers', function (Blueprint $table) {
            $table->id();

            // Use unsignedBigInteger for foreign key to match with users table id type
            $table->unsignedBigInteger('user_id')->nullable();

            // Define the foreign key relationship
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->json('skills')->nullable();
            $table->string('availability')->nullable();
            $table->string('skill_level')->nullable();
            $table->integer('years_of_experience')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skill_sharers');
    }
};

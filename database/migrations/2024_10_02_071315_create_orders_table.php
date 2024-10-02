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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customerID')->unsigned();
            $table->foreign('customerID')->references('id')->on('users');
            $table->bigInteger('supplierID')->unsigned();
            $table->foreign('supplierID')->references('id')->on('users');
            $table->bigInteger('skillID')->unsigned();
            $table->foreign('skillID')->references('id')->on('skills');
            $table->integer('no_of_hours');
            $table->double('total_amount');
            $table->string('description')->nullable();
            $table->string('status')->default('Completed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

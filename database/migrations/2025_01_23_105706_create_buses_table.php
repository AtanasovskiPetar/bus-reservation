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
        Schema::create('buses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('bus_code');
            $table->string('img');
            $table->string('from');
            $table->string('to');
            $table->string('fare');
            $table->string('driver_name');
            $table->boolean('status');
            $table->integer('seats');
            $table->string('maintenance')->default('no maintenance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buses');
    }
};

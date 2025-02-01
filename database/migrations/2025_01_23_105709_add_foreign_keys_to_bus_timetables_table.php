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
        Schema::table('bus_timetables', function (Blueprint $table) {
            $table->foreign(['bus_id'], 'bus_reservations_bus_id_foreign')->references(['id'])->on('buses')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bus_timetables', function (Blueprint $table) {
            $table->dropForeign('bus_reservations_bus_id_foreign');
        });
    }
};

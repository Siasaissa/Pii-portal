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
Schema::create('vehicles', function (Blueprint $table) {
    $table->id();
    $table->string('device_id')->unique();
    $table->string('nickname')->nullable();
    $table->string('plate_number')->nullable();
    $table->string('driver_id')->nullable();
    $table->string('driver_name')->nullable();
    $table->string('trip_type')->nullable();
    $table->string('event_code')->nullable();
    $table->string('event_name')->nullable();
    $table->string('event_info')->nullable();
    $table->timestamp('event_time')->nullable();
    $table->decimal('speed', 8, 2)->nullable();
    $table->decimal('odometer', 12, 2)->nullable();
    $table->decimal('engine_hours', 12, 2)->nullable();
    $table->decimal('fuel_level', 5, 2)->nullable();
    $table->decimal('battery_level', 5, 2)->nullable();
    $table->decimal('latitude', 10, 6)->nullable();
    $table->decimal('longitude', 10, 6)->nullable();
    $table->integer('idle_duration')->nullable();
    $table->integer('parking_duration')->nullable();
    $table->integer('trip_duration')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};

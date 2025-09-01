<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tid')->unique(); // unique trip ID from API
            $table->string('vid')->nullable();          // device ID
            $table->string('nickname')->nullable();     // NN
            $table->string('plate_number')->nullable(); // PN
            $table->dateTime('trip_start')->nullable(); // T1
            $table->dateTime('trip_end')->nullable();   // T2
            $table->string('driver_id')->nullable();    // DID
            $table->string('driver_name')->nullable();  // DN
            $table->decimal('odometer_start', 12, 2)->nullable(); // O1
            $table->decimal('odometer_end', 12, 2)->nullable();   // O2
            $table->unsignedTinyInteger('trip_type')->nullable(); // TT
            $table->decimal('fuel_usage', 10, 2)->nullable();     // FUS
            $table->decimal('fuel_idle', 10, 2)->nullable();      // FID
            $table->decimal('start_longitude', 9, 6)->nullable(); // X1
            $table->decimal('start_latitude', 9, 6)->nullable();  // Y1
            $table->string('start_address')->nullable();          // AD1
            $table->decimal('end_longitude', 9, 6)->nullable();   // X2
            $table->decimal('end_latitude', 9, 6)->nullable();    // Y2
            $table->string('end_address')->nullable();            // AD2
            $table->string('poi')->nullable();                    // PD
            $table->decimal('avg_speed', 6, 2)->nullable();       // AGS

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};

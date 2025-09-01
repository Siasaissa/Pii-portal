<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customer_device_assignments', function (Blueprint $table) {
            $table->id();

            // Business keys (link customers.email <-> uploads.imei)
            $table->string('customer_email');
            $table->string('device_imei');

            // enforce one-to-one mapping
            $table->unique('customer_email');
            $table->unique('device_imei');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customer_device_assignments');
    }
};

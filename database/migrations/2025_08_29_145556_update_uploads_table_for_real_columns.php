<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('uploads', function (Blueprint $table) {
            // Drop old columns if needed
            $table->dropColumn(['tracker_id', 'tracker_name']);

            // Add real-world columns
            $table->string('device_name')->nullable();
            $table->date('date')->nullable();
            $table->string('imei')->nullable();
            $table->string('company')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('uploads', function (Blueprint $table) {
            $table->dropColumn(['device_name', 'date', 'imei', 'company']);
            $table->string('tracker_id')->nullable();
            $table->string('tracker_name')->nullable();
        });
    }
};

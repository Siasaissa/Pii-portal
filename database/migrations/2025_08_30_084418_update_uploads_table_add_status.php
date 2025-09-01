<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('uploads', function (Blueprint $table) {
            // If tracker_id & tracker_name exist, drop them
            if (Schema::hasColumn('uploads', 'tracker_id')) {
                $table->dropColumn(['tracker_id', 'tracker_name']);
            }

            // Ensure imei is unique
            if (!Schema::hasColumn('uploads', 'imei')) {
                $table->string('imei')->unique();
            }

            // Add new fields if missing
            if (!Schema::hasColumn('uploads', 'device_name')) {
                $table->string('device_name')->nullable();
            }
            if (!Schema::hasColumn('uploads', 'date')) {
                $table->date('date')->nullable();
            }
            if (!Schema::hasColumn('uploads', 'company')) {
                $table->string('company')->nullable();
            }

            // 👇 New status column
            if (!Schema::hasColumn('uploads', 'status')) {
                $table->enum('status', ['active', 'inactive'])->default('active');
            }
        });
    }

    public function down(): void
    {
        Schema::table('uploads', function (Blueprint $table) {
            $table->dropColumn(['device_name', 'date', 'imei', 'company', 'status']);
            $table->string('tracker_id')->nullable();
            $table->string('tracker_name')->nullable();
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('customer_device_assignments', function (Blueprint $table) {
            // Make sure unique constraints exist
            if (!Schema::hasColumn('customer_device_assignments', 'customer_email')) {
                $table->string('customer_email')->unique();
            }

            if (!Schema::hasColumn('customer_device_assignments', 'device_imei')) {
                $table->string('device_imei')->unique();
            }
        });
    }

    public function down(): void
    {
        Schema::table('customer_device_assignments', function (Blueprint $table) {
            $table->dropUnique(['customer_email']);
            $table->dropUnique(['device_imei']);
        });
    }
};


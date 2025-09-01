<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('customer_device_assignments', function (Blueprint $table) {
            // Add unique constraints if not already there
            if (!Schema::hasIndex('customer_device_assignments', 'customer_email_unique')) {
                $table->unique('customer_email');
            }

            if (!Schema::hasIndex('customer_device_assignments', 'device_imei_unique')) {
                $table->unique('device_imei');
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

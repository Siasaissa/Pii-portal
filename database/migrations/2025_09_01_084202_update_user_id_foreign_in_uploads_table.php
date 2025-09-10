<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('uploads', function (Blueprint $table) {
            // Drop old foreign key
            $table->dropForeign('uploads_customer_id_foreign');

            // Add new foreign key pointing to users table
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('uploads', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // drop new one

            // Restore old foreign key pointing to customers
            $table->foreign('user_id')
                  ->references('id')
                  ->on('customers')
                  ->onDelete('set null');
        });
    }
};


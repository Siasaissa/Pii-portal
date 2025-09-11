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
        Schema::table('customer_device_assignments', function (Blueprint $table) {
         $table->unsignedBigInteger('user_id')->nullable()->after('id');

            // add foreign key constraint referencing users table
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->nullOnDelete(); // if user deleted, set user_id to null
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customer_device_assignments', function (Blueprint $table) {
             $table->dropForeign(['user_id']);
            // then drop column
            $table->dropColumn('user_id');
        });
    }
};

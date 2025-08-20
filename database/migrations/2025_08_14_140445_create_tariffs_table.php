<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('tariffs', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('device_type');
        $table->string('billing_cycle');
        $table->decimal('amount', 10, 2);
        $table->integer('tax');
        $table->string('status');
        $table->text('description')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tariffs');
    }
};

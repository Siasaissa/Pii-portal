<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();

            // Foreign key linking to customers table
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

            // Quotation details
            $table->string('policy_type');       // e.g., Motor, Health
            $table->decimal('premium', 15, 2);   // Quotation premium
            $table->string('status')->default('Pending'); // Pending, Approved, Rejected
            $table->text('notes')->nullable();   // Optional notes

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};

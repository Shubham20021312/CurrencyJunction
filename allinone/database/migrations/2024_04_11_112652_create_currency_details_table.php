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
        Schema::create('currency_details', function (Blueprint $table) {
            $table->id();
            $table->string('currency_code');
            $table->string('currency_name');
            $table->decimal('buying_rate', 10, 2);
            $table->decimal('selling_rate', 10, 2);
            $table->decimal('minimum_transaction', 10, 2)->nullable();
            $table->decimal('maximum_transaction', 10, 2)->nullable();
            $table->decimal('fee', 10, 2)->nullable();
            $table->boolean('availability')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currency_details');
    }
};

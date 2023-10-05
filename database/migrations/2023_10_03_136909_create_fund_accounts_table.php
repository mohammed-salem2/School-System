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
        Schema::create('fund_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreign('receipt_id')->references('id')->on('receipt_students')->cascadeOnDelete();
            $table->foreignId('receipt_id')->nullable();
            $table->foreign('payment_id')->references('id')->on('payments')->cascadeOnDelete();
            $table->foreignId('payment_id')->nullable();
            $table->decimal('debit',8,2)->default(0);
            $table->decimal('credit',8,2)->default(0);
            $table->string('description')->nullable();
            $table->json('admin_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fund_accounts');
    }
};

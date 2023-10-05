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
        Schema::create('student_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreign('student_id')->references('id')->on('students')->cascadeOnDelete();
            $table->foreignId('student_id');
            $table->foreign('invoice_id')->references('id')->on('invoices')->cascadeOnDelete();
            $table->foreignId('invoice_id')->nullable();
            $table->foreign('receipt_id')->references('id')->on('receipt_students')->cascadeOnDelete();
            $table->foreignId('receipt_id')->nullable();
            $table->foreign('process_id')->references('id')->on('process_fees')->cascadeOnDelete();
            $table->foreignId('process_id')->nullable();
            $table->foreign('payment_id')->references('id')->on('payments')->cascadeOnDelete();
            $table->foreignId('payment_id')->nullable();
            $table->string('type')->nullable();
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
        Schema::dropIfExists('student_accounts');
    }
};

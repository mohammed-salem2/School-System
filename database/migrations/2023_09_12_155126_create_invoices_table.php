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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreign('student_id')->references('id')->on('students')->cascadeOnDelete();
            $table->foreignId('student_id');
            $table->foreign('grade_id')->references('id')->on('grades')->cascadeOnDelete();
            $table->foreignId('grade_id');
            $table->foreign('classroom_id')->references('id')->on('classrooms')->cascadeOnDelete();
            $table->foreignId('classroom_id');
            $table->foreign('fee_id')->references('id')->on('fees')->cascadeOnDelete();
            $table->foreignId('fee_id');
            $table->decimal('amount',8,2);
            $table->string('type')->nullable();
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
        Schema::dropIfExists('invoices');
    }
};

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
        Schema::create('process_fees', function (Blueprint $table) {
            $table->id();
            $table->foreign('student_id')->references('id')->on('students')->cascadeOnDelete();
            $table->foreignId('student_id');
            $table->decimal('amount',8,2)->nullable();
            $table->string('description');
            $table->json('admin_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('process_fees');
    }
};

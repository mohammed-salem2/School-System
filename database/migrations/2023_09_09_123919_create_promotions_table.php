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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->foreign('student_id')->references('id')->on('students')->cascadeOnDelete();
            $table->foreignId('student_id');
            $table->foreign('from_grade')->references('id')->on('grades')->cascadeOnDelete();
            $table->foreignId('from_grade');
            $table->foreign('from_classroom')->references('id')->on('classrooms')->cascadeOnDelete();
            $table->foreignId('from_classroom');
            $table->foreign('from_section')->references('id')->on('sections')->cascadeOnDelete();
            $table->foreignId('from_section');
            $table->string('academic_year_old');
            $table->foreign('to_grade')->references('id')->on('grades')->cascadeOnDelete();
            $table->foreignId('to_grade');
            $table->foreign('to_classroom')->references('id')->on('classrooms')->cascadeOnDelete();
            $table->foreignId('to_classroom');
            $table->foreign('to_section')->references('id')->on('sections')->cascadeOnDelete();
            $table->foreignId('to_section');
            $table->string('academic_year_new');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};

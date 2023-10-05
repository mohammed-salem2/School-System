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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->foreign('nationality_id')->references('id')->on('nationalities')->restrictOnDelete();
            $table->foreignId('nationality_id');
            $table->foreign('blood_id')->references('id')->on('bloods')->restrictOnDelete();
            $table->foreignId('blood_id');
            $table->foreignId('religion_id');
            $table->foreign('religion_id')->on('religions')->references('id')->restrictOnDelete();
            $table->foreignId('grade_id');
            $table->foreign('grade_id')->on('grades')->references('id')->restrictOnDelete();
            $table->foreignId('classroom_id');
            $table->foreign('classroom_id')->on('classrooms')->references('id')->restrictOnDelete();
            $table->foreignId('section_id');
            $table->foreign('section_id')->on('sections')->references('id')->restrictOnDelete();
            $table->foreignId('parent_id');
            $table->foreign('parent_id')->on('child_parents')->references('id')->restrictOnDelete();
            $table->date('date_birth');
            $table->string('national_id');
            $table->enum('status' , ['active' , 'draft']);
            $table->enum('gender' , ['male' , 'female']);
            $table->string('academic_year');
            $table->string('image')->nullable();
            $table->json('admin_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

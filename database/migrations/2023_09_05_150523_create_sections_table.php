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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->enum('status' , ['active' , 'draft']);
            $table->foreignId('grade_id');
            $table->foreign('grade_id')->on('grades')->references('id')->restrictOnDelete();
            $table->foreignId('classroom_id');
            $table->foreign('classroom_id')->on('classrooms')->references('id')->restrictOnDelete();
            $table->json('admin_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};

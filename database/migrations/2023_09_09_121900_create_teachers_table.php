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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name');
            $table->foreign('specialization_id')->references('id')->on('specializations')->restrictOnDelete();
            $table->foreignId('specialization_id');
            $table->enum('status' , ['active' , 'draft']);
            $table->enum('gender' , ['male' , 'female']);
            $table->date('joining_date');
            $table->text('address');
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
        Schema::dropIfExists('teachers');
    }
};

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
        Schema::create('child_parents', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');

            //Fatherinformation
            $table->string('name_father')->nullable();
            $table->string('national_id_father')->nullable();
            $table->string('passport_id_father')->nullable();
            $table->string('phone_father')->nullable();
            $table->string('job_father')->nullable();
            $table->foreign('nationality_father_id')->on('nationalities')->references('id')->restrictOnDelete();
            $table->foreignId('nationality_father_id')->nullable();
            $table->foreign('blood_father_id')->on('bloods')->references('id')->restrictOnDelete();
            $table->foreignId('blood_father_id')->nullable();
            $table->foreignId('religion_father_id')->nullable();
            $table->foreign('religion_father_id')->on('religions')->references('id')->restrictOnDelete();
            $table->string('address_father')->nullable();

            //Mother information
            $table->string('name_mother')->nullable();
            $table->string('national_id_mother')->nullable();
            $table->string('passport_id_mother')->nullable();
            $table->string('phone_mother')->nullable();
            $table->string('job_mother')->nullable();
            $table->foreign('nationality_mother_id')->on('nationalities')->references('id')->restrictOnDelete();
            $table->foreignId('nationality_mother_id')->nullable();
            $table->foreign('blood_mother_id')->on('bloods')->references('id')->restrictOnDelete();
            $table->foreignId('blood_mother_id')->nullable();
            $table->foreignId('religion_mother_id')->nullable();
            $table->foreign('religion_mother_id')->on('religions')->references('id')->restrictOnDelete();
            $table->string('address_mother')->nullable();
            $table->json('admin_data')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('child_parents');
    }
};

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
            $table->date('start_date');
            $table->date('end_date');
            $table->string('nik');
            $table->string('name');
            $table->string('school');
            $table->string('gender');
            $table->string('image');
            $table->date('birth_date');
            $table->string('email');
            $table->string('password');
            $table->string('address');
            $table->string('number_phone');
            $table->string('religion');
            $table->string('department_id');
            $table->string('jurusan');
            $table->string('isActive')->default('active');
            $table->string('nilai')->default('Belum Dinilai');
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

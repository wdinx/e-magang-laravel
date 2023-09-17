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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('nik')->nullable();
            $table->string('name')->nullable();
            $table->string('school')->nullable();
            $table->string('gender')->nullable();
            $table->string('image')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('address')->nullable();
            $table->string('number_phone')->nullable();
            $table->string('religion')->nullable();
            $table->string('department_id')->nullable();
            $table->string('jurusan')->nullable();
            $table->boolean('isAdmin')->default(false);
            $table->string('isActive')->default('active');
            $table->string('nilai')->default('Belum Dinilai');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

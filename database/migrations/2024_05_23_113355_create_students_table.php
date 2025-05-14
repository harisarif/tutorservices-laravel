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
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Add the user_id column first
            $table->enum('availability_status', ['online', 'physical', 'both']);
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone', 20);
            $table->string('description')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('profileImage');
            $table->string('session_id')->nullable();
            $table->string('country');
            $table->string('city');
            $table->string('subject');
            $table->string('gender');
            $table->string('grade');
            $table->string('password');
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

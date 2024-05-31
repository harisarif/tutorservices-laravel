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
            $table->enum('subjects', ['online tutor', 'tutor for home', 'both']);
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone', 20);
            // $table->time('class_start_time');
            // $table->time('class_end_time');

            $table->string('class_start_time'); // Store time as string
            $table->string('class_end_time');   // Store time as string

            $table->string('whatsapp_number', 20);
            $table->string('country');
            $table->string('city');
            $table->string('subject');
            $table->string('c_email');
            $table->string('password');
            $table->string('c_password');
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

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
        Schema::create('tutors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('f_name');
            $table->string('l_name');
            $table->longText('description')->nullable();
            $table->string('document');
            $table->string('email')->unique();
            $table->string('qualification');
            $table->string('gender');
            $table->string('teaching');
            $table->string('location');
            $table->string('experience');
            $table->string('curriculum')->nullable();
            $table->string('profileImage');
            $table->string('phone', 20);
            $table->date('dob');
            $table->string('status')->default('inactive');
            $table->string('session_id')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tutors', function (Blueprint $table) {
            // Drop foreign key first
            if (Schema::hasColumn('tutors', 'user_id')) {
                $table->dropForeign(['user_id']);
            }

            // Drop session_id column
            if (Schema::hasColumn('tutors', 'session_id')) {
                $table->dropColumn('session_id');
            }
        });

        // Drop the entire table
        Schema::dropIfExists('tutors');
    }
};

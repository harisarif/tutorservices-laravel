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

        Schema::table('tutors', function (Blueprint $table) {
            $table->integer('teacher_id')->after('id')->unique(); 
            $table->json('language')->after('experience'); 
            $table->string('password')->after('language'); 
            $table->string('video')->after('password'); 
            $table->json('specialization')->nullable()->after('video'); 
            $table->string('language_tech')->nullable()->after('specialization'); 
            $table->string('edu_teaching')->nullable()->after('language_tech'); 
            $table->string('country')->nullable()->after('edu_teaching'); 
            $table->string('year')->nullable()->after('country'); 
            $table->string('availability_status')->nullable()->after('year');
            $table->unsignedBigInteger('student_id')->nullable()->after('user_id'); // Add student_id column
            $table->foreign('student_id')->references('id')->on('student')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tutors', function (Blueprint $table) {

            $table->dropForeign(['student_id']); // Drop foreign key first
            $table->dropColumn('student_id'); // Drop the column
            
            $table->dropColumn([
                'language',
                'password',
                'video',
                'specialization',
                'language_tech',
                'edu_teaching','country','year',
            ]);
        });
    }
};

  
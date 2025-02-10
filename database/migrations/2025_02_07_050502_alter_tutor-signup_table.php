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
            $table->json('language')->after('experience'); 
            $table->string('password')->after('language'); 
            $table->string('video')->after('password'); 
            $table->string('specialization')->nullable()->after('video'); 
            $table->string('language_tech')->nullable()->after('specialization'); 
            $table->string('edu_teaching')->nullable()->after('language_tech'); 
            $table->string('country')->nullable()->after('edu_teaching'); 
            $table->string('year')->nullable()->after('country'); 
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tutors', function (Blueprint $table) {
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

  
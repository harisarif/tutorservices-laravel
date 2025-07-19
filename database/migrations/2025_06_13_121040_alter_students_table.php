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
        Schema::table('student',function(Blueprint $table){ $table->enum('availability_status', ['online', 'physical', 'both'])->nullable()->change();
           
            $table->string('phone', 20)->nullable()->change();
            $table->string('profileImage')->nullable()->change();
            $table->string('session_id')->nullable()->change();
            $table->string('country')->nullable()->change();
            $table->string('city')->nullable()->change();
             $table->renameColumn('subject', 'tutor_name')->default('')->change();
            $table->string('gender')->nullable()->change();
           $table->renameColumn('grade', 'searchQuery')->default('')->change();
           $table->unsignedBigInteger('tutor_id')->nullable();
           });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('students',function(Blueprint $table){ $table->enum('availability_status', ['online', 'physical', 'both']);
           
             $table->dropColumn('availability_status');
           });
    }
};

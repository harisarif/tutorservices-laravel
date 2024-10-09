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
        Schema::create('notifications', function (Blueprint $table) {
            // Adding an id with char(36) to accommodate UUID
            $table->char('id', 36)->primary();
            
            // Adding the other required columns
            $table->string('type');                         // Type of notification
            $table->string('notifiable_type');              // Polymorphic relationship type
            $table->unsignedBigInteger('notifiable_id');    // Polymorphic relationship ID
            $table->text('data');                           // Notification data
            $table->timestamp('read_at')->nullable();       // Read timestamp (nullable)
            $table->timestamps();                           // 'created_at' and 'updated_at'
    
            // Optional indexes to improve performance
            $table->index(['notifiable_type', 'notifiable_id']); // Index for notifiable columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};

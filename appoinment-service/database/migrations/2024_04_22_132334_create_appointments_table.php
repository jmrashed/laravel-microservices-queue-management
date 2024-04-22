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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id(); $table->unsignedBigInteger('user_id'); // User ID of the appointment creator
            $table->dateTime('start_time'); // Start date and time of the appointment
            $table->unsignedInteger('duration'); // Duration of the appointment in minutes
            $table->enum('status', ['scheduled', 'completed', 'cancelled'])->default('scheduled'); // Status of the appointment
            $table->text('notes')->nullable(); // Optional notes about the appointment
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};

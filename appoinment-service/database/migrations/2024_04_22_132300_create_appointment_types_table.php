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
        Schema::create('appointment_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Ensure each appointment type has a unique name
            $table->text('description')->nullable(); // Allow for a detailed description
            $table->integer('duration')->nullable(); // Duration of the appointment type in minutes (nullable)
            $table->decimal('price', 10, 2)->nullable(); // Price for the appointment type (nullable)
            $table->boolean('active')->default(true); // Flag to indicate if the appointment type is active
            $table->json('metadata')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment_types');
    }
};

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
        Schema::create('counter_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('counter_id');
            $table->string('action');
            $table->text('details')->nullable();
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('counter_id')->references('id')->on('counters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counter_logs');
    }
};

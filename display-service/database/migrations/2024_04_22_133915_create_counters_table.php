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
        Schema::create('counters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('counter_queue', function (Blueprint $table) {
            $table->unsignedBigInteger('counter_id');
            $table->unsignedBigInteger('queue_id');
            $table->timestamps();

            $table->foreign('counter_id')->references('id')->on('counters')->onDelete('cascade');
            $table->foreign('queue_id')->references('id')->on('queues')->onDelete('cascade');

            $table->primary(['counter_id', 'queue_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counters');
        Schema::dropIfExists('counter_queue');

    }
};

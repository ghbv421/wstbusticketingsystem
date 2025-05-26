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
        Schema::create('bus_table', function (Blueprint $table) {
            $table->id();
            $table->string('bus_type')->unique();
            $table->integer('capacity')->nullable();
            $table->time('departure_time')->nullable();
            $table->time('arrival_time')->nullable();

            // Correct foreign key columns
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->unsignedBigInteger('conductor_id')->nullable();

            $table->string('status')->nullable()->default('SELECT');
            $table->timestamps();

            // Add foreign key constraints
            $table->foreign('driver_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('conductor_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bus_table');
    }
};

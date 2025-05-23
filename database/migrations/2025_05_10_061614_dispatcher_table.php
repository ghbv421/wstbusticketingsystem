<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dispatchers', function (Blueprint $table) {
            $table->id();

            // Foreign keys to users table
            $table->foreignId('driver_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('conductor_id')->nullable()->constrained('users')->onDelete('set null');

            // Foreign key to bus_table
            $table->foreignId('bus_id')->constrained('bus_table')->onDelete('cascade');

            // Bus type as a regular string (not a foreign key)
            $table->string('bus_type');

            // Foreign keys to terminals
            $table->foreignId('from_terminal_id')->constrained('terminals')->onDelete('cascade');
            $table->foreignId('destination_terminal_id')->constrained('terminals')->onDelete('cascade');

            // Schedule fields
            $table->dateTime('departure');
            $table->dateTime('arrival');

            // Status enum
            $table->enum('status', ['Scheduled', 'Departed', 'Arrived', 'Cancelled'])->default('Scheduled');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dispatchers');
    }
};

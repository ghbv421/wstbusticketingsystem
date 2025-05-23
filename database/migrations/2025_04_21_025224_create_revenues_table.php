<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('revenues', function (Blueprint $table) {
            $table->id();

            // Foreign keys
            $table->foreignId('bus_id')->constrained('bus_table')->onDelete('cascade');
            $table->foreignId('driver_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('conductor_id')->constrained('users')->onDelete('cascade');

            // Optional: add dispatcher_id to link this record to a dispatcher
            // $table->foreignId('dispatcher_id')->nullable()->constrained('dispatchers')->onDelete('set null');

            $table->decimal('amount', 10, 2);
            $table->date('date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('revenues');
    }
};

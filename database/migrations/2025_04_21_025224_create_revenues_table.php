<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('revenues', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('bus_id');
            $table->unsignedBigInteger('driver_id');
            $table->unsignedBigInteger('conductor_id');

            $table->decimal('amount', 10, 2);
            $table->date('date');
            $table->timestamps();

            // Foreign keys
            $table->foreign('bus_id')->references('id')->on('bus_table')->onDelete('cascade');
            $table->foreign('driver_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('conductor_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revenues');
    }
};


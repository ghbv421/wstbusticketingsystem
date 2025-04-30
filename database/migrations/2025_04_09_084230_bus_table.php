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
            $table->string("bus_type");
            $table->text("description");
            $table->time("departure_time")->nullable();
            $table->time("arrival_time")->nullable();
            $table->string("driver")->nullable()->default('SELECT');
            $table->string("conductor")->nullable()->default('SELECT');
            $table->string("status")->nullable()->default('SELECT');
            $table->timestamps();
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

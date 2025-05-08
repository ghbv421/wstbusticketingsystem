<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bus_table', function (Blueprint $table) {
            $table->time('departure_time')->nullable();
            $table->time('arrival_time')->nullable();
            $table->string('driver')->nullable();
            $table->string('conductor')->nullable();
            $table->string('status')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('bus_table', function (Blueprint $table) {
            $table->dropColumn([
                'departure_time',
                'arrival_time',
                'driver',
                'conductor',
                'status',
            ]);
        });
    }
};

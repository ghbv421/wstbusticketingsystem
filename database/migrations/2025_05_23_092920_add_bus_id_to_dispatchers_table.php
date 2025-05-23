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
        Schema::table('dispatchers', function (Blueprint $table) {
            $table->foreignId('bus_id')->constrained('bus_table')->onDelete('cascade')->after('driver_id');
        });
    }

    public function down()
    {
        Schema::table('dispatchers', function (Blueprint $table) {
            $table->dropForeign(['bus_id']);
            $table->dropColumn('bus_id');
        });
    }

};

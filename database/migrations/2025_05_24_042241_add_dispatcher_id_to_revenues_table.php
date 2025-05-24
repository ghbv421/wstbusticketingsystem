<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('revenues', function (Blueprint $table) {
            $table->foreignId('dispatcher_id')->nullable()->constrained('dispatchers')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('revenues', function (Blueprint $table) {
            $table->dropForeign(['dispatcher_id']);
            $table->dropColumn('dispatcher_id');
        });
    }
};

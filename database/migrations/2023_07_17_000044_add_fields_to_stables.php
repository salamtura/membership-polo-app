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
        Schema::table('stables', function (Blueprint $table) {
            $table->integer('number_of_lounges');
            $table->integer('number_of_stores');
            $table->integer('number_of_rooms');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stables', function (Blueprint $table) {
            $table->dropColumn(['number_of_lounges','number_of_stores','number_of_rooms']);
        });
    }
};

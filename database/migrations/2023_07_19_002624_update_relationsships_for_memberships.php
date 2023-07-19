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
        Schema::table('memberships', function (Blueprint $table) {
            $table->unsignedBigInteger('occupation_id')->nullable();
            $table->unsignedBigInteger('profession_id')->nullable();
            $table->unsignedBigInteger('membership_category_id')->nullable();

            $table->foreign('occupation_id')->references('id')->on('occupations');
            $table->foreign('profession_id')->references('id')->on('professions');
            $table->foreign('membership_category_id')->references('id')->on('membership_categories');

            $table->dropColumn('occupation');
            $table->dropColumn('profession');
            $table->dropColumn('category');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

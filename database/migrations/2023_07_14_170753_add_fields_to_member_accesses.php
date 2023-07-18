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
        Schema::table('member_accesses', function (Blueprint $table) {
            $table->string('reg_year')->nullable();
            $table->string('category')->nullable();
            $table->string('enrolment_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('member_accesses', function (Blueprint $table) {
            $table->dropColumn(['reg_year','category','enrolment_status']);
        });
    }
};

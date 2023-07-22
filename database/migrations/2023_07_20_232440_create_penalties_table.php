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
        Schema::create('penalties', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Remarks');
            $table->decimal('amount',9,2);
            $table->string('status')->default('pending');
            $table->unsignedBigInteger('penalty_charge_id');
            $table->unsignedBigInteger('membership_id');
            $table->unsignedBigInteger('user_id');
            $table->date('penalty_date');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('membership_id')->references('id')->on('memberships');
            $table->foreign('penalty_charge_id')->references('id')->on('penalty_charges');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penalties');
    }
};

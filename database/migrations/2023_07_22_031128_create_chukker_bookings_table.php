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
        Schema::create('chukker_bookings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('status');
            $table->string('preference');
            $table->integer('chukker_number');
            $table->integer('mounts')->nullable();
            $table->unsignedBigInteger('membership_id');
            $table->unsignedBigInteger('chukker_id');
            $table->string('remarks')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('membership_id')->references('id')->on('memberships');
            $table->foreign('chukker_id')->references('id')->on('chukkers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chukker_bookings');
    }
};

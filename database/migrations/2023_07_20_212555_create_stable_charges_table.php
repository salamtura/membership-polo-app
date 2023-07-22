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
        Schema::create('stable_charges', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->decimal('box_fee');
            $table->decimal('store_fee');
            $table->decimal('room_fee');
            $table->decimal('lounge_fee');
            $table->unsignedBigInteger('user_id');
            $table->string('remarks');

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stable_charges');
    }
};

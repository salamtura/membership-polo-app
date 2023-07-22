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
        Schema::create('chukkers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('chukker_no');
            $table->date('chukker_date');
            $table->dateTime('closing_time');
            $table->string('status');
            $table->string('remarks')->nullable();
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users');



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chukkers');
    }
};

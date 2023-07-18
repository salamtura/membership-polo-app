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
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('user_id')->nullable();

            $table->string('surname');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('mobile')->nullable();
            $table->string('alt_mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('occupation')->nullable();
            $table->string('profession')->nullable();
            $table->string('name_of_organization')->nullable();
            $table->string('type_of_organization')->nullable();
            $table->string('address_of_organization')->nullable();
            $table->string('nationality')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('category')->nullable();
            $table->string('area_of_interest')->nullable();
            $table->boolean('other_membership')->default(false);
            $table->boolean('other_club')->default(false);
            $table->boolean('involved_in_polo')->default(false);
            $table->boolean('horse_owner')->default(false);
            $table->integer('number_of_horses')->default(0);
            $table->unsignedBigInteger('proposed_by')->nullable();
            $table->unsignedBigInteger('seconded_by')->nullable();
            $table->date('membership_since')->nullable();

            $table->integer('player_handicap')->default(-2);;

            $table->string('profile_photo')->nullable();
//            $table->string('background_photo')->nullable();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->string('membership_status')->default('pending');
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->date('approved_date')->nullable();
            $table->string('remarks')->nullable();
            $table->string('subscription_status')->default('inactive');

//            $table->foreign('proposed_by')->references('id')->on('users');
//            $table->foreign('seconded_by')->references('id')->on('users');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->foreign('approved_by')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memberships');
    }
};

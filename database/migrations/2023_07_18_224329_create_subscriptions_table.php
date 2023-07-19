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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('membership_id');
            $table->integer('year');
            $table->decimal('amount',9,2);
            $table->unsignedBigInteger('subscription_category_id');
            $table->string('payment_status');
            $table->dateTime('payment_date');
            $table->string('remarks');

            $table->foreign('membership_id')->references('id')->on('memberships');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};

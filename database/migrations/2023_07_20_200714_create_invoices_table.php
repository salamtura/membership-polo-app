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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('inv_number');
            $table->string('description');
            $table->date('invoice_date');
            $table->date('invoice_due_date');
            $table->string('invoice_type');
            $table->string('payment_ref');
            $table->string('payment_mode');
            $table->string('remarks');
            $table->decimal('total_amount',9,2);
            $table->string('status')->default('unpaid');
            $table->unsignedBigInteger('subscription_id')->nullable();
            $table->unsignedBigInteger('stable_id')->nullable();
            $table->unsignedBigInteger('membership_id')->nullable();

            $table->foreign('subscription_id')->references('id')->on('subscriptions');
            $table->foreign('stable_id')->references('id')->on('stables');
            $table->foreign('membership_id')->references('id')->on('memberships');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};

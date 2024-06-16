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
        Schema::create('managePaymentModel', function (Blueprint $table) {
            $table->id();
            $table->string('cardBank')->nullable();
            $table->bigInteger('cardNum')->nullable();
            $table->bigInteger('cardCVV')->nullable();
            $table->string('cardExpirationDate')->nullable();
            $table->string('cardholderName')->nullable();
            $table->string('cardholderState')->nullable();
            $table->string('cardholderCity')->nullable();
            $table->bigInteger('cardholderPostalCode')->nullable();
            $table->string('eWalletbank')->nullable();
            $table->bigInteger('eWalletAccNum')->nullable();
            $table->string('parent_id')->nullable();
            $table->string('payment_method')->nullable();
            $table->double('payment_owed')->nullable();
            $table->double('payment_made')->nullable();
            $table->string('payment_status')->nullable();
            $table->date('payment_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('managePaymentModel');
    }
};

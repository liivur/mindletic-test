<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('credit_card', static function (Blueprint $table) {
            $table->id();
            // Owner of the card (company or user) - could also have these relations in a pivot table, but keeping it simple for now
            $table->unsignedBigInteger('business_account_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            // Not sure if there is some implementation layer for charging the cards, so not sure what fields to keep - having the card number as placeholder for now
            $table->string('card_number');
            $table->timestamps();

            $table->foreign('business_account_id')->references('id')->on('business_accounts');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('credit_card');
    }
};

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
    public function up()
    {
        Schema::create('business_account_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('business_account_id');
            $table->unsignedBigInteger('user_id');
            // Admin or regular user - not sure if there are other roles. If only these two, then it could be a boolean
            $table->string('role');
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
    public function down()
    {
        Schema::dropIfExists('business_account_user');
    }
};

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
        Schema::create('boost_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('employer_id');
            $table->integer('package_id');
            $table->string('package_price');
            $table->string('tnxID');
            $table->string('payment_method');
            $table->tinyInteger('isActive');
            $table->string('date_purchased');
            $table->string('date_expired');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boost_orders');
    }
};

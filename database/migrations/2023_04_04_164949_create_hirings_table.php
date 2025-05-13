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
        Schema::create('hirings', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('description');
            $table->string('location');
            $table->string('salary')->nullable();
            $table->text('responsibilities')->nullable();
            $table->text('requirements')->nullable();
            $table->text('benefits')->nullable();
            $table->string('deadline');
            $table->string('category');
            $table->string('type');
            $table->string('experiance');
            $table->string('education');
            $table->string('gender');
            $table->string('map')->nullable();
            $table->string('isfeatured')->default('no');
            $table->string('isBoosted')->default('no');
            $table->string('status')->default('active');
            $table->string('token');
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
        Schema::dropIfExists('hirings');
    }
};

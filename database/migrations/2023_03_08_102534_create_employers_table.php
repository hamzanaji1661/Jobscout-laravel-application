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
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->string('employer_name');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('logo')->nullable();
            $table->string('website')->nullable();
            $table->string('token')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('zip')->nullable();
            $table->string('size')->nullable();
            $table->integer('industry')->nullable();
            $table->string('founded')->nullable();
            $table->text('about')->nullable();
            $table->string('hours_sunday')->nullable();
            $table->string('hours_monday')->nullable();
            $table->string('hours_tuesday')->nullable();
            $table->string('hours_wednesday')->nullable();
            $table->string('hours_thursday')->nullable();
            $table->string('hours_friday')->nullable();
            $table->string('hours_saturday')->nullable();
            $table->text('map')->nullable();
            $table->text('facebook')->nullable();
            $table->text('twitter')->nullable();
            $table->text('linkedin')->nullable();
            $table->text('instagram')->nullable();
            $table->text('github')->nullable();
            $table->tinyInteger('isverified');
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
        Schema::dropIfExists('employers');
    }
};

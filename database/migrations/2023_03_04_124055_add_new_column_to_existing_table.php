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
        Schema::table('page_home_items', function (Blueprint $table) {
            $table->text('job_category_heading');
            $table->text('job_category_description')->nullable();
            $table->text('job_category_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('page_home_items', function (Blueprint $table) {
            //
        });
    }
};

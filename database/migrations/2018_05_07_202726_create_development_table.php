<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevelopmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('development', function (Blueprint $table) {
            $table->increments('dev_id');
            $table->string('dev_title');
            $table->text('dev_initiated_log');
            $table->date('dev_initiated_date');
            $table->string('dev_thumbnails');
            $table->string('dev_fileimage');
            $table->text('dev_comment');
            $table->string('dev_city');
            $table->string('dev_district');
            $table->string('dev_type');
            $table->string('dev_charge');
            $table->string('dev_method');
            $table->integer('dev_area_size');
            $table->string('dev_applied_law');
            $table->date('dev_publicly_starting_date');
            $table->text('dev_future_plan');
            $table->string('dev_reference');
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
        Schema::dropIfExists('development');
    }
}

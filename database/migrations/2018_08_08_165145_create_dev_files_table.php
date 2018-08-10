<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dev_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dev_id')->unsigned();
            $table->foreign('dev_id')->references('id')->on('development')->onDelete('cascade');
            $table->string('fileimage');
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
        Schema::dropIfExists('dev_files');
    }
}

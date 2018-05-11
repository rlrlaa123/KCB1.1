<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotfocusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotfocus', function (Blueprint $table) {
            $table->increments('hf_id');
            $table->integer('dash_id');
            $table->string('hf_title');
            $table->text('hf_content');
            $table->date('hf_date');
            $table->string('hf_fileimage');
            $table->string('hf_thumbnails');
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
        Schema::dropIfExists('hotfocus');
    }
}

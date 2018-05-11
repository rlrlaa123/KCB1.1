<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFYITable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('FYI', function (Blueprint $table) {
            $table->increments('fyi_id');
            $table->string('fyi_title');
            $table->text('fyi_content');
            $table->date('fyi_date');
            $table->string('fyi_fileimage');
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
        Schema::dropIfExists('FYI');
    }
}

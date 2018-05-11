<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJudicialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Judicial', function (Blueprint $table) {
            $table->increments('j_id');
            $table->string('j_title');
            $table->text('j_content');
            $table->date('j_date');
            $table->integer('dash_id');
            $table->string('j_fileimage');
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
        Schema::dropIfExists('Judicial');
    }
}

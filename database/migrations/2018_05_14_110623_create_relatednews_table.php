<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelatedNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RelatedNews', function (Blueprint $table) {
            $table->increments('rn_id');
            $table->integer('dash_id');
            $table->string('rn_title');
            $table->text('rn_content');
            $table->string('rn_link');
            $table->date('rn_date');
            $table->string('rn_fileimage')->nullable();
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
        Schema::dropIfExists('RelatedNews');
    }
}

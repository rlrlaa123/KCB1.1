<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAskingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asking', function (Blueprint $table) {
            $table->increments('id');
            $table->string('asking_user');
            $table->string('asking_user_email');
            $table->string('asking_title');
            $table->string('asking_password');
            $table->string('asking_content');
            $table->string('asking_file')->nullable();
            $table->date('asking_date');
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
        Schema::dropIfExists('asking');
    }
}

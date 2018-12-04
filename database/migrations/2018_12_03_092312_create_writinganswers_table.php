<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWritinganswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('writinganswers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('writingpoint_id');
            $table->integer('writing_id');
            $table->string('passage_1');
            $table->string('passage_2');
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
        Schema::dropIfExists('writinganswers');
    }
}

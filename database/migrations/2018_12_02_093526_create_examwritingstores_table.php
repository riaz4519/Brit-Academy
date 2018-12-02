<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamwritingstoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examwritingstores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('examanswerstore_id');
            $table->text('answer');
            $table->integer('wsection_id');
            $table->boolean('viewed');


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
        Schema::dropIfExists('examwritingstores');
    }
}

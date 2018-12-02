<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamanswerstoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examanswerstores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('exam_id');
            $table->float('listening_point')->nullable();
            $table->float('reading_point')->nullable();
            $table->float('writing_point')->nullable();
            $table->float('speaking_point')->nullable();

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
        Schema::dropIfExists('examanswerstores');
    }
}

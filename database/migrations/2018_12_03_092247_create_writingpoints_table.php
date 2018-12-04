<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWritingpointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('writingpoints', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('examanswerstore_id');
            $table->float('passage_1')->nullable();
            $table->float('passage_2')->nullable();
            $table->float('point')->nullable();
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
        Schema::dropIfExists('writingpoints');
    }
}

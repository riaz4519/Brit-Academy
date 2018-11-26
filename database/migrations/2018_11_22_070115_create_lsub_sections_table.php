<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsubSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lsubsections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lsection_id');
            $table->text('body');
            $table->string('time_start');
            $table->string('time_end');
            $table->integer('start');
            $table->integer('end');
            $table->integer('ltype_id');
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
        Schema::dropIfExists('lsubsections');
    }
}

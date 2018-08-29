<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->boolean('status')->default(false);
            $table->integer('exam_taken')->default(0);
            $table->integer('course_id');

            $table->integer('listening_id')->unsigned()->nullable();
            $table->integer('reading_id')->unsigned()->nullable();
            $table->integer('writing_id')->unsigned()->nullable();
            $table->integer('speaking_id')->unsigned()->nullable();

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
        Schema::dropIfExists('exams');
    }
}

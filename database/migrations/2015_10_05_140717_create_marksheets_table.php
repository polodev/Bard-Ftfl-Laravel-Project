<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarksheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marksheets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id');
            $table->integer('exam_id')->unsigned();
            $table->integer('trainee_id')->unsigned();
            $table->string('trainee');
            $table->integer('mark')->unsigned();
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
        Schema::drop('marksheets');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->text('course_name');
            $table->text('introduction');
			$table->text('objectives');
			$table->text('course_contents');
			$table->text('training_methods');
			$table->text('participants');
			$table->text('duration'); 
            $table->text('academic_staff');
            $table->text('course_fee');
            $table->text('accommodation_and_food');
            $table->text('library');
            $table->text('award');
            $table->text('address_for_correspondence');
            $table->integer('training_id')->unsigned();
            $table->string('course_image');

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
        Schema::drop('courses');
    }
}

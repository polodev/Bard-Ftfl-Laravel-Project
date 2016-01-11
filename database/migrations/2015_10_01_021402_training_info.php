<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TrainingInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('training_name', 255);
            $table->string('training_type');
            $table->text('description');
            $table->text('applying_information');
            $table->text('objectives');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('provided_resources');
            $table->text('accommodation');
            //$table->text('testimonial')->nullable();
            $table->text('daily_schedule');
            $table->text('fees_structure');
            $table->text('responsible_person');
            $table->tinyInteger('status')->default(1);
            $table->string("image_path");
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
        Schema::drop('trainings');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHealthExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_exams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('navel', 255);
            $table->string('blood_pressure');
            $table->string('respiration');
            $table->text('anemia');
            $table->text('jaundice');
            $table->string('weight');
            $table->string('heart');
            $table->string('lung');
            $table->string('liver');
            $table->string('spleen');
            $table->string('kidney');
            $table->string('hernia');
            $table->string('hydrocil');
            $table->string('left_eye');
            $table->string('right_eye');
            $table->string('comments_mofficer');
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
        Schema::drop('health_exams');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('slug')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('name', 30);
            $table->string('gender', 10);
            $table->string('trainee_id', 10);
            $table->integer('trainee_login_id')->unsigned();
            
            $table->string('institution', 30);
            $table->string('educational_qualification', 100);
            $table->string('service_experience', 50);
            $table->string('experience_year', 10);
            $table->date('date_of_birth', 30);
            $table->string('birth_place', 30);
            $table->date('join_date', 30);
            $table->string('guardians_name', 30);
            $table->string('village', 30);
            $table->string('post_office', 30);
            $table->string('sub_district', 30);
            $table->string('district', 30);
            $table->string('service_station', 30);
            $table->string('marital', 10);
            $table->string('ph_home', 15);
            $table->string('ph_office', 15);
            $table->string('ph_mobile', 15);
            $table->text('diseases');
            $table->string('soprts', 55);
            $table->string('hobby', 55);
            $table->text('expertise');
            $table->string('interested_game', 55);
            $table->string('height', 10);
            $table->string('weight', 10);
            $table->string('waist_abdomen', 10);
            $table->string('chest', 10);
            $table->string('weight_end_course', 10);
            $table->string('filepath');

            $table->foreign('trainee_login_id')->references('id')->on('users')->onDelete('cascade');

        });
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('infos');
    }
}

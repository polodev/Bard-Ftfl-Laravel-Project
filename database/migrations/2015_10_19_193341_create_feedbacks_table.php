<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trainee_id')->unsigned();
            $table->integer('trainer_id')->unsigned();
            $table->integer('voice_range');
            $table->integer('voice_clearity');
            $table->integer('communication_skills');
            $table->integer('rapport_building');
            $table->integer('interaction');
            $table->integer('topic_usefulness');
            $table->integer('material_organization');
            $table->integer('speakers_knowledge');
            $table->string('comments');
            $table->timestamps();
            
            $table->foreign('trainee_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('trainer_id')->references('id')->on('users')->onDelete('cascade');
            
        });
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

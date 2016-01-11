<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHealthReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_reports', function (Blueprint $table)         {
            $table->increments('id'); 
            $table->integer('user_id');
            $table->text('present_address');
            $table->text('permanent_address');
            $table->date('birth_date');
            $table->integer('age_beginning_course');
            $table->text('marital_status');
            $table->text('present_disease');
            $table->text('physical_disability');
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
        Schema::drop('health_reports');
    }
}

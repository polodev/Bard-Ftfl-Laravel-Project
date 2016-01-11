<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RegistrationForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->string("bengali_name");
            $table->string("english_name");
            $table->string("father_name");
            $table->string("mother_name");
            $table->date("date_of_birth");
            $table->string("village");
            $table->string("post_office");
            $table->string("upazila");
            $table->string("district");
            $table->integer("id_code")->unsigned();
            $table->string("organization");
            $table->integer("telephone")->unsigned();
            $table->integer("fax")->unsigned();
            $table->string("e_mail");
            $table->integer("mobile")->unsigned();
            $table->date("joining_date");
            $table->integer("service_code");
            $table->integer("training_id");
            $table->string("marital_status");
            $table->string("contact_person_name");
            $table->string("contact_person_address");
            $table->integer("contact_person_tel");
            $table->string("participant_rel");
            $table->string("img_path");
            $table->integer("edu_id");
            $table->integer("user_id")->unsigned();
//            $table->dateTime("updated_at");
            $table->tinyInteger("deletable")->default(1);
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
        Schema::drop('registrations');
    }
}

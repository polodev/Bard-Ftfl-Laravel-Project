<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTraining extends Model
{
    protected $table='user_traininginfo';
    protected $fillable=['user_id','trainings_id'];
}

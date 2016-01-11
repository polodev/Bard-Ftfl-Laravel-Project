<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingCourse extends Model
{
    protected $table='trainingcourse';
    protected $fillable=['course_id','trainings_id'];
    
    
}

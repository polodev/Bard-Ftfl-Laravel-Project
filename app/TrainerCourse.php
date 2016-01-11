<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainerCourse extends Model
{
    protected $table='trainercourses';
    protected $fillable=['trainer_id','course_id'];
    
    
    public function course()
    {
        return $this->belongsTo('App\Course');
    }
    
    public function trainer()
    {
        return $this->belongsTo('App\Trainer');
    }

}

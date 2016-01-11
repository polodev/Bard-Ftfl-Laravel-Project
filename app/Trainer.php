<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
     protected $fillable = ['name','gender','educational_qualification', 'previous_experience', 'date_of_birth','cell_number','email','country','filePath','skill_set','slug','status','trainer_id'];
    
    
    public function courses()
    {
        return $this->hasMany('App\Course','course_id');
    }

    
    public function feedbacks()
    {
        return $this->hasMany('App\Feedback');
    }

    public function trainers()
    {
        return $this->belongsTo('App\User','trainer_id');
    }
}



<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
     protected $fillable = ['day','session_name','trainee_attendance', 'course_id', 'session_id','trainee_id'];
    

    public function courses()
    {
        return $this->hasMany('App\Course','course_id');
    }

    
}

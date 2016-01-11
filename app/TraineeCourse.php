<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TraineeCourse extends Model
{
    protected $table='traineeCourses';
    protected $fillable=['course_id', 'trainee_id'];

    public function course()
    {
        return $this->belongsTo('App\Course');
    }
    public function trainee()
    {
        return $this->belongsTo('App\User');
    }
}

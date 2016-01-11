<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $table="exams";
    protected $fillable=['title','exam_description','exam_date','exam_mark'];


    public function marks()
    {
        return $this->hasMany('App\Marksheet');
    }
}

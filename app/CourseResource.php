<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseResource extends Model
{
     protected $fillable = ['id','course_id','title','description','file_path'];
}

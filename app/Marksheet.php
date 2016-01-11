<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marksheet extends Model
{
    protected $table="marksheets";
    protected $fillable=['trainee','mark']; //mizan.merch@gmail.com

    public function exams()
    {
        return $this->belongsTo('App\Exam');
    }
}

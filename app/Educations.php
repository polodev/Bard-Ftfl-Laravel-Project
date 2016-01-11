<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Educations extends Model
{
    protected $table = 'educations';
    //protected $primaryKey='id';
    //protected $guarded = ['id'];

    protected $fillable = ['name_of_degree', 'subject', 'Year', 'board'];
}

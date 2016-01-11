<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $table='faqs';
    protected $fillable=['id','training_id','author_name','question','answer'];
}

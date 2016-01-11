<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $table="issues";
    protected $fillable=['title','description','language','volume_id'];
}

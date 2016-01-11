<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volume extends Model
{
    protected $table='volumes';
    protected $fillable=['journals_id','title','description','language'];
}

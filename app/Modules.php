<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modules extends Model
{
    protected $table='modules';
    protected $fillable=['author','abstract','filepath','references','project_id'];
}

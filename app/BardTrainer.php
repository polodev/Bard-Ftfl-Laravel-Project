<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BardTrainer extends Model
{
	protected $table="bardtrainers";
     protected $fillable = ['name','gender','educational_qualification', 'previous_experience','date_of_birth','cell_number','email','country','description','filePath','skill_set','slug','status'];
    
   
}


<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HealthExam extends Model
{
    protected $table = 'health_exams'; 
    
    protected $fillable = ['user_id','navel','blood_pressure','respiration','anemia','jaundice','weight','heart','lung','liver','spleen','kidney','hernia','hydrocil','left_eye','right_eye','comments_mofficer'];
    
    public function trainee()
    {
        return $this->belongsTo('App\Info');
    }
     
}

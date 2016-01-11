<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
     protected $fillable = ['name','gender', 'slug','status','trainee_id', 'trainee_login_id', 'institution','educational_qualification', 'service_experience',
     						'experience_year','date_of_birth','birth_place','join_date','guardians_name','village',
     						'post_office','sub_district','district','service_station','marital','ph_home','ph_office',
     						'ph_mobile','diseases','soprts','hobby','expertise','interested_game','height','weight','waist_abdomen',
     						'chest','weight_end_course','filepath'];
    
    public function healthExam()
    {
        return $this->belongsTo('App\HealthExam');
    }
    
    public function healthReport()
    {
        return $this->belongsTo('App\HealthReport');
    }
}

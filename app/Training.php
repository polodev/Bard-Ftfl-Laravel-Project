<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    //protected $table='trainings';
    protected $fillable = ['id','training_name','training_type','description','applying_information','objectives','start_date','end_date','provided_resources','accommodation','testimonial','daily_schedule','fees_structure','responsible_person','status','image_path'];
    
    public function courses()
    {
        return $this->hasMany('App\Course');
    }

}

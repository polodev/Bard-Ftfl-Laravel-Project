<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HealthReport extends Model
{
    protected $table = 'health_reports';
    
    protected $fillable = ['user_id', 'present_address', 'permanent_address', 'birth_date', 'age_beginning_course', 'marital_status', 'present_disease', 'physical_disability'];
    
    public function trainee()
    {
        return $this->belongsTo('App\Info');
    }
}

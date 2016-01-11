<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = ['trainer_id','trainee_id','voice_range','voice_clearity','communication_skills','rapport_building','interaction','topic_usefulness','material_organization','speakers_knowledge','comments'];
    
    public function trainer()
    {
        return $this->belongsTo('App\User');
    }
    
    public function trainee()
    {
        return $this->belongsTo('App\User');
    }
}

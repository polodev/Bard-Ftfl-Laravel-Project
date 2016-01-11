<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content','post_id', 'user_id', 'status'];
    public function ticket()
    {
        return $this->belongsTo('App\TrainingForum');
    }
}

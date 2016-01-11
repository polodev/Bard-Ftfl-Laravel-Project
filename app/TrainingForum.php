<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingForum extends Model
{
    protected $table = 'training_forums';
    protected $fillable = ['training_id', 'user_id', 'title', 'content'];

    public function comments()
    {
        return $this->hasMany('App\Comment', 'post_id');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}

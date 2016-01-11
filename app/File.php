<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table="files";
    protected $primaryKey="id";
    protected $fillable=['author','abstract','filepath','references','issue_id'];
}

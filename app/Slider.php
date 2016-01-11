<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['heading_text', 'paragraph_text', 'button_text', 'button_url', 'slider_image', 'position'];
}

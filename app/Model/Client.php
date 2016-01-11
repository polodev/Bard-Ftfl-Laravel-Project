<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['client_name', 'client_email', 'client_phone_number', 'client_address', 'client_logo'];
}

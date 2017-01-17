<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeviceLogin extends Model
{
    protected $table = 'device_login';
    protected $fillable = [
        'username',
        'ip_address'
    ];
}

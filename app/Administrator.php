<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Administrator extends Model implements Authenticatable
{
    use AuthenticableTrait;

    protected $table = 'administrator';
    protected $fillable = [
        'username',
        'password'
    ];
}

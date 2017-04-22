<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Member extends Model implements Authenticatable
{
    use AuthenticableTrait;

    protected $table = 'member';
    protected $fillable = [
        'username',
        'full_name',
        'author',
        'email',
        'password',
        'text_password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

}

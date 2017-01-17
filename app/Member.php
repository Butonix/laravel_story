<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Member extends Model
{
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

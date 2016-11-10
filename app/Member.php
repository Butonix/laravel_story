<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Member extends Model
{
    public function __construct() {

    }

    protected $table = 'tb_member';

    protected $fillable = [
        'username', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public $timestamps = true;

}

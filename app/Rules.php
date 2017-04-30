<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rules extends Model
{
    protected $table = 'rules';
    protected $fillable = [
        'detail'
    ];
}

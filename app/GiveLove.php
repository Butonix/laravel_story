<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiveLove extends Model
{
    protected $table = 'give_love';
    protected $fillable = [
        'story_id',
        'username',
        'status'
    ];

}

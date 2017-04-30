<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HowToUnlockStory extends Model
{
    protected $table = 'how_to_unlock_story';
    protected $fillable = [
        'detail'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnlockSubStory extends Model
{
    protected $table = 'unlock_sub_story';
    protected $fillable = [
        'member_id',
        'sub_story_id'
    ];
}

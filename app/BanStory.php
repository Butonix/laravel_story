<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BanStory extends Model
{
    protected $table = 'ban_story';
    protected $fillable = [
        'story_id',
        'status_ban'
    ];
}

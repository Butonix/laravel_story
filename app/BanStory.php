<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BanStory extends Model
{
    public $primaryKey = 'story_id';
    protected $table = 'ban_story';
    protected $fillable = [
        'story_id',
        'status_ban'
    ];
}

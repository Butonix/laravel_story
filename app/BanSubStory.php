<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BanSubStory extends Model
{
    public $primaryKey = 'sub_story_id';
    protected $table = 'ban_sub_story';
    protected $fillable = [
        'sub_story_id',
        'status_ban'
    ];
}

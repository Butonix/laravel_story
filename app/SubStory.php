<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubStory extends Model
{
    protected $table = 'sub_story';
    protected $fillable = [
        'story_id',
        'story_name',
        'story_outline'
    ];
}

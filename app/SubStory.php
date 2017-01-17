<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubStory extends Model
{
    protected $table = 'sub_story';
    protected $fillable = [
        'sub_story_name',
        'sub_story_detail'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoryComment extends Model
{
    protected $table = 'story_comment';
    protected $fillable = [
        'story_id',
        'comment_detail',
    ];
}

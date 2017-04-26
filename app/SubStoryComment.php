<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubStoryComment extends Model
{
    protected $table = 'sub_story_comment';
    protected $fillable = [
        'sub_story_id',
        'comment_detail',
    ];
}

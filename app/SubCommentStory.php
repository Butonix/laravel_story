<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCommentStory extends Model
{
    protected $table = 'sub_comment_story';
    protected $fillable = [
        'story_comment_id',
        'comment_detail',
        'username'
    ];
}

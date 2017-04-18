<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReplyCommentStory extends Model
{
    protected $table = 'reply_comment_story';
    protected $fillable = [
        'reply_comment_id',
        'comment_detail',
        'username'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReplyCommentSubStory extends Model
{
    protected $table = 'reply_comment_sub_story';
    protected $fillable = [
        'reply_comment_id',
        'member_id',
        'comment_detail',
    ];
}

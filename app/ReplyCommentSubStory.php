<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ReplyCommentSubStory extends Model
{
    protected $table = 'reply_comment_sub_story';
    protected $fillable = [
        'reply_comment_id',
        'member_id',
        'comment_detail',
    ];

    public function addComment($request)
    {
        $this->create([
            'reply_comment_id' => $request->reply_comment_id,
            'member_id' => Auth::user()->id,
            'comment_detail' => $request->comment_detail
        ]);
    }
}

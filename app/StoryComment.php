<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class StoryComment extends Model
{
    protected $table = 'story_comment';
    protected $fillable = [
        'story_id',
        'member_id',
        'comment_detail',
    ];

    public function addComment($request)
    {
        $this->create([
            'story_id' => $request->story_id,
            'member_id' => Auth::user()->id,
            'comment_detail' => $request->comment_detail
        ]);
    }

}

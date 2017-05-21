<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SubStoryComment extends Model
{
    protected $table = 'sub_story_comment';
    protected $fillable = [
        'sub_story_id',
        'member_id',
        'comment_detail',
    ];

    public function addComment($request)
    {
        $this->create([
            'sub_story_id' => $request->sub_story_id,
            'member_id' => Auth::user()->id,
            'comment_detail' => $request->comment_detail
        ]);
    }

}

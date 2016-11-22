<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $fillable = [
        'story_id',
        'story_name',
        'username',
        'comment_detail'
    ];
}

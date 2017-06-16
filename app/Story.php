<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $table = 'story';
    protected $fillable = [
        'member_id',
        'category_id',
        'story_name',
        'story_author',
        'story_outline',
        'story_picture',
        'status_ban',
        'status_public',
        'status_comment',
        'count_visitor',
        'count_like'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $table = 'tb_story';
    protected $fillable = [
        'story_name',
        'story_author',
        'category_name',
        'story_outline',
        'story_picture',
        'state_comment',
        'state_public'
    ];
    public $timestamps = true;
}

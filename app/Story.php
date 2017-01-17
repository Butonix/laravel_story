<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $table = 'story';
    protected $fillable = [
        'category_id',
        'username',
        'story_name',
        'story_author',
        'story_outline',
        'story_picture'
    ];
}

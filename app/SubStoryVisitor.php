<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubStoryVisitor extends Model
{
    protected $table = 'sub_story_visitor';
    protected $fillable = [
        'sub_story_id',
        'count'
    ];
}

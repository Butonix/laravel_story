<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoryVisitor extends Model
{
    protected $table = 'story_visitor';
    protected $primaryKey = 'story_id';
    protected $fillable = [
        'count'
    ];
}

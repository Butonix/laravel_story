<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionStory extends Model
{
    protected $table = 'permission_story';
    protected $fillable = [
        'story_id',
        'status_comment',
        'status_public',
    ];
}
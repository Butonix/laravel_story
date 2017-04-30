<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionSubStory extends Model
{
    protected $primaryKey = 'sub_story_id';
    protected $table = 'permission_sub_story';
    protected $fillable = [
        'sub_story_id',
        'status_comment',
        'status_public',
        'unlock_coin',
        'unlock_diamond'
    ];
}

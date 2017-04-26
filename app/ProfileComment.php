<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileComment extends Model
{
    protected $table = 'profile_comment';
    protected $fillable = [
        'member_id',
        'comment_detail',
    ];
}

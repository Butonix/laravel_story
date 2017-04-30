<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionMember extends Model
{
    protected $primaryKey = 'member_id';
    protected $table = 'permission_member';
    protected $fillable = [
        'member_id',
        'ban_status'
    ];
}

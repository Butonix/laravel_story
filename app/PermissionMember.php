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

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function banMember($id)
    {
        $this->where('member_id', $id)->update(['ban_status' => 1]);
    }

    public function unBanMember($id)
    {
        $this->where('member_id', $id)->update(['ban_status' => 0]);
    }
}

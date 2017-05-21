<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Support\Facades\Hash;
use App\PermissionMember;

class Member extends Model implements Authenticatable
{
    use AuthenticableTrait;

    protected $table = 'member';
    protected $fillable = [
        'username',
        'full_name',
        'author',
        'email',
        'password',
        'text_password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function insertMember($request)
    {
        $member = $this->create([
            'username' => $request->username,
            'author' => $request->author,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'text_password' => Hash('md5', $request->password)
        ]);

        PermissionMember::create([
            'member_id' => $member->id,
            'ban_status' => 0
        ]);
    }

    public function updateMember($request, $id)
    {
        if (empty($request->password)) {
            return $this->where('id', $id)->update($request->except(['_method', '_token', 'password']));
        } else {
            return $this->where('id', $id)->update([
                'author' => $request->author,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'text_password' => Hash('md5', $request->password)
            ]);
        }
    }

    public function permissionMember()
    {
        return $this->hasMany(PermissionMember::class);
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Support\Facades\Hash;

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
        'status_ban'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function insertMember($request)
    {
        $this->create([
            'username' => $request->username,
            'author' => $request->author,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'text_password' => Hash('md5', $request->password),
            'status_ban' => 0
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
}

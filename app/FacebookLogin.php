<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SammyK\LaravelFacebookSdk\SyncableGraphNodeTrait;

class FacebookLogin extends Model
{
    use SyncableGraphNodeTrait;

    protected $table = 'facebook_login';

    protected $fillable = ['facebook_user_id', 'full_name', 'email'];

    protected $hidden = ['access_token'];

    protected static $graph_node_field_aliases = [
        'id' => 'facebook_user_id',
        'name' => 'full_name',
        'email' => 'email'
    ];
}

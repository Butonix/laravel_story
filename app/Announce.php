<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announce extends Model
{
    protected $table = 'announce';
    protected $fillable = [
      'username',
      'announce_title',
      'announce_detail',
      'status_comment'
    ];
}

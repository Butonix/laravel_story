<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $primaryKey = 'story_id';
    protected $table = 'tag';
    protected $fillable = [
      'story_id',
      'tag1',
      'tag2',
      'tag3',
      'tag4',
      'tag5'
    ];

//    public $timestamps = true;
}

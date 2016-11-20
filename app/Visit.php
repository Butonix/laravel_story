<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
  protected $table = 'visit';
  protected $fillable = [
      'story_id',
      'view'
  ];
}

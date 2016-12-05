<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrueMoney extends Model
{
    protected $table = 'truemoney';
    protected $fillable = [
      'tmCode',
      'tmMsg',
      'tmAmount',
      'tmRealAmount',
      'tmStatus'
    ];
}

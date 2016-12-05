<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountTrueMoney extends Model
{
    protected $table = 'account_truemoney';
    protected $fillable = [
      'username',
      'tmCode'
    ];
}

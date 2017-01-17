<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CashCard extends Model
{
    protected $table = 'cashcard';
    protected $fillable = [
        'username',
        'amount',
    ];
}

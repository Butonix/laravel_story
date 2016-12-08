<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryCashCard extends Model
{
    protected $table = 'history_cashcard';

    protected $fillable = [
        'username',
        'transaction',
        'response_code',
        'response_desc',
        'cashcard_no',
        'amount',
        'status'
    ];
}

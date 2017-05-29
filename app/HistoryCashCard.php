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

    public function formatAmount($amount)
    {
        $result = 0;
        if ((substr($amount, 0, -2) == 50)) {
            $result = 5400;
        } else if ((substr($amount, 0, -2) == 90)) {
            $result = 9800;
        } else if ((substr($amount, 0, -2) == 150)) {
            $result = 16400;
        } else if ((substr($amount, 0, -2) == 300)) {
            $result = 33000;
        } else if ((substr($amount, 0, -2) == 500)) {
            $result = 55200;
        } else if ((substr($amount, 0, -2) == 1000)) {
            $result = 111000;
        }
        return $result;
    }
}

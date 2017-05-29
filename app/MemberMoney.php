<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\HistoryCashCard;

class MemberMoney extends Model
{
    protected $table = 'member_money';
    protected $fillable = [
        'member_id',
        'cash',
        'diamond'
    ];

    public function addCash($member_id, $cash)
    {
        $current_cash = 0;

        if ((substr($cash, 0, -2) == 50)) {
            $current_cash = 5400;
        } else if ((substr($cash, 0, -2) == 90)) {
            $current_cash = 9800;
        } else if ((substr($cash, 0, -2) == 150)) {
            $current_cash = 16400;
        } else if ((substr($cash, 0, -2) == 300)) {
            $current_cash = 33000;
        } else if ((substr($cash, 0, -2) == 500)) {
            $current_cash = 55200;
        } else if ((substr($cash, 0, -2) == 1000)) {
            $current_cash = 111000;
        }

        $total = $this->historyCashCard() + $current_cash;

        $this->where('member_id', $member_id)
            ->update([
                'cash' => $total
            ]);
        return 'Add Cash Success';
    }

    public function payCash($member_id, $price)
    {
        $currentCash = $this->where('member_id', $member_id)->first();
        $process = $currentCash->cash - $price;
        if ($process > 0) {
            $this->where('member_id', $member_id)
                ->update([
                    'cash' => $process
                ]);
            return true;
        } else {
            return false;
        }
    }

    public function currentCash()
    {
        $currentCash= $this->where('member_id', Auth::user()->id)->first();
        return $currentCash->cash;
    }

    public function historyCashCard()
    {
        $cashs = HistoryCashCard::where('member_id', Auth::user()->id)->get();
        $current_cash = 0;
        if (count($cashs) >= 1) {
            foreach ($cashs as $cash) {

                if ((substr($cash->amount, 0, -2) == 50)) {
                    $current_cash = $current_cash + 5400;
                } else if ((substr($cash->amount, 0, -2) == 90)) {
                    $current_cash = $current_cash + 9800;
                } else if ((substr($cash->amount, 0, -2) == 150)) {
                    $current_cash = $current_cash + 16400;
                } else if ((substr($cash->amount, 0, -2) == 300)) {
                    $current_cash = $current_cash + 33000;
                } else if ((substr($cash->amount, 0, -2) == 500)) {
                    $current_cash = $current_cash + 55200;
                } else if ((substr($cash->amount, 0, -2) == 1000)) {
                    $current_cash = $current_cash + 111000;
                }

            }
        }
        return $current_cash;
    }

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

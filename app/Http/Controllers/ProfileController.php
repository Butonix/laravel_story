<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\HistoryCashCard;
use App\Story;

class ProfileController extends Controller
{
    public function getProfile() {
        $storys = new Story;

        if (Auth::check()) {
            $storys = $storys::where('username', Auth::User()->username)->get();
        } else {
            if (Session::get('facebook_login') != '') {
                $storys = $storys::where('username', Session::get('facebook_login'))->get();
            }
        }

        $history_cashcard = new HistoryCashCard;

        if (Auth::check()) {
            $history_cashcard = $history_cashcard::where('username', Auth::User()->username)->where('response_code', 0)->get();
        } else {
            if (Session::get('facebook_login') != '') {
                $history_cashcard = $history_cashcard::where('username', Session::get('facebook_login'))->where('response_code', 0)->get();
            }
        }

        $real_amount = 0;

        foreach ($history_cashcard as $data) {

            if ($data->amount == '5000') {
                $real_amount = $real_amount + 5400;
            } else if ($data->amount == '9000') {
                $real_amount = $real_amount + 9800;
            } else if ($data->amount == '15000') {
                $real_amount = $real_amount + 16400;
            } else if ($data->amount == '30000') {
                $real_amount = $real_amount + 33000;
            } else if ($data->amount == '50000') {
                $real_amount = $real_amount + 55200;
            } else if ($data->amount == '100000') {
                $real_amount = $real_amount + 111000;
            }

        }

        return view('user.profile')->with('storys', $storys)->with('real_amount', $real_amount);
    }
}

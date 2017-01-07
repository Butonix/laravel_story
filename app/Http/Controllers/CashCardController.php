<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HistoryCashCard;

class CashCardController extends Controller
{
    public function getTopup() {
        return view('user.topup');
    }

    public function getFormTopup() {
        return view('user.form_topup');
    }

    public function postFormTopup(Request $request) {

        $method="cccdtp";
        $cahscard_no = $request->TM_CODE;
        $datetime = date("Y-m-d/H:i:s");
        $partneruser_id = "56000013";
        $partneruser_password = "hRti4E8";
        $customer_no = "56000013";
        $request = "method=".$method."&cahscard_no=".$cahscard_no."&datetime=".$datetime."&partneruser_id=".$partneruser_id."&partneruser_password=".$partneruser_password."&customer_no=".$customer_no;
        //-------------------connect webservice
        $urlWithoutProtocol = "http://dtopup.com/ServiceByPassProxy/dtpcc?".$request;//---------------- Production Path
        $isRequestHeader = FALSE;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $urlWithoutProtocol);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $productivity = curl_exec($ch);
        curl_close($ch);
        // echo $productivity;

        $result = explode("|", $productivity);

        echo "Transaction Id : " . $result[0] . "<br>";
        echo "Response Code : " . $result[1] . "<br>";
        echo "Response Desc : " . $result[2] . "<br>";
        echo "Cashcard No : " . $result[3] . "<br>";
        echo "Amount : " . $result[4] . "<br>";
        echo "Status : " . $result[5] . "<br>";

        $history_cashcard = new HistoryCashCard;
        $history_cashcard->username = Auth::User()->username;
        $history_cashcard->transaction = strip_tags($result[0]);
        $history_cashcard->response_code = strip_tags($result[1]);
        $history_cashcard->response_desc = strip_tags($result[2]);
        $history_cashcard->cashcard_no = strip_tags($result[3]);
        $history_cashcard->amount = strip_tags($result[4]);
        $history_cashcard->status = strip_tags($result[5]);
        $history_cashcard->save();

        if (strip_tags($result[1]) == 0) {
            return redirect()->route('profile')->with('status_truemoney', 'success');
        } else {
            return redirect()->route('topup/form')->with('status_truemoney', strip_tags($result[1]));
        }

    }
}

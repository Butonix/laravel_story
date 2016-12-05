<?php

/**
 * สำหรับ PHP version 5.2
 * API Payme.in.th Version 1.3
 * @code : Witawat Piyarattanavong
 * @contact : witawat57@gmail.com
 *
 * + add checkSystem online, offline
 */
class Payme52
{
    private $_PAYME = "https://www.payme.in.th/tmapi.php?";
    private $_MERCHANT = "";
    private $_ALLOWIP = array("27.254.144.22"); // หากมี IP อื่นๆสามารถเพิ่มได้

    private function getMERCHANT()
    {
        return $this->_MERCHANT;
    }

    public function setMERCHANT($MERCHANT)
    {
        $this->_MERCHANT = $MERCHANT;
    }

    public function addAllowIP($ip)
    {
        array_push($this->_ALLOWIP, $ip);
    }

    public function sendTruemoney($tmCode, $returnURL, $demo = false, $data='')
    {
        if ($this->checkOffline() == false) return "Error System Offline !!";
        if ($this->getMERCHANT() == '') return "Error merchant is null or empty !!";
        if (empty($tmCode)) return "Error truemoney code is null or empty !!";
        if (empty($returnURL)) return "Error return url is null or empty !!";

        if (!$this->validate_custom("/^[0-9]{14}+$/", $tmCode)) return "Error is not truemoney code !!";
        if (!$this->validate_custom("/^[0-9A-Z]+$/", $this->getMERCHANT())) return "Error is not merchant code !!";

        if(is_array($data)) {
            foreach ($data as $key => $item) {
                $dataVal[] = "$key=$item";
            }
            $send = "&".implode("&",$dataVal);
        }
        $test = $demo == true ? "&mode=TEST" : "";
        $sendURL = $this->_PAYME . "merchant=" . $this->getMERCHANT() . "&password=$tmCode&resp_url={$returnURL}$test$send";

        $ch = @curl_init();
        @curl_setopt($ch, CURLOPT_URL, $sendURL);
        @curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        @curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        @curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        @curl_setopt($ch, CURLOPT_TIMEOUT, 400); //timeout in seconds
        $curl_content = @curl_exec($ch);
        @curl_close($ch);
        if (@curl_errno($ch) == 28 || !$curl_content) return "Error can't connect to payme server !!";
        return strpos($curl_content, 'SUCCEED') !== FALSE ? "OK" : "$curl_content";
    }

    public function statusTruemoney($log = true)
    {
        $_tmAmount = array(
            "1" => "50",
            "2" => "90",
            "3" => "150",
            "4" => "300",
            "5" => "500",
            "6" => "1000",
        );
        
        foreach ($_GET as $key => $item) {
            if ($key != "password" && $key != "msg" && $key != "amount" && $key != "status") {
                $status[$key] = $item;
            }
        }

        if (in_array($_SERVER['REMOTE_ADDR'], $this->_ALLOWIP)) {
            if ($log) file_put_contents("payme-log.txt", date("Y-m-d H:i:s") . " - [ $_SERVER[REMOTE_ADDR] ] staus : {$_GET['status']}, tmCode : {$_GET['password']}, amountCode : {$_GET['amount']}, amountReal : {$_tmAmount[$_GET['amount']]}, msg : " . urldecode($_GET['msg']) . " access..\n", FILE_APPEND);
            $status = array(
                "tmCode" => $_GET['password'],
                "tmMsg" => urldecode($_GET['msg']),
                "tmAmount" => $_GET['amount'],
                "tmRealAmount" => $_tmAmount[$_GET['amount']],
                "tmStatus" => $_GET['status'],
            );
        } else {
            if ($log) file_put_contents("payme-log.txt", date("Y-m-d H:i:s") . " - [ $_SERVER[REMOTE_ADDR] ] not allow ipaddress error access..\n", FILE_APPEND);
            $status['tmStatus'] = "Error ip is not payme server !";
        }
        return $status;
    }

    public function checkOffline()
    {
        $result = @file_get_contents("http://www.payme.in.th/status.php");
        return trim($result);
    }

    public function log($msg)
    {
        file_put_contents("log-topup.txt", date("Y-m-d H:i:s") . " - $msg\n", FILE_APPEND);
    }

    private function validate_custom($pattern, $string)
    {
        return !preg_match($pattern, $string) ? false : true;
    }
}
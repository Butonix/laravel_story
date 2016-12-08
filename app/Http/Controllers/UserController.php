<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

use App\Member;
use App\Category;
use App\Story;
use App\Tag;
use App\GiveLove;
use App\Comment;
use App\Announce;
use App\CashCard;
use App\HistoryCashCard;

use Session;
use File;

class Payme
{
    private static $_PAYME = "https://www.payme.in.th/tmapi.php?";
    private static $_MERCHANT = "";
    private static $_ALLOWIP = array("27.254.144.22"); // หากมี IP อื่นๆสามารถเพิ่มได้

    private static function getMERCHANT()
    {
        return self::$_MERCHANT;
    }

    public static function setMERCHANT($MERCHANT)
    {
        self::$_MERCHANT = $MERCHANT;
    }

    public static function addAllowIP($ip)
    {
        array_push(self::$_ALLOWIP, $ip);
    }

    public static function sendTruemoney($tmCode, $returnURL, $demo = false, $data='')
    {
        if (self::checkOffline() == false) return "Error System Offline !!";
        if (self::getMERCHANT() == '') return "Error merchant is null or empty !!";
        if (empty($tmCode)) return "Error truemoney code is null or empty !!";
        if (empty($returnURL)) return "Error return url is null or empty !!";

        if (!self::validate_custom("/^[0-9]{14}+$/", $tmCode)) return "Error is not truemoney code !!";
        if (!self::validate_custom("/^[0-9A-Z]+$/", self::getMERCHANT())) return "Error is not merchant code !!";

        if(is_array($data)) {
            foreach ($data as $key => $item) {
                $dataVal[] = "$key=$item";
            }
            $send = "&".implode("&",$dataVal);
        }
        $test = $demo == true ? "&mode=TEST" : "";
        $sendURL = self::$_PAYME . "merchant=" . self::getMERCHANT() . "&password=$tmCode&resp_url={$returnURL}$test$send";

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

    public static function statusTruemoney($log = true)
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

        if (in_array($_SERVER['REMOTE_ADDR'], self::$_ALLOWIP)) {
            if ($log) file_put_contents("truemoney/payme-log.txt", date("Y-m-d H:i:s") . " - [ $_SERVER[REMOTE_ADDR] ] staus : {$_GET['status']}, tmCode : {$_GET['password']}, amountCode : {$_GET['amount']}, amountReal : {$_tmAmount[$_GET['amount']]}, msg : " . urldecode($_GET['msg']) . " access..\n", FILE_APPEND);
            $status = array(
                "tmCode" => $_GET['password'],
                "tmMsg" => urldecode($_GET['msg']),
                "tmAmount" => $_GET['amount'],
                "tmRealAmount" => $_tmAmount[$_GET['amount']],
                "tmStatus" => $_GET['status'],
            );
        } else {
            if ($log) file_put_contents("truemoney/payme-log.txt", date("Y-m-d H:i:s") . " - [ $_SERVER[REMOTE_ADDR] ] not allow ipaddress error access..\n", FILE_APPEND);
            $status['tmStatus'] = "Error ip is not payme server !";
        }
        return $status;
    }

    public static function checkOffline()
    {
        $result = @file_get_contents("http://www.payme.in.th/status.php");
        return trim($result);
    }

    public static function log($msg)
    {
        file_put_contents("truemoney/log-topup.txt", date("Y-m-d H:i:s") . " - $msg\n", FILE_APPEND);
    }

    private static function validate_custom($pattern, $string)
    {
        return !preg_match($pattern, $string) ? false : true;
    }
}

class UserController extends Controller
{
    public function index() {
        $storys = new Story;
        $top_visits = $storys::all()->sortByDesc('visit');
        $top_love = $storys::all()->sortByDesc('love');
        $storys = $storys::orderBy('created_at', 'desc')->get();

        $announces = new Announce;
        $announces = $announces::orderBy('created_at', 'desc')->get();

        return view('user.home')
        ->with('storys', $storys)
        ->with('top_visits', $top_visits)
        ->with('announces', $announces);
    }

    public function getCategory($id) {
        $category = new Category;
        $category = $category::where('id', $id)->first();
        $category_name = $category->category_name;

        $storys = new Story;
        $select_category = $storys::where('category_name', $category_name)->get();
        return view('user.category')->with('storys', $select_category)->with('category_name', $category_name);
    }

    public function postRegister(Request $request) {
        $member = new Member;
        $check_username = $member::where('username', $request->username)->count();
        $check_email = $member::where('email', $request->email)->count();

        if ($check_username > 0 && $check_email > 0) {
            return redirect()->back()
            ->with('status_all', 'fail')
            ->withInput($request->except('password'));
        }

        if ($check_username > 0) {
            return redirect()->back()
            ->with('status_username', 'fail')
            ->withInput($request->except('password'));
        }

        if ($check_email > 0) {
            return redirect()->back()
            ->with('status_email', 'fail')
            ->withInput($request->except('password'));
        }

        $member->username = $request->username;
        $member->email = $request->email;
        $member->password = Hash::make($request->password);
        $member->save();
        return redirect()->back()
        ->with('status_success', 'done');
    }

    public function postLogin(Request $request) {

        if (Auth::attempt(['email' => $request->login_email, 'password' => $request->password])) {
            return redirect()->back();
        } else {
            return redirect()->back()->withInput($request->except('password'))->with('status_login', 'fail');
        }
    }

    public function logout() {
        Auth::logout();
        Session::flush();
        return redirect()->route('index');
    }

    public function getProfile() {
        $storys = new Story;
        $storys = $storys::where('username', Auth::User()->username)->get();

        $history_cashcard = new HistoryCashCard;
        $history_cashcard = $history_cashcard::where('username', Auth::User()->username)->where('response_code', 0)->get();
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

    public function getReadStory($id) {

        if (!Auth::check()) {
            return redirect()->back()->with('status_permission', 'fail');
        }

        $storys = new Story;
        $storys = $storys::where('id', $id)->first();

        // Update visit to story
        $current_visit = $storys->visit;
        $storys->visit = ++$current_visit;
        $storys->save();

        // Read comment
        $comments = new Comment;
        $comments = $comments::where('story_id', $id)->orderBy('created_at', 'desc')->get();

        return view('user.read_story')
        ->with('story', $storys)
        ->with('comments', $comments);
    }

    public function getReadStoryDetail() {
        return view('user.story_detail');
    }

    public function getWriteStory() {
        return view('user.write_story');
    }

    public function postWriteStory(Request $request) {
        $story = new Story;
        $story->username = Auth::User()->username;
        $story->story_name = $request->story_name;
        $story->story_author = $request->story_author;
        $story->category_name = $request->category_name;
        $story->story_outline = $request->story_outline;

        $file = array('upload_picture' => Input::file('upload_picture'));
        if ($request->file('upload_picture') != '') {
            $destinationPath = 'uploads/images/storys';
            $extension = Input::file('upload_picture')->getClientOriginalExtension();
            $filename = rand(111111111,999999999).'.'.$extension;
            Input::file('upload_picture')->move($destinationPath, $filename);
            $story->story_picture = $filename;
        }

        $story->state_comment = $request->state_comment;
        $story->state_public = $request->state_public;
        $story->visit = 0;
        $story->love = 0;
        $story->save();

        $getStoryId = $story::where('story_name', $request->story_name)->first();
        $getStoryId = $getStoryId->id;

        $tag = new Tag;
        $tag->story_id = $getStoryId;

        if ($request->tag1 != null) {
            $tag->tag1 = $request->tag1;
        }
        if ($request->tag2 != null) {
            $tag->tag2 = $request->tag2;
        }
        if ($request->tag3 != null) {
            $tag->tag3 = $request->tag3;
        }
        if ($request->tag4 != null) {
            $tag->tag4 = $request->tag4;
        }
        if ($request->tag5 != null) {
            $tag->tag5 = $request->tag5;
        }
        $tag->save();

        return redirect()->route('profile');
    }

    public function getWriteStorySub() {
        return view('user.write_sub_story');
    }

    public function getLoveStory($id) {
        $story = new Story;
        $story = $story::where('id', $id)->first();
        $current_love = $story->love;
        $story->love = ++$current_love;
        $story->save();

        $give_love = new GiveLove;
        $give_love->story_id = $id;
        $give_love->username = Auth::User()->username;
        $give_love->status = 1;
        $give_love->save();
        return redirect()->back();
    }

    public function postSearch(Request $request) {
        $storys = new Story;
        $search_author = $storys::where('story_author', $request->txt_search)->get();

        if (count($search_author) > 0) {
            return view('user.search')
            ->with('txt_search', $request->txt_search)
            ->with('storys', $search_author);
        } else {

            $search_story_name = $storys::where('story_name', $request->txt_search)->get();

            if (count($search_story_name) > 0) {
                return view('user.search')
                ->with('txt_search', $request->txt_search)
                ->with('storys', $search_story_name);
            } else {
                return redirect()->back()->with('status_search', 'fail');
            }

        }

    }

    public function postStoryComment(Request $request) {
        $comment = New Comment;
        $comment->story_id = $request->story_id;
        $comment->story_name = $request->story_name;
        $comment->username = $request->username;
        $comment->comment_detail = $request->comment;
        $comment->save();
        return redirect()->back();
    }

    public function getCreateAnnounce() {
        return view('user.create_announce');
    }

    public function postCreateAnnounce(Request $request) {
        $announce = new Announce;
        $announce->username = Auth::User()->username;
        $announce->announce_title = $request->announce_title;
        $announce->announce_detail = $request->announce_detail;
        $announce->state_comment = $request->state_comment;
        $announce->save();
        return redirect()->route('index');
    }

    public function getReadAnnounce($id) {
        $announce = new Announce;
        $announce = $announce::where('id', $id)->first();
        return view('user.read_announce')->with('announce', $announce);
    }

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

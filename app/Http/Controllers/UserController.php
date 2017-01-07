<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

use App\Member;
use App\Story;
use App\Announce;
use App\CashCard;
use App\HistoryCashCard;
use App\Contact;
use App\ReportVisit;

use Session;
use File;

class UserController extends Controller
{
    public function index(Request $request) {
        $storys = new Story;
        $top_visits = $storys::all()->sortByDesc('visit');
        $top_love = $storys::all()->sortByDesc('love');
        $storys = $storys::orderBy('created_at', 'desc')->get();

        $announces = new Announce;
        $announces = $announces::orderBy('created_at', 'desc')->get();

        // save ip address to report
        $report_visit = new ReportVisit;
        $check_ip = $report_visit::where('ip_address', $request->ip())->first();
        if (count($check_ip) <= 0) {
          $report_visit->ip_address = $request->ip();
          $report_visit->save();
        }

        return view('user.home')
        ->with('storys', $storys)
        ->with('top_visits', $top_visits)
        ->with('announces', $announces);
    }

    public function getHowToWriting() {
        return view('user.how_to_writing');
    }

    public function getHowToRegister() {
        return view('user.how_to_register');
    }

    public function getHowToSupport() {
        return view('user.how_to_support');
    }

    public function getContact() {
        $contact = new Contact;
        $check_detail = $contact::find(1);
        if (count($check_detail) == 0) {
            $contact->detail = '';
            $contact->save();
        } else {
            $contact = $contact::find(1)->first();
        }
        return view('user.contact')->with('contact', $contact);
    }

}

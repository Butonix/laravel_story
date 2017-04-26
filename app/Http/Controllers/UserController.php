<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Member;
use App\Story;
use App\StoryStatistic;
use App\Announce;
use App\Contact;
use App\ReportVisitor;
use App\HowToWriting;
use App\HowToRegister;
use App\HowToSupport;
use Session;
use File;
use App\Mail\SupportMail;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $top_visitors = StoryStatistic::all()->sortByDesc('count_visitor');
//        $top_love = $storys::all()->sortByDesc('love');

        $storys = Story::orderBy('created_at', 'desc')->get();

        $announces = new Announce;
        $announces = $announces::orderBy('created_at', 'desc')->get();

        // save ip address to report
        $report_visit = new ReportVisitor;
        $check_ip = $report_visit::where('ip_address', $request->ip())->first();
        if (count($check_ip) <= 0) {
            $report_visit->ip_address = $request->ip();
            $report_visit->save();
        }

        return view('user.home')
            ->with('storys', $storys)
            ->with('top_visitors', $top_visitors)
            ->with('announces', $announces);
    }

    public function getHowToWriting()
    {
        $check_field = HowToWriting::find(1);
        if (!$check_field) {
            $create_field = new HowToWriting;
            $create_field->save();
        }
        $how_to_writing = HowToWriting::find(1);
        return view('user.how_to_writing')
            ->with('how_to_writing', $how_to_writing);
    }

    public function getHowToRegister()
    {
        $check_field = HowToRegister::find(1);
        if (!$check_field) {
            $create_field = new HowToRegister;
            $create_field->save();
        }
        $how_to_register = HowToRegister::find(1);
        return view('user.how_to_register')
            ->with('how_to_register', $how_to_register);
    }

    public function getHowToSupport()
    {
        $check_field = HowToSupport::find(1);
        if (!$check_field) {
            $create_field = new HowToSupport;
            $create_field->save();
        }
        $how_to_support = HowToSupport::find(1);
        return view('user.how_to_support')
            ->with('how_to_support', $how_to_support);
    }

    public function getContact()
    {
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

    public function getForgotPassword()
    {
        return view('user.forgot_password');
    }

    public function postForgotPassword(Request $request)
    {
        $member = Member::where('email', $request->email)->first();
        if ($member) {
            $member = Member::where('email', $request->email)->first();
            $decrypt = decrypt($member->text_password);
            Mail::to($request->email)->send(new SupportMail($decrypt));
            return redirect()->back()->with('status', 'success');
        } else {
            return redirect()->back()->with('status', 'error');
        }
    }

}

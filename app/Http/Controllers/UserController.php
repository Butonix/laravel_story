<?php

namespace App\Http\Controllers;

use App\HowToUnlockStory;
use App\Http\Requests\RegisterWriter;
use App\PermissionMember;
use Illuminate\Http\Request;

use App\Member;
use App\Story;
use App\StoryStatistic;
use App\Announce;
use App\Contact;
use App\ReportVisitor;
use App\AboutUs;
use App\HowToUseDiamond;
use App\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use File;
use Socialite;
use Session;
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

    public function getAboutUs()
    {
        $check_field = \App\AboutUs::find(1);
        if (!$check_field) {
            $create_field = new AboutUs;
            $create_field->detail = '';
            $create_field->save();
        }

        $about_us = \App\AboutUs::find(1);
        return view('user.about_us')
            ->with('about_us', $about_us);
    }

    public function getHowToUseDiamond()
    {
        $check_field = \App\HowToUseDiamond::find(1);
        if (!$check_field) {
            $create_field = new HowToUseDiamond;
            $create_field->detail = '';
            $create_field->save();
        }
        $how_to_diamond = \App\HowToUseDiamond::find(1);
        return view('user.how_to_diamond')
            ->with('how_to_diamond', $how_to_diamond);
    }

    public function getRules()
    {
        $check_field = \App\Rules::find(1);
        if (!$check_field) {
            $create_field = new Rules;
            $create_field->detail = '';
            $create_field->save();
        }
        $rules = \App\Rules::find(1);
        return view('user.rules')
            ->with('rules', $rules);
    }

    public function getHowToUnlockStory()
    {
        $check_field = \App\HowToUnlockStory::find(1);
        if (!$check_field) {
            $create_field = new HowToUnlockStory;
            $create_field->detail = '';
            $create_field->save();
        }
        $HowToUnlockStory = \App\HowToUnlockStory::find(1);
        return view('user.how_to_unlock_story')
            ->with('HowToUnlockStory', $HowToUnlockStory);
    }

    public function getContact()
    {
        $check_detail = \App\Contact::find(1);
        $contact = '';
        if ($check_detail) {
            $contact = $check_detail->contact_detail;
        }
        return view('user.contact')
            ->with('contact', $contact);
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

    public function getRegisterWriter(Request $request)
    {
        $checkRegister = \App\RegisterWriter::find($request->user()->id);
        if ($checkRegister) {
            if ($checkRegister->reject_status == 0) {
                if ($checkRegister->confirm_status == 0) {
                    return view('user.RegisterWaitingConfirm');
                } else {
                    return view('user.RegisterWriterConfirm');
                }
            } else {
                $checkRegister->delete();
                return view('user.RegisterWriterReject');
            }
        } else {
            return view('user.register_writer');
        }
    }

    public function postRegisterWriter(RegisterWriter $request)
    {
        $register = new \App\RegisterWriter;
        $register->member_id = $request->user()->id;
        $register->full_name = $request->full_name;
        $register->id_card = $request->id_card;
        $register->address = $request->address;
        $register->tel = $request->tel;
        $register->bank_name = $request->bank_name;
        $register->bank_sub_branch = $request->bank_sub_branch;
        $register->bank_account_number = $request->bank_account_number;
        $register->bank_account_name = $request->bank_account_name;

        /* Book Bank File */
        $file = $request->file('book_bank_file');
        $filenameBookBank = $request->user()->id;
        $pathBookBank = "uploads/book_bank_files";
        if (!File::exists($pathBookBank)) {
            File::makeDirectory($pathBookBank, 0755);
        }
        $pathBookBank = "uploads/book_bank_files/" . $filenameBookBank;
        Image::make($file->getRealPath())->orientate()->save($pathBookBank);

        /* ID Card File */
        $file = $request->file('id_card_file');
        $filenameIdCard = $request->user()->id;
        $pathIdCard = "uploads/id_card_files";
        if (!File::exists($pathIdCard)) {
            File::makeDirectory($pathIdCard, 0755);
        }
        $pathIdCard = "uploads/id_card_files/" . $filenameIdCard;
        Image::make($file->getRealPath())->orientate()->save($pathIdCard);

        $register->book_bank_file = $filenameBookBank;
        $register->id_card_file = $filenameIdCard;
        $register->confirm_status = 0;
        $register->reject_status = 0;
        $register->save();

        return redirect()
            ->route('profile')
            ->with('status', 'confirm_register_writer');

    }

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback(Request $request)
    {
        $user = Socialite::driver('facebook')->fields(['id', 'email', 'name', 'first_name', 'last_name'])->user();

        $check_facebook_login = \App\Member::where('email', $user->email)
            ->first();

        if (!$check_facebook_login) {
            $member = new Member;
            $member->username = $user->user['first_name'];

            if ($user->email == null) {
                $member->email = $user->id;
            } else {
                $member->email = $user->email;
            }

            $member->facebook_id = $user->id;
            $member->password = Hash::make($user->id);
            $member->save();

            $permission = new PermissionMember;
            $permission->member_id = $member->id;
            $permission->ban_status = 0;
            $permission->save();
        } else {
            if ($check_facebook_login->facebook_id == NULL) {
                return redirect('/')
                    ->with('status', 'พบอีเมล Facebook ลงทะเบียนแล้ว กรุณาลงทะเบียนใหม่');
            }
        }

        if ($user->email == null) {
            if (Auth::attempt(['email' => $user->id, 'password' => $user->id], true)) {
                return redirect('/');
            }
        } else {
            if (Auth::attempt(['email' => $user->email, 'password' => $user->id], true)) {
                return redirect('/');
            }
        }

    }

}

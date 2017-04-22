<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\FacebookLogin;
use Session;
use Hash;

class MemberController extends Controller
{
    public function getAllMember()
    {
        Session::put('active_menu', 'member');
        $members = new Member;
        return view('admin.member.member')->with('members', $members->get());
    }

    public function getAllFacebook()
    {
        Session::put('active_menu', 'member');
        $facebook = new FacebookLogin;
        return view('admin.member.facebook')->with('facebooks', $facebook->get());
    }

    public function getAddMember()
    {
        return view('admin.member.add_member');
    }

    public function postAddMember(Request $request)
    {
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
        return redirect()->route('member/all')
            ->with('status_register', 'done');
    }

    public function getEditMember($member_id)
    {
        $member = new Member;
        $info = $member::find($member_id);
        return view('admin.member.edit_member')->with('info', $info);
    }

    public function postEditMember(Request $request)
    {
        $member = new Member;

        // check data change
        $data = $member::where('id', $request->id)->first();

        if ($data->username == $request->username) {
            $check_username = 0;
        } else {
            $check_username = $member::where('username', $request->username)->count();
        }

        if ($data->email == $request->email) {
            $check_email = 0;
        } else {
            $check_email = $member::where('email', $request->email)->count();
        }

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

        if ($request->password != null) {
            // if (Hash::check('plain-text', $request->token)) {
            $new_password = Hash::make($request->password);
            $member::where('id', $request->id)->update([
                'username' => $request->username,
                'email' => $request->email,
                'password' => $new_password
            ]);
            // }
        } else {
            $member::where('id', $request->id)->update([
                'username' => $request->username,
                'email' => $request->email
            ]);
        }

        return redirect()->route('member/all')
            ->with('status_edit', 'done');
    }

    public function getDeleteMember(Request $request)
    {
        $member = new Member;
        $member::where('id', $request->member_id)->delete();
        return redirect()->back()->with('status_delete', 'done');
    }
}

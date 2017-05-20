<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateMember;
use Illuminate\Http\Request;
use App\Member;
use App\FacebookLogin;
use App\PermissionMember;
use Session;
use Hash;

class MemberController extends Controller
{
    public function getAllMember(Member $member)
    {
        Session::put('active_menu', 'member');
        $members = $member::all();
        return view('admin.member.member', compact('members'));
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

    public function postAddMember(UpdateMember $request, Member $member)
    {
        $member->insertMember($request);
        return redirect()->route('member/all');
    }

    public function getEditMember($member_id)
    {
        $member = new Member;
        $info = $member::find($member_id);
        return view('admin.member.edit_member')->with('info', $info);
    }

    public function postEditMember(UpdateMember $request, Member $member, $id)
    {
        $member->updateMember($request, $id);
        return redirect()->back();
    }

    public function getDeleteMember(Request $request)
    {
        $member = new Member;
        $member::where('id', $request->member_id)->delete();
        return redirect()->back()->with('status_delete', 'done');
    }

    public function BanMember(PermissionMember $permission, $id)
    {
        $permission->banMember($id);
    }

    public function UnbanMember(PermissionMember $permission, $id)
    {
        $permission->unBanMember($id);
    }
}

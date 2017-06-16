<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateMember;
use Illuminate\Http\Request;
use App\Member;
use App\Bonus;
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

    public function getAllMemberSort()
    {
        Session::put('active_menu', 'member');
        $members = Member::all();
        return view('admin.member.sort', compact('members'));
    }

    public function getAddMember()
    {
        Session::put('active_menu', 'member');
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

    public function BanMember(Request $request)
    {
        Member::where('id', $request->id)->update([
            'status_ban' => 1
        ]);
    }

    public function UnbanMember(Request $request)
    {
        Member::where('id', $request->id)->update([
            'status_ban' => 0
        ]);
    }

    public function Bonus() {
        Session::put('active_menu', 'member');
        $members = Member::all();
        return view('admin.member.bonus', compact('members'));
    }

    public function postBonus(Request $request) {
        Bonus::create([
            'member_id' => $request->id,
            'money' => $request->bonus
        ]);
        return redirect()->back()->with('status', 'success');
    }
}

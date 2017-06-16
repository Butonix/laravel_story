<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use App\Announce;
use Illuminate\Support\Facades\Auth;

class AnnounceController extends Controller
{
    public function getCreateAnnounce()
    {
        return view('user.create_announce');
    }

    public function postCreateAnnounce(Request $request)
    {
        $announce = new Announce;
        $announce->member_id = Auth::User()->id;
        $announce->announce_title = $request->announce_title;
        $announce->announce_detail = $request->announce_detail;
        $announce->status_comment = $request->status_comment;
        $announce->save();
        return redirect()->route('index');
    }

    public function getReadAnnounce($id)
    {
        $announce = new Announce;
        $announce = $announce::where('id', $id)->first();
        $member = Member::find($announce->member_id);
        return view('user.read_announce', compact('announce', 'member'));
    }
}

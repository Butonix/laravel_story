<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announce;

class AnnounceController extends Controller
{
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
}

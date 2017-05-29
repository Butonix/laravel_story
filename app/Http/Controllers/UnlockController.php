<?php

namespace App\Http\Controllers;

use App\MemberMoney;
use App\PermissionSubStory;
use App\Story;
use App\SubStory;
use App\UnlockSubStory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UnlockController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $subStory = SubStory::find($id);
        $story = Story::find($subStory->story_id);
        $permission = PermissionSubStory::find($id);
        return view('user.unlock_confirm', compact('story', 'subStory', 'permission'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $memberMoney = new MemberMoney;
        if ($memberMoney->payCash(Auth::user()->id, $request->cash)) {
            UnlockSubStory::create([
               'member_id' => Auth::user()->id,
                'sub_story_id' => $id
            ]);
            return 'Update Success';
        } else {
            return 'Error';
        }
    }

    public function destroy($id)
    {
        //
    }

    public function getHistoryUnlock()
    {
        $historyUnlock = UnlockSubStory::where('member_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')->get();
        return view('user.history_unlock', compact('historyUnlock'));
    }
}

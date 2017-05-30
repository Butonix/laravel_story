<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdate;
use App\Http\Requests\ProfileUpdateByFacebook;
use App\PermissionSubStory;
use App\SubStory;
use App\UnlockSubStory;
use Illuminate\Http\Request;
use Auth;
use App\HistoryCashCard;
use App\Story;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function getProfile()
    {
        // Result Cash
        $total_coin = 0;
        $total_love = 0;
        $storys = Story::where('member_id', Auth::user()->id)->get();

        foreach ($storys as $story) {
            $sub_storys = SubStory::where('story_id', $story->id)->get();
            foreach ($sub_storys as $sub_story) {
                $permission = PermissionSubStory::find($sub_story->id);
                if ($permission->unlock_coin > 0 && $permission->unlock_diamond > 0) {
                    $coin_start = $permission->unlock_coin;
                    $diamond_start = $permission->unlock_diamond;
                    $unlockSubStory = UnlockSubStory::where('sub_story_id', $permission->sub_story_id)->get();
                    if (count($unlockSubStory) > 0) {
                        foreach ($unlockSubStory as $item) {
                            $total_coin = $total_coin + $coin_start;
                        }
                    }
                }
            }
            // Get count love story
            $storyStatistic = \App\StoryStatistic::find($story->id);
            $total_love = $total_love + $storyStatistic->count_like;
        }

        return view('user.profile', compact('storys', 'total_coin', 'total_love'));
    }

    public function getProfileAuthor(Request $request)
    {
        $storys = Story::where('story_author', $request->author)->get();

        $history_cashcard = new HistoryCashCard;

        if (Auth::check()) {
            $history_cashcard = $history_cashcard::where('username', $request->author)->where('response_code', 0)->get();
        }

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

        return view('user.profile_author')
            ->with('author', $request->author)
            ->with('storys', $storys)
            ->with('real_amount', $real_amount);
    }

    public function getProfileUpdate(Request $request)
    {
        $profile = \App\Member::where('username', $request->user()->username)
            ->first();
        return view('user.profile_update')
            ->with('profile', $profile);
    }

    public function postProfileUpdate(ProfileUpdate $request)
    {
        $member = \App\Member::find($request->user()->id);
        $member->author = $request->author;
        $member->email = $request->email;
        $member->password = \Hash::make($request->password);
        $member->text_password = Hash('md5', $request->password);
        $member->save();

        $file = $request->file('profile_image');
        if ($file) {
            $filename = $request->user()->id;
            $path = "uploads/profile_images/" . $filename;
            Image::make($file->getRealPath())
                ->resize(100, 100)
                ->orientate()
                ->save($path);
        }

        return redirect()->route('profile');
    }

    public function postProfileUpdateByFacebook(ProfileUpdateByFacebook $request)
    {
        $member = \App\Member::find($request->user()->id);
        $member->author = $request->author;
        $member->save();

        $file = $request->file('profile_image');
        if ($file) {
            $filename = $request->user()->id;
            $path = "uploads/profile_images/" . $filename;
            Image::make($file->getRealPath())
                ->resize(100, 100)
                ->orientate()
                ->save($path);
        }

        return redirect()->route('profile');
    }

}

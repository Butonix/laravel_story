<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdate;
use App\Http\Requests\ProfileUpdateByFacebook;
use App\Member;
use App\MemberMoney;
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
            $sub_storys = SubStory::where('story_id', $story->id)->where('unlock_coin', '>=', 200)->get();
            foreach ($sub_storys as $sub_story) {
                    $unlockSubStory = UnlockSubStory::where('sub_story_id', $sub_story->id)->get();
                    if (count($unlockSubStory) > 0) {
                        foreach ($unlockSubStory as $item) {
                            $total_coin = $total_coin + $sub_story->unlock_coin;
                        }
                    }
            }
            $total_love = $total_love + $story->count_like;
        }

        // Convert coin to thai bath
        $thai_bath = $total_coin / 300;
        return view('user.profile', compact('storys', 'total_coin', 'total_love', 'thai_bath'));
    }

    public function getProfileAuthor(Request $request)
    {
//        $storys = Story::where('story_author', $request->author)->get();
        $member = Member::where('author', $request->author)->first();
        $wallet = MemberMoney::where('id', $member->id)->first();

        // Get total_coin and total_love
        $total_coin = 0;
        $total_love = 0;
        $storys = Story::where('member_id', $member->id)->get();
        foreach ($storys as $story) {
            $sub_storys = SubStory::where('story_id', $story->id)->where('unlock_coin', '>=', 200)->get();
            foreach ($sub_storys as $sub_story) {
                $unlockSubStory = UnlockSubStory::where('sub_story_id', $sub_story->id)->get();
                if (count($unlockSubStory) > 0) {
                    foreach ($unlockSubStory as $item) {
                        $total_coin = $total_coin + $sub_story->unlock_coin;
                    }
                }
            }
            $total_love = $total_love + $story->count_like;
        }
        // Convert coin to thai bath
        $thai_bath = $total_coin / 300;

        return view('user.profile_author')
            ->with('author', $request->author)
            ->with('storys', $storys)
            ->with('wallet', $wallet)
            ->with('thai_bath', $thai_bath)
            ->with('total_love', $total_love);
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

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdate;
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


        if (Auth::check()) {
            $storys = \App\Story::where('username', Auth::User()->username)->get();
        } else {
            if (Session::get('facebook_login') != '') {
                $storys = \App\Story::where('username', Session::get('facebook_login'))->get();
            }
        }

        if (Auth::check()) {
            $history_cashcard = \App\HistoryCashCard::where('username', Auth::User()->username)
                ->where('response_code', 0)
                ->get();
        } else {
            if (Session::get('facebook_login') != '') {
                $history_cashcard = \App\HistoryCashCard::where('username', Session::get('facebook_login'))
                    ->where('response_code', 0)
                    ->get();
            }
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

        return view('user.profile')
            ->with('storys', $storys)
            ->with('real_amount', $real_amount);

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
}

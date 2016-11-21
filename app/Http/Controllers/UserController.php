<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use App\Member;
use App\Category;
use App\Story;
use App\Tag;
use App\GiveLove;
use Session;

class UserController extends Controller
{
    public function index() {
        $storys = new Story;
        $top_visits = $storys::all()->sortByDesc('visit');
        $top_love = $storys::all()->sortByDesc('love');
        $storys = $storys::orderBy('created_at', 'desc')->get();

        return view('user.home')
        ->with('storys', $storys)
        ->with('top_visits', $top_visits);
    }

    public function getCategory($id) {
        $category = new Category;
        $category = $category::where('id', $id)->first();
        return view('user.category')->with('category_name', $category->category_name);
    }

    public function postRegister(Request $request) {
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
        return redirect()->back()
        ->with('status_success', 'done');
    }

    public function postLogin(Request $request) {

        if (Auth::attempt(['email' => $request->login_email, 'password' => $request->password])) {
            return redirect()->back();
        } else {
            return redirect()->back()->withInput($request->except('password'))->with('status_login', 'fail');
        }
    }

    public function logout() {
        Auth::logout();
        Session::flush();
        return redirect()->route('index');
    }

    public function getProfile() {
        $storys = new Story;
        $storys = $storys::where('username', Auth::User()->username)->get();
        return view('user.profile')->with('storys', $storys);
    }

    public function getReadStory($id) {
        $storys = new Story;
        $storys = $storys::where('id', $id)->first();

        // Update visit to story
        $current_visit = $storys->visit;
        $storys->visit = ++$current_visit;
        $storys->save();

        return view('user.read_story')->with('story', $storys);
    }

    public function getReadStoryDetail() {
        return view('user.story_detail');
    }

    public function getWriteStory() {
        return view('user.write_story');
    }

    public function postWriteStory(Request $request) {
        $story = new Story;
        $story->username = Auth::User()->username;
        $story->story_name = $request->story_name;
        $story->story_author = $request->story_author;
        $story->category_name = $request->category_name;
        $story->story_outline = $request->story_outline;

        $file = array('upload_picture' => Input::file('upload_picture'));
        if ($request->file('upload_picture') != '') {
            $destinationPath = 'uploads/images/storys';
            $extension = Input::file('upload_picture')->getClientOriginalExtension();
            $filename = rand(111111111,999999999).'.'.$extension;
            Input::file('upload_picture')->move($destinationPath, $filename);
            $story->story_picture = $filename;
        }

        $story->state_comment = $request->state_comment;
        $story->state_public = $request->state_public;
        $story->visit = 0;
        $story->love = 0;
        $story->save();

        $getStoryId = $story::where('story_name', $request->story_name)->first();
        $getStoryId = $getStoryId->id;

        $tag = new Tag;
        $tag->story_id = $getStoryId;

        if ($request->tag1 != null) {
            $tag->tag1 = $request->tag1;
        }
        if ($request->tag2 != null) {
            $tag->tag2 = $request->tag2;
        }
        if ($request->tag3 != null) {
            $tag->tag3 = $request->tag3;
        }
        if ($request->tag4 != null) {
            $tag->tag4 = $request->tag4;
        }
        if ($request->tag5 != null) {
            $tag->tag5 = $request->tag5;
        }
        $tag->save();

        return redirect()->route('profile');
    }

    public function getWriteStorySub() {
        return view('user.write_sub_story');
    }

    public function getLoveStory($id) {
        $story = new Story;
        $story = $story::where('id', $id)->first();
        $current_love = $story->love;
        $story->love = ++$current_love;
        $story->save();

        $give_love = new GiveLove;
        $give_love->story_id = $id;
        $give_love->username = Auth::User()->username;
        $give_love->status = 1;
        $give_love->save();
        return redirect()->back();
    }
}

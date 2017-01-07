<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Story;
use App\Tag;
use App\Comment;

class StoryController extends Controller
{
    public function getReadStory($id) {

        // if (!Auth::check()) {
        //     return redirect()->back()->with('status_permission', 'fail');
        // }

        $storys = new Story;
        $storys = $storys::where('id', $id)->first();

        // Update visit to story
        $current_visit = $storys->visit;
        $storys->visit = ++$current_visit;
        $storys->save();

        // Read comment
        $comments = new Comment;
        $comments = $comments::where('story_id', $id)->orderBy('created_at', 'desc')->get();

        return view('user.read_story')
            ->with('story', $storys)
            ->with('comments', $comments);
    }

    public function getReadStoryDetail() {
        return view('user.story_detail');
    }

    public function getWriteStory() {
        return view('user.write_story');
    }

    public function postWriteStory(Request $request) {
        $story = new Story;

        if (Auth::check()) {
            $story->username = Auth::User()->username;
        } else {
            if (Session::get('facebook_login') != '') {
                $story->username = Session::get('facebook_login');
            }
        }

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

    public function postStoryComment(Request $request) {
        $comment = New Comment;
        $comment->story_id = $request->story_id;
        $comment->story_name = $request->story_name;
        $comment->username = $request->username;
        $comment->comment_detail = $request->comment;
        $comment->save();
        return redirect()->back();
    }
}

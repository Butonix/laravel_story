<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Story;
use App\Tag;
use App\StoryComment;
use App\PermissionStory;
use App\BanStory;
use App\StoryVisitor;
use Session;
use Illuminate\Support\Facades\Input;

class StoryController extends Controller
{
    public function getReadStory(Request $request) {
        // Select story
        $story = Story::find($request->id);
        // Get category name
        $category_name = Category::find($story->category_id);
        $category_name = $category_name->category_name;
        // Update visit to story
        $story_visitor = StoryVisitor::find($request->id);
        $visitor_count = $story_visitor->count;
        $story_visitor->count = ++$visitor_count;
        $story_visitor->save();
        // Read comment
        $story_comments = StoryComment::where('story_id', $request->id)->orderBy('created_at', 'desc')->get();
        return view('user.read_story')
            ->with('story', $story)
            ->with('category_name', $category_name)
            ->with('visitor_count', $visitor_count)
            ->with('story_comments', $story_comments);
    }

    public function getReadStoryDetail() {
        return view('user.story_detail');
    }

    public function getWriteStory() {
        return view('user.write_story');
    }

    public function postWriteStory(Request $request) {

        // Check Story Name
        $check_story_name = Story::where('story_name', $request->story_name)->first();
        if ($check_story_name) {
            return redirect()->back()
                ->with('status', 'Story name not available.');
        }

        $story = new Story;

        if (Auth::check()) {
            $story->username = Auth::User()->username;
        } else {
            if (Session::get('facebook_login') != '') {
                $story->username = Session::get('facebook_login');
            }
        }

        $story->category_id = $request->category_id;
        $story->story_name = $request->story_name;
        $story->story_author = $request->story_author;
        $story->story_outline = $request->story_outline;

        $file = array('upload_picture' => Input::file('upload_picture'));
        if ($request->file('upload_picture') != '') {
            $destinationPath = 'uploads/images/storys';
            $extension = Input::file('upload_picture')->getClientOriginalExtension();
            $filename = rand(111111111,999999999).'.'.$extension;
            Input::file('upload_picture')->move($destinationPath, $filename);
            $story->story_picture = $filename;
        }

        $story->save();

        $permission_story = new PermissionStory;
        $permission_story->story_id = $story->id;
        $permission_story->status_comment = $request->status_comment;
        $permission_story->status_public = $request->status_public;
        $permission_story->save();

        $story_visitor = new StoryVisitor;
        $story_visitor->story_id = $story->id;
        $story_visitor->count = 0;
        $story_visitor->save();

        $tag = new Tag;
        $tag->story_id = $story->id;

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

        $ban_story = new BanStory;
        $ban_story->story_id = $story->id;
        $ban_story->status_ban = 0;
        $ban_story->save();

        return redirect()->route('profile');
    }

    public function getWriteSubStory() {
        return view('user.write_sub_story');
    }

    public function getLoveStory($id) {
//        $story = new Story;
//        $story = $story::where('id', $id)->first();
//        $current_love = $story->love;
//        $story->love = ++$current_love;
//        $story->save();

//        $give_love = new GiveLove;
//        $give_love->story_id = $id;
//        $give_love->username = Auth::User()->username;
//        $give_love->status = 1;
//        $give_love->save();
        return redirect()->back();
    }

    public function postStoryComment(Request $request) {
        $comment = New StoryComment;
        $comment->story_id = $request->story_id;
        $comment->story_name = $request->story_name;
        $comment->username = $request->username;
        $comment->comment_detail = $request->comment;
        $comment->save();
        return redirect()->back();
    }
}

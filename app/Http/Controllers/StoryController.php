<?php

namespace App\Http\Controllers;

use App\BanSubStory;
use App\PermissionSubStory;
use App\SubStoryStatistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Story;
use App\SubStory;
use App\Tag;
use App\StoryComment;
use App\SubStoryComment;
use App\PermissionStory;
use App\BanStory;
use App\StoryStatistic;
use App\ReplyCommentStory;
use App\ReplyCommentSubStory;
use Intervention\Image\Facades\Image;
use File;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

class StoryController extends Controller
{
    public function getReadStory(Request $request)
    {
        // Select story
        $story = Story::find($request->id);
        // Get category name
        $category = Category::find($story->category_id);
        $category_name = $category->category_name;
        $status_alert = $category->status_alert;

        // Update visit to story
        $story_statistic = StoryStatistic::find($request->id);
        $visitor_count = $story_statistic->count_visitor;
        $story_statistic->count_visitor = ++$visitor_count;
        $story_statistic->save();
        // Read comment
        $story_comments = StoryComment::where('story_id', $request->id)->orderBy('created_at', 'desc')->get();

        // Sub Story
        $sub_storys = SubStory::where('story_id', $request->id)->get();

        // Check Ban
        $status_ban = BanStory::where('story_id', $request->id)->first();
        $status_ban = $status_ban->status_ban;
        // End Check Ban

        $permission_story = PermissionStory::where('story_id', $request->id)->first();

        return view('user.read_story')
            ->with('id', $request->id)
            ->with('story', $story)
            ->with('category_name', $category_name)
            ->with('status_alert', $status_alert)
            ->with('visitor_count', $visitor_count)
            ->with('story_comments', $story_comments)
            ->with('sub_storys', $sub_storys)
            ->with('status_ban', $status_ban)
            ->with('permission_story', $permission_story);
    }

    public function getReadStoryDetail(Request $request)
    {
        $sub_story = SubStory::find($request->id);
        $story = Story::find($sub_story->story_id);
        $author = $story->story_author;
        $category = Category::find($story->category_id);

        $SubStoryStatistic = SubStoryStatistic::where('sub_story_id', $request->id)->first();
        $SubStoryStatistic->count_visitor = ++$SubStoryStatistic->count_visitor;
        $SubStoryStatistic->save();
        $comment = ReplyCommentStory::find($sub_story->id);
        $updated_at = Carbon::parse($sub_story->updated_at)->addYears(543)->format('d / m / Y');

        $sub_story_comments = SubStoryComment::where('sub_story_id', $request->id)->orderBy('created_at', 'desc')->get();

        // Check Ban
        $status_ban = BanSubStory::where('sub_story_id', $request->id)->first();
        $status_ban = $status_ban->status_ban;
        // End Check Ban

        return view('user.story_detail')
            ->with('sub_story_id', $request->id)
            ->with('story', $story)
            ->with('sub_story', $sub_story)
            ->with('author', $author)
            ->with('category', $category->category_name)
            ->with('SubStoryStatistic', $SubStoryStatistic)
            ->with('comment', count($comment))
            ->with('updated_at', $updated_at)
            ->with('sub_story_comments', $sub_story_comments)
            ->with('status_ban', $status_ban);
    }

    public function getWriteStory()
    {
        return view('user.write_story');
    }

    public function postWriteStory(Request $request)
    {

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

        $file = $request->file('upload_picture');
        if ($request->file('upload_picture') != '') {
            $destinationPath = 'uploads/images/storys/';
            $extension = Input::file('upload_picture')->getClientOriginalExtension();
            $filename = rand(111111111, 999999999) . '.' . $extension;

            Image::make($file->getRealPath())
                ->fit(250, 350)
                ->save($destinationPath . $filename);

            $story->story_picture = $filename;
        }

        $story->save();

        $permission_story = new PermissionStory;
        $permission_story->story_id = $story->id;
        $permission_story->status_comment = $request->status_comment;
        $permission_story->status_public = $request->status_public;
        $permission_story->save();

        $ban_story = new BanStory;
        $ban_story->story_id = $story->id;
        $ban_story->status_ban = 0;
        $ban_story->save();

        $story_statistic = new StoryStatistic;
        $story_statistic->story_id = $story->id;
        $story_statistic->count_visitor = 0;
        $story_statistic->count_like = 0;
        $story_statistic->save();

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

        return redirect()->route('profile');
    }

    public function getWriteSubStory(Request $request)
    {
        $id = $request->id;
        $sub_story = SubStory::where('story_id', $id)->get();
        $count_sub_story = count($sub_story);
        return view('user.write_sub_story')
            ->with('id', $id)
            ->with('count_sub_story', $count_sub_story);
    }

    public function postInsertSubStory(Request $request)
    {
        // Sub Story
        $sub_story = new SubStory;
        $sub_story->story_id = $request->id;
        $sub_story->story_name = $request->story_name;
        $sub_story->story_outline = $request->story_outline;
        $sub_story->save();
        // End Sub Story

        // Permission
        $permission_sub_story = new PermissionSubStory;
        $permission_sub_story->sub_story_id = $request->id;
        $permission_sub_story->status_comment = $request->status_comment;
        $permission_sub_story->status_public = $request->status_public;

        if (empty($request->unlock_coin)) {
            $permission_sub_story->unlock_coin = 0;
        } else {
            $permission_sub_story->unlock_coin = $request->unlock_coin;
        }

        if (empty($request->unlock_diamond)) {
            $permission_sub_story->unlock_diamond = 0;
        } else {
            $permission_sub_story->unlock_diamond = $request->unlock_diamond;
        }

        $permission_sub_story->save();
        // End Permission

        // Ban Sub Story
        $ban_sub_story = new BanSubStory;
        $ban_sub_story->sub_story_id = $sub_story->id;
        $ban_sub_story->status_ban = 0;
        $ban_sub_story->save();
        // End Ban Sub Story

        // SubStoryStatistic
        $SubStoryStatistic = new SubStoryStatistic;
        $SubStoryStatistic->sub_story_id = $sub_story->id;
        $SubStoryStatistic->count_visitor = 0;
        $SubStoryStatistic->count_like = 0;
        $SubStoryStatistic->save();
        // End SubStoryStatistic

        return redirect()->route('main_story', ['id' => $request->id]);
    }

    public function getLoveStory($id)
    {
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

    public function postStoryComment(Request $request)
    {
        $comment = New StoryComment;
        $comment->story_id = $request->story_id;
        $comment->story_name = $request->story_name;
        $comment->username = $request->username;
        $comment->comment_detail = $request->comment;
        $comment->save();
        return redirect()->back();
    }

    public function getUpdateStory(Request $request)
    {
        $update_story = Story::find($request->id);
        $tag = Tag::where('story_id', $request->id)->first();
        $permission_story = PermissionStory::where('story_id', $request->id)->first();
        return view('user.update_story')
            ->with('update_story', $update_story)
            ->with('tag', $tag)
            ->with('permission_story', $permission_story);
    }

    public function postUpdateStory(Request $request)
    {
        $update_story = Story::find($request->id);
        $update_story->story_name = $request->story_name;
        $update_story->story_author = $request->story_author;
        $update_story->category_id = $request->category_id;
        $update_story->story_outline = $request->story_outline;

        $file = $request->file('upload_picture');
        if ($request->file('upload_picture') != '') {
            $destinationPath = 'uploads/images/storys/';
            $extension = Input::file('upload_picture')->getClientOriginalExtension();
            $filename = rand(111111111, 999999999) . '.' . $extension;

            Image::make($file->getRealPath())
                ->fit(250, 350)
                ->save($destinationPath . $filename);

            File::delete('uploads/images/storys/' . $update_story->story_picture);
            $update_story->story_picture = $filename;
        }

        $update_story->save();

        $update_tag = Tag::where('story_id', $request->id)->first();
        $update_tag->tag1 = $request->tag1;
        $update_tag->tag2 = $request->tag2;
        $update_tag->tag3 = $request->tag3;
        $update_tag->tag4 = $request->tag4;
        $update_tag->tag5 = $request->tag5;
        $update_tag->save();

        $update_permission = PermissionStory::where('story_id', $request->id)->first();
        $update_permission->status_comment = $request->status_comment;
        $update_permission->status_public = $request->status_public;
        $update_permission->save();

        return redirect()->route('profile');
    }

    public function getUpdateSubStory(Request $request)
    {
        $sub_story = SubStory::find($request->id);
        $count_sub_story = count(SubStory::where('story_id', $sub_story->story_id)->get());
        $permission_sub_story = PermissionSubStory::find($request->id);

        // Show limit when sub story >= 4
        $show_limit_visitors = SubStory::where('story_id', $sub_story->story_id)
            ->orderBy('id', 'asc')
            ->skip(4)
            ->take($count_sub_story)
            ->get();

        foreach ($show_limit_visitors as $show_limit_visitor) {
            if ($show_limit_visitor->id != $request->id) {
                $status_show_limit = 0;
            } else {
                $status_show_limit = 1;
                break;
            }
//            echo $show_limit_visitor->id. "<br>";
        }
        // End

        return view('user.update_sub_story')
            ->with('sub_story', $sub_story)
            ->with('count_sub_story', $count_sub_story)
            ->with('permission_sub_story', $permission_sub_story)
            ->with('show_limit_visitor', $show_limit_visitor)
            ->with('status_show_limit', $status_show_limit);
    }

    public function postUpdateSubStory(Request $request)
    {
        $update_sub_story = SubStory::find($request->id);
        $update_sub_story->story_name = $request->story_name;
        $update_sub_story->story_outline = $request->story_outline;
        $update_sub_story->save();

        $update_permission = PermissionSubStory::find($request->id);
        $update_permission->status_comment = $request->status_comment;
        $update_permission->status_public = $request->status_public;
        $update_permission->unlock_coin = $request->unlock_coin;
        $update_permission->unlock_diamond = $request->unlock_diamond;
        $update_permission->save();

        return redirect()->back();
    }

    public function postInsertStoryComment(Request $request)
    {
        $story_comment = new StoryComment;
        $story_comment->story_id = $request->id;
        $story_comment->comment_detail = $request->comment_detail;
        $story_comment->username = $request->username;
        $story_comment->save();
        return redirect()->back();
    }

    public function postInsertReplyCommentStory(Request $request)
    {
        $reply_comment = new ReplyCommentStory;
        $reply_comment->reply_comment_id = $request->id;
        $reply_comment->comment_detail = $request->comment_detail;
        $reply_comment->username = $request->username;
        $reply_comment->save();
        return redirect()->back();
    }

    public function postInsertSubStoryComment(Request $request)
    {
        $sub_story_comment = new SubStoryComment;
        $sub_story_comment->sub_story_id = $request->sub_story_id;
        $sub_story_comment->comment_detail = $request->comment_detail;
        $sub_story_comment->username = $request->username;
        $sub_story_comment->save();
        return redirect()->back();
    }

    public function postInsertReplyCommentSubStory(Request $request)
    {
        $reply_comment = new ReplyCommentSubStory;
        $reply_comment->reply_comment_id = $request->id;
        $reply_comment->comment_detail = $request->comment_detail;
        $reply_comment->username = $request->username;
        $reply_comment->save();
        return redirect()->back();
    }

    // Admin
    public function getStoryAll()
    {
        $storys = Story::all();
        return view('admin.story.story')
            ->with('storys', $storys);
    }

    public function getUpdateStoryFromAdmin(Request $request)
    {
        $categorys = Category::all();
        $story = Story::find($request->id);
        $tag = Tag::where('story_id', $request->id)->first();
        $permission_story = PermissionStory::where('story_id', $request->id)->first();
        return view('admin.story.update_story')
            ->with('categorys', $categorys)
            ->with('story', $story)
            ->with('tag', $tag)
            ->with('permission_story', $permission_story);
    }

    public function postUpdateStoryFromAdmin(Request $request)
    {
        $update_story = Story::find($request->id);
        $update_story->story_name = $request->story_name;
        $update_story->story_author = $request->story_author;
        $update_story->category_id = $request->category_id;
        $update_story->story_outline = $request->story_outline;

        $file = array('upload_picture' => Input::file('upload_picture'));
        if ($request->file('upload_picture') != '') {
            $destinationPath = 'uploads/images/storys';
            $extension = Input::file('upload_picture')->getClientOriginalExtension();
            $filename = rand(111111111, 999999999) . '.' . $extension;
            Input::file('upload_picture')->move($destinationPath, $filename);
            File::delete('uploads/images/storys/' . $update_story->story_picture);
            $update_story->story_picture = $filename;
        }

        $update_story->save();

        $update_tag = Tag::where('story_id', $request->id)->first();
        $update_tag->tag1 = $request->tag1;
        $update_tag->tag2 = $request->tag2;
        $update_tag->tag3 = $request->tag3;
        $update_tag->tag4 = $request->tag4;
        $update_tag->tag5 = $request->tag5;
        $update_tag->save();

        $update_permission = PermissionStory::where('story_id', $request->id)->first();
        $update_permission->status_comment = $request->status_comment;
        $update_permission->status_public = $request->status_public;
        $update_permission->save();
        return redirect()->route('story');
    }

    public function postBanStory(Request $request)
    {
        $ban_story = BanStory::where('story_id', $request->id)->first();
        $ban_story->status_ban = 1;
        $ban_story->save();
        return redirect()->route('story');
    }

    public function postUnbanStory(Request $request)
    {
        $ban_story = BanStory::where('story_id', $request->id)->first();
        $ban_story->status_ban = 0;
        $ban_story->save();
        return redirect()->route('story');
    }

    public function getSubStoryAll()
    {
        $sub_storys = SubStory::all();
        return view('admin.sub_story.sub_story')
            ->with('sub_storys', $sub_storys);
    }

    public function getUpdateSubStoryFromAdmin(Request $request)
    {
        $sub_story = SubStory::find($request->id);
        $count_sub_story = count(SubStory::where('story_id', $sub_story->story_id)->get());
        $permission_sub_story = PermissionSubStory::where('sub_story_id', $request->id)->first();
        return view('admin.sub_story.update_sub_story')
            ->with('sub_story', $sub_story)
            ->with('permission_sub_story', $permission_sub_story)
            ->with('count_sub_story', $count_sub_story);
    }

    public function postUpdateSubStoryFromAdmin(Request $request)
    {
        $update_sub_story = SubStory::find($request->id);
        $update_sub_story->story_name = $request->story_name;
        $update_sub_story->story_outline = $request->story_outline;
        $update_sub_story->save();

        $update_permission = PermissionSubStory::find($request->id);
        $update_permission->status_comment = $request->status_comment;
        $update_permission->status_public = $request->status_public;
        $update_permission->save();

        return redirect()->route('sub_story');
    }

    public function postBanSubStory(Request $request)
    {
        $ban_sub_story = BanSubStory::where('sub_story_id', $request->id)->first();
        $ban_sub_story->status_ban = 1;
        $ban_sub_story->save();
        return redirect()->route('sub_story');
    }

    public function postUnbanSubStory(Request $request)
    {
        $ban_sub_story = BanSubStory::where('sub_story_id', $request->id)->first();
        $ban_sub_story->status_ban = 0;
        $ban_sub_story->save();
        return redirect()->route('sub_story');
    }
    // End Admin
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment;
use App\Http\Requests\RequestRegisterWriter;
use App\Member;
use App\UnlockSubStory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Story;
use App\SubStory;
use App\Tag;
use App\StoryComment;
use App\SubStoryComment;
use App\ReplyCommentStory;
use App\ReplyCommentSubStory;
use Illuminate\Validation\Validator;
use Intervention\Image\Facades\Image;
use File;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

class StoryController extends Controller
{
    public function getReadStory(Request $request)
    {
        $id = $request->id;
        // Select story
        $story = Story::find($request->id);
        // Get category name
        $category = Category::find($story->category_id);
        $category_name = $category->category_name;
        $status_alert = $category->status_alert;

        // Update visit to story
        $story = Story::find($request->id);
        $story->update([
            'count_visitor' => ++$story->count_visitor
        ]);

        // Read comment
        $story_comments = StoryComment::where('story_id', $request->id)->orderBy('created_at', 'desc')->get();

        // Sub Story
        $sub_storys = SubStory::where('story_id', $request->id)->get();

        ($story->member_id == Auth::user()->id) ? $owner = 1 : $owner = 0;

        // Result Cash
        $total_coin = 0;
        foreach ($sub_storys as $sub_story) {
            if ($sub_story->unlock_coin > 0 && $sub_story->unlock_diamond > 0) {
                $coin_start = $sub_story->unlock_coin;
                $diamond_start = $sub_story->unlock_diamond;
                $unlockSubStory = UnlockSubStory::where('sub_story_id', $sub_story->sub_story_id)->get();
                if (count($unlockSubStory) > 0) {
                    foreach ($unlockSubStory as $item) {
                        $total_coin = $total_coin + $coin_start;
                    }
                }
            }
        }

        return view('user.read_story',
            compact('id', 'story', 'category_name', 'status_alert', 'story_comments',
            'sub_storys', 'owner', 'total_coin'));
    }

    public function getReadStoryDetail(Request $request)
    {

        $sub_story = SubStory::find($request->id);
        $story = Story::find($sub_story->story_id);
        $member = Member::find($story->member_id);

        // Check sub story permission cash

        if ($sub_story->unlock_coin != 0 && $sub_story->unlock_diamond != 0) {
            $unlockSubStory = UnlockSubStory::where('member_id', Auth::user()->id)
                ->where('sub_story_id', $request->id)->first();
            if (!$unlockSubStory && $member->id != Auth::user()->id) {
                return redirect('/user/read/story/'.$story->id);
            }
        }
        // End check permission

        $author = $story->story_author;
        $category = Category::find($story->category_id);

        // Update visitor
        $sub_story = SubStory::find($request->id);
        $sub_story->update([
           'count_visitor' => ++$sub_story->count_visitor
        ]);

        $count_comment = SubStoryComment::where('sub_story_id', $sub_story->id)->count();
        $updated_at = Carbon::parse($sub_story->updated_at)->addYears(543)->format('d / m / Y');

        $sub_story_comments = SubStoryComment::where('sub_story_id', $request->id)->orderBy('created_at', 'desc')->get();

        // Result Cash
        $total_coin = 0;
        $sub_storys = SubStory::where('story_id', $story->id)->get();
        foreach ($sub_storys as $sub_story) {
            if ($sub_story->unlock_coin > 0 && $sub_story->unlock_diamond > 0) {
                $coin_start = $sub_story->unlock_coin;
                $diamond_start = $sub_story->unlock_diamond;
                $unlockSubStory = UnlockSubStory::where('sub_story_id', $sub_story->sub_story_id)->get();
                if (count($unlockSubStory) > 0) {
                    foreach ($unlockSubStory as $item) {
                        $total_coin = $total_coin + $coin_start;
                    }
                }
            }
        }

        return view('user.story_detail')
            ->with('sub_story_id', $request->id)
            ->with('story', $story)
            ->with('sub_story', $sub_story)
            ->with('author', $author)
            ->with('category', $category)
            ->with('count_comment', $count_comment)
            ->with('updated_at', $updated_at)
            ->with('sub_story_comments', $sub_story_comments)
            ->with('total_coin', $total_coin);
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

        $file = $request->file('upload_picture');
        $story_picture = null;
        if ($request->file('upload_picture') != '') {
            $destinationPath = 'uploads/images/storys/';
            $extension = Input::file('upload_picture')->getClientOriginalExtension();
            $filename = rand(111111111, 999999999) . '.' . $extension;

            Image::make($file->getRealPath())
                ->resize(250, 350)
                ->orientate()
                ->save($destinationPath . $filename);

            $story_picture = $filename;
        }

        $story = Story::create([
            'member_id' => $request->user()->id,
            'category_id' => $request->category_id,
            'story_name' => $request->story_name,
            'story_author' => $request->story_author,
            'story_outline' => $request->story_outline,
            'story_picture' => $story_picture,
            'status_ban' => 0,
            'status_comment' => $request->status_comment,
            'status_public' => $request->status_public,
            'count_visitor' => 0,
            'count_like' => 0
        ]);

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
        $registerWriter = \App\RegisterWriter::where('member_id', Auth::user()->id)->get();
        $status_writer = 0;
        if ($registerWriter) {
            foreach ($registerWriter as $writer) {
                if ($writer->status_confirm == 1) {
                    $status_writer = 1;
                } else {
                    $status_writer = 0;
                }
            }
        }
        return view('user.write_sub_story', compact('id', 'count_sub_story', 'status_writer'));
    }

    public function postInsertSubStory(Request $request)
    {
        // Sub Story
        $sub_story = new SubStory;
        $sub_story->story_id = $request->id;
        $sub_story->story_name = $request->story_name;
        $sub_story->story_outline = $request->story_outline;
        $sub_story->status_ban = 0;
        $sub_story->status_comment = $request->status_comment;
        $sub_story->status_public = $request->status_public;
        $sub_story->count_visitor = 0;
        $sub_story->count_like = 0;

        if (empty($request->unlock_coin)) {
            $sub_story->unlock_coin = 0;
        } else {
            $sub_story->unlock_coin = $request->unlock_coin;
        }

        if (empty($request->unlock_diamond)) {
            $sub_story->unlock_diamond = 0;
        } else {
            $sub_story->unlock_diamond = $request->unlock_diamond;
        }

        $sub_story->save();

        return redirect()->route('main_story', ['id' => $request->id]);
    }

    public function postProfileComment(Request $request)
    {
        StoryComment::create([
            'story_id' =>  $request->story_id,
            'story_name' => $request->story_name,
            'comment_detail' => $request->comment
        ]);
        return redirect()->back();
    }

    public function getUpdateStory(Request $request)
    {
        $story = Story::find($request->id);
        $tag = Tag::where('story_id', $request->id)->first();
        return view('user.update_story')
            ->with('story', $story)
            ->with('tag', $tag);
    }

    public function postUpdateStory(Request $request)
    {
        $file = $request->file('upload_picture');
        $story_picture = null;
        if ($request->file('upload_picture') != '') {
            $destinationPath = 'uploads/images/storys/';
            $extension = Input::file('upload_picture')->getClientOriginalExtension();
            $filename = rand(111111111, 999999999) . '.' . $extension;

            Image::make($file->getRealPath())
                ->resize(250, 350)
                ->orientate()
                ->save($destinationPath . $filename);

            File::delete('uploads/images/storys/' . $story->story_picture);
            $story_picture = $filename;
        }

        Story::where('id', $request->id)->update([
            'story_name' => $request->story_name,
            'story_author' => $request->story_author,
            'category_id' => $request->category_id,
            'story_picture' => $story_picture,
            'story_outline' => $request->story_outline,
            'status_comment' => $request->status_comment,
            'status_public' => $request->status_public
        ]);

        Tag::where('story_id', $request->id)->update([
            'tag1' => $request->tag1,
            'tag2' => $request->tag2,
            'tag3' => $request->tag3,
            'tag4' => $request->tag4,
            'tag5' => $request->tag5
        ]);

        return redirect()->route('profile');
    }

    public function getUpdateSubStory(Request $request)
    {
        $sub_story = SubStory::find($request->id);
        $count_sub_story = count(SubStory::where('story_id', $sub_story->story_id)->get());

        // Show limit when sub story >= 4
        $show_limit_visitors = SubStory::where('story_id', $sub_story->story_id)
            ->orderBy('id', 'asc')
            ->skip(4)
            ->take($count_sub_story)
            ->get();

        $status_show_limit = 0;
        foreach ($show_limit_visitors as $show_limit_visitor) {
            if ($show_limit_visitor->id != $request->id) {
                $status_show_limit = 0;
            } else {
                $status_show_limit = 1;
                break;
            }
        }
        // End

        return view('user.update_sub_story')
            ->with('sub_story', $sub_story)
            ->with('count_sub_story', $count_sub_story)
            ->with('show_limit_visitor', $show_limit_visitors)
            ->with('status_show_limit', $status_show_limit);
    }

    public function postUpdateSubStory(Request $request)
    {
        SubStory::where('id', $request->id)->update([
            'story_name' => $request->story_name,
            'story_outline' => $request->story_outline,
            'status_comment' => $request->status_comment,
            'status_public' => $request->status_public,
            'unlock_coin' => $request->unlock_coin,
            'unlock_diamond' => $request->unlock_diamond
        ]);
        return redirect()->back();
    }

    public function postInsertStoryComment(Comment $request, StoryComment $storyComment)
    {
        $storyComment->addComment($request);
        return redirect()->back();
    }

    public function postInsertReplyCommentStory(Comment $request, ReplyCommentStory $replyStoryComment)
    {
        $replyStoryComment->addComment($request);
        return redirect()->back();
    }

    public function postInsertSubStoryComment(Comment $request, SubStoryComment $subStoryComment)
    {
        $subStoryComment->addComment($request);
        return redirect()->back();
    }

    public function postInsertReplyCommentSubStory(Comment $request, ReplyCommentSubStory $replySubStoryComment)
    {
        $replySubStoryComment->addComment($request);
        return redirect()->back();
    }

    public function LikeStoryUpdate(Request $request)
    {
        $story = \App\Story::find($request->story_id);
        $story->update([
            'count_like' => ($story->count_like) + $request->count_like
        ]);
        return redirect()->back();
    }

    public function LikeSubStoryUpdate(Request $request)
    {

    }

    // Admin
    public function getStoryAll()
    {
        Session::put('active_menu', 'category');
        $storys = Story::all();
        return view('admin.story.story')
            ->with('storys', $storys);
    }

    public function getUpdateStoryFromAdmin(Request $request)
    {
        $categorys = Category::all();
        $story = Story::find($request->id);
        $tag = Tag::where('story_id', $request->id)->first();
        return view('admin.story.update_story')
            ->with('categorys', $categorys)
            ->with('story', $story)
            ->with('tag', $tag);
    }

    public function postUpdateStoryFromAdmin(Request $request)
    {
        $file = array('upload_picture' => Input::file('upload_picture'));
        $story_picture = null;
        if ($request->file('upload_picture') != '') {
            $destinationPath = 'uploads/images/storys';
            $extension = Input::file('upload_picture')->getClientOriginalExtension();
            $filename = rand(111111111, 999999999) . '.' . $extension;
            Input::file('upload_picture')->move($destinationPath, $filename);
            File::delete('uploads/images/storys/' . $update_story->story_picture);
            $story_picture = $filename;
        }

        Story::where('id', $request->id)->update([
            'story_name' => $request->story_name,
            'story_author' => $request->story_author,
            'category_id' => $request->category_id,
            'category_outline' => $request->story_outline,
            'story_picture' => $story_picture,
            'status_comment' => $request->status_comment,
            'status_public' => $request->status_public
        ]);

        Tag::where('story_id', $request->id)->update([
            'tag1' => $request->tag1,
            'tag2' => $request->tag2,
            'tag3' => $request->tag3,
            'tag4' => $request->tag4,
            'tag5' => $request->tag5
        ]);

        return redirect()->route('story');
    }

    public function postBanStory(Request $request)
    {
        Story::where('id', $request->id)->update([
            'status_ban' => 1
        ]);
        return redirect()->route('story');
    }

    public function postUnbanStory(Request $request)
    {
        Story::where('id', $request->id)->update([
            'status_ban' => 0
        ]);
        return redirect()->route('story');
    }

    public function getSubStoryAll()
    {
        Session::put('active_menu', 'category');
        $sub_storys = SubStory::all();
        return view('admin.sub_story.sub_story')
            ->with('sub_storys', $sub_storys);
    }

    public function getUpdateSubStoryFromAdmin(Request $request)
    {
        $sub_story = SubStory::find($request->id);
        $count_sub_story = count(SubStory::where('story_id', $sub_story->story_id)->get());
        return view('admin.sub_story.update_sub_story')
            ->with('sub_story', $sub_story)
            ->with('count_sub_story', $count_sub_story);
    }

    public function postUpdateSubStoryFromAdmin(Request $request)
    {
        SubStory::where('id', $request->id)->update([
            'story_name' => $request->story_name,
            'story_outline' => $request->story_outline,
            'status_comment' => $request->status_comment,
            'status_public' => $request->status_public
        ]);
        return redirect()->route('sub_story');
    }

    public function postBanSubStory(Request $request)
    {
        SubStory::where('id', $request->id)->update([
            'status_ban' => 1
        ]);
        return redirect()->route('sub_story');
    }

    public function postUnbanSubStory(Request $request)
    {
        SubStory::where('id', $request->id)->update([
            'status_ban' => 0
        ]);
        return redirect()->route('sub_story');
    }
    // End Admin
}

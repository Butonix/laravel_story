<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;
use App\Tag;

class SearchController extends Controller
{
    public function postSearch(Request $request) {

        $storys = new Story;
        $search_author = $storys::where('story_author', $request->txt_search)->get();

        if (count($search_author) > 0) {
            return view('user.search')
                ->with('txt_search', $request->txt_search)
                ->with('storys', $search_author);
        } else {

            $search_story_name = $storys::where('story_name', $request->txt_search)->get();

            if (count($search_story_name) > 0) {
                return view('user.search')
                    ->with('txt_search', $request->txt_search)
                    ->with('storys', $search_story_name);
            } else {

                $search_tag1 = Tag::where('tag1', $request->txt_search)->get();
                $search_tag2 = Tag::where('tag2', $request->txt_search)->get();
                $search_tag3 = Tag::where('tag3', $request->txt_search)->get();
                $search_tag4 = Tag::where('tag4', $request->txt_search)->get();
                $search_tag5 = Tag::where('tag5', $request->txt_search)->get();

                if (count($search_tag1) > 0) {
                    return view('user.search_tag')
                        ->with('tags', $search_tag1);
                }
                if (count($search_tag2) > 0) {
                    return view('user.search_tag')
                        ->with('tags', $search_tag2);
                }
                if (count($search_tag3) > 0) {
                    return view('user.search_tag')
                        ->with('tags', $search_tag3);
                }
                if (count($search_tag4) > 0) {
                    return view('user.search_tag')
                        ->with('tags', $search_tag4);
                }
                if (count($search_tag5) > 0) {
                    return view('user.search_tag')
                        ->with('tags', $search_tag5);
                }

                return redirect()->back()->with('status_search', 'fail');
            }

        }

    }
}

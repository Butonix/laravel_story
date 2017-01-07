<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;

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
                return redirect()->back()->with('status_search', 'fail');
            }

        }

    }
}

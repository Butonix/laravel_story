<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;
use Session;

class PromoteController extends Controller
{
    public function getPromoteStory()
    {
        Session::put('active_menu', 'category');
        $storys = new Story;
        $storys = $storys::all();
        return view('admin.promote.story')->with('storys', $storys);
    }
}

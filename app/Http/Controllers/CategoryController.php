<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function getCategory($id) {
        $category = new Category;
        $category = $category::where('id', $id)->first();
        $category_name = $category->category_name;

        $storys = new Story;
        $select_category = $storys::where('category_name', $category_name)->get();
        return view('user.category')->with('storys', $select_category)->with('category_name', $category_name);
    }
}

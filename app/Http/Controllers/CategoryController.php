<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Story;
use Session;

class CategoryController extends Controller
{

    public function getAllCategory() {
        Session::put('active_menu', 'category');
        $categorys = new Category;
        return view('admin.category.category')->with('categorys', $categorys->get());
    }

    public function getAddCategory() {
        Session::put('active_menu', 'category');
        return view('admin.category.add_category');
    }

    public function postAddCategory(Request $request) {
        $category = new Category;
        $check_category = $category::where('category_name', $request->category_name)->count();
        if ($check_category > 0) {
            return redirect()->back()
                ->withInput()
                ->with('status_category', 'fail');
        } else {
            $category->category_name = $request->category_name;

            if ($request->status_alert != null) {
                $category->status_alert = 1;
            } else {
                $category->status_alert = 0;
            }

            $category->save();
            return redirect()->route('category/all')
                ->with('status_category', 'done');
        }

    }

    public function getEditCategory(Request $request) {
        $category = new Category;
        $category_name = $category::find($request->category_id);
        return view('admin.category.edit_category')->with('category', $category_name);
    }

    public function postEditCategory(Request $request) {

        $check_category = Category::where('category_name', $request->category_name)->count();

        if ($check_category > 1) {
            return redirect()->back()
                ->withInput()
                ->with('status_category', 'fail');
        }

        $category = Category::find($request->category_id);
        $category->category_name = $request->category_name;

        if ($request->status_alert != null) {
            $category->status_alert = 1;
        } else {
            $category->status_alert = 0;
        }
        $category->save();

        return redirect()->route('category/all')
            ->with('status_edit_category', 'done');
    }

    public function getDeleteCategory(Request $request) {
        $category = new Category;
        $category::where('id', $request->category_id)->delete();
        return redirect()->back()->with('status_delete_category', 'done');
    }

    public function getCategory($id) {
        $category = new Category;
        $category = $category::where('id', $id)->first();
        $category_name = $category->category_name;

        $storys = new Story;
        $select_category = $storys::where('category_name', $category_name)->get();
        return view('user.category')->with('storys', $select_category)->with('category_name', $category_name);
    }
}

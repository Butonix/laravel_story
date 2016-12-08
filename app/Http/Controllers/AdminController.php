<?php

namespace App\Http\Controllers;

use App\Member;
use App\Category;
use App\FacebookLogin;
use App\Story;
use App\HistoryCashcard;

use Illuminate\Http\Request;
use Session;
use Hash;

class AdminController extends Controller
{
    public function main() {
        return view('admin.main');
    }

    public function getAllMember() {
        Session::put('active_menu', 'member');
        $members = new Member;
        return view('admin.member.member')->with('members', $members->get());
    }

    public function getAllFacebook() {
        Session::put('active_menu', 'member');
        $facebook = new FacebookLogin;
        return view('admin.member.facebook')->with('facebooks', $facebook->get());
    }

    public function getAddMember() {
        return view('admin.member.add_member');
    }

    public function postAddMember(Request $request) {
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
        return redirect()->route('member/all')
        ->with('status_register', 'done');
    }

    public function getEditMember($member_id) {
        $member = new Member;
        $info = $member::find($member_id);
        return view('admin.member.edit_member')->with('info', $info);
    }

    public function postEditMember(Request $request) {
        $member = new Member;

        // check data change
        $data = $member::where('id', $request->id)->first();

        if ($data->username == $request->username) {
          $check_username = 0;
        } else {
          $check_username = $member::where('username', $request->username)->count();
        }

        if ($data->email == $request->email) {
          $check_email = 0;
        } else {
          $check_email = $member::where('email', $request->email)->count();
        }

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

        if ($request->password != null) {
            // if (Hash::check('plain-text', $request->token)) {
                $new_password = Hash::make($request->password);
                $member::where('id', $request->id)->update([
                  'username' => $request->username,
                  'email' => $request->email,
                  'password' => $new_password
                ]);
            // }
        } else {
            $member::where('id', $request->id)->update([
              'username' => $request->username,
              'email' => $request->email
            ]);
        }

        return redirect()->route('member/all')
        ->with('status_edit', 'done');
    }

    public function getDeleteMember(Request $request) {
        $member = new Member;
        $member::where('id', $request->member_id)->delete();
        return redirect()->back()->with('status_delete', 'done');
    }

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
        $category = new Category;

        $check_category = $category::where('category_name', $request->category_name)->count();
        if ($check_category > 0) {
            return redirect()->back()
            ->withInput()
            ->with('status_category', 'fail');
        }

        $category::where('id', $request->category_id)->update([
            'category_name' => $request->category_name
        ]);

        return redirect()->route('category/all')
        ->with('status_edit_category', 'done');
    }

    public function getDeleteCategory(Request $request) {
        $category = new Category;
        $category::where('id', $request->category_id)->delete();
        return redirect()->back()->with('status_delete_category', 'done');
    }

    public function getReportVisit() {
        Session::put('active_menu', 'visit');
        $storys = new Story;
        $storys = $storys::orderBy('visit', 'desc')->get();
        return view('admin.report.visit')->with('storys', $storys);
    }

    public function getReportTopup() {
        $history_cashcard = new HistoryCashCard;
        $history_cashcard = $history_cashcard::where('response_code', '0')->get();
        return view('admin.report.topup')->with('history_cashcard', $history_cashcard);
    }
}

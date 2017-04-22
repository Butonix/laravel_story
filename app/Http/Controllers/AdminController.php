<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Administrator;
use Auth;
use Session;
use Hash;

class AdminController extends Controller
{

    public function main()
    {
        Session::put('active_menu', '');
        return view('admin.main');
    }

    public function getFormChangePassword()
    {
        return view('admin.form_change_password');
    }

    public function postUpdatePassword(Request $request)
    {
        $admin = Administrator::where('id', 1)->first();
        $admin->password = Hash::make($request->cf_password);
        $admin->save();
        return redirect()->back()->with('status', 'success');
    }
}

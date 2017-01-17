<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AdminAuthController extends Controller
{
    public function index() {
        return view('admin.form_login');
    }

    public function postLogin(Request $request) {
        $username = $request->username;
        $password = $request->password;
        if (Auth::guard('admin')->attempt(['username' => $username, 'password' => $password])) {
            return redirect()->route('main');
        } else {
            return redirect()->back();
        }

    }

    public function getLogout() {
        Auth::logout();
        Session::flush();
        return redirect()->route('auth');
    }
}

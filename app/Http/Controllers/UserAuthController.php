<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use App\Member;
use App\DeviceLogin;
use App\MemberMoney;
use Session;

class UserAuthController extends Controller
{
    public function postRegister(Request $request)
    {
        $check_username = Member::where('username', $request->username)->count();
        $check_email = Member::where('email', $request->email)->count();

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

        $member = Member::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'text_password' => encrypt($request->password),
            'status_ban' => 0
        ]);

        MemberMoney::create([
            'member_id' => $member->id,
            'cash' => 0,
            'diamond' => 0
        ]);
        return redirect()->back()
            ->with('status_success', 'done');
    }

    public function postLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->login_email, 'password' => $request->login_password])) {
            $check_device = DeviceLogin::where('ip_address', $request->ip())->get();
//            return count($check_device);
            if (count($check_device) < 3) {
                $device_login = new DeviceLogin;
                $device_login->username = Auth::User()->username;
                $device_login->ip_address = $request->ip();
                $device_login->save();
                Session::put(['device_id' => $device_login->id]);
            } else {
                Auth::logout();
                Session::flush();
                return redirect()->route('index')->with('status', 'device limit');
            }
            return redirect()->back();
        } else {
            return redirect()->back()->withInput($request->except('password'))->with('status_login', 'fail');
        }
    }

    public function logout()
    {
        DeviceLogin::where('id', Session::get('device_id'))->delete();
        Auth::logout();
        Session::flush();
        return redirect()->route('index');
    }
}

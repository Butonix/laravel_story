<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class AdminController extends Controller
{
    public function main() {
        Session::put('active_menu', '');
        return view('admin.main');
    }

}

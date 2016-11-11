<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function index() {
        return view('user.home');
    }

    public function getCategory($id) {
        return view('user.category')->with('id', $id);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;

class BannerController extends Controller
{
    public function getBanner1() {
        $banner_detail = Banner::find(1);
        return view('user.banner_detail')
        ->with('banner', $banner_detail);
    }

    public function getBanner2() {
        $banner_detail = Banner::find(2);
        return view('user.banner_detail')
        ->with('banner', $banner_detail);
    }

    public function getBanner3() {
        $banner_detail = Banner::find(3);
        return view('user.banner_detail')
        ->with('banner', $banner_detail);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Banner;
use App\AboutUs;
use App\HowToUseDiamond;
use App\Rules;
use Session;

class ChangeUIController extends Controller
{
    public function getBanner()
    {
        for ($i = 1; $i <= 3; $i++) {
            $check_field = Banner::find($i);
            if (!$check_field) {
                $create_field = new Banner;
                $create_field->save();
            }
        }

        $banner_1 = Banner::find(1);
        $banner_2 = Banner::find(2);
        $banner_3 = Banner::find(3);
        return view('admin.change_ui.banner')
            ->with('banner_1', $banner_1)
            ->with('banner_2', $banner_2)
            ->with('banner_3', $banner_3);
    }

    public function postUpdateBanner(Request $request)
    {
        $banner = new Banner;
        $banner_1 = $banner::find(1);
        $banner_1->banner_detail = $request->banner_detail_1;
        $banner_1->save();
        $banner_2 = $banner::find(2);
        $banner_2->banner_detail = $request->banner_detail_2;
        $banner_2->save();
        $banner_3 = $banner::find(3);
        $banner_3->banner_detail = $request->banner_detail_3;
        $banner_3->save();
        return redirect()->back();
    }

    public function getHowToWriting()
    {
        $check_field = AboutUs::find(1);
        if (!$check_field) {
            $create_field = new AboutUs;
            $create_field->save();
        }
        $how_to_writing = AboutUs::find(1);
        return view('admin.change_ui.how_to_writing')
            ->with('how_to_writing', $how_to_writing);
    }

    public function postUpdateHowToWriting(Request $request)
    {
        $how_to_writing = AboutUs::find(1);
        if ($how_to_writing) {
            $how_to_writing->detail = $request->how_to_writing;
            $how_to_writing->save();
        }
        return redirect()->back();
    }

    public function getHowToRegister()
    {
        $check_field = HowToUseDiamond::find(1);
        if (!$check_field) {
            $create_field = new HowToUseDiamond;
            $create_field->save();
        }
        $how_to_register = HowToUseDiamond::find(1);
        return view('admin.change_ui.how_to_register')
            ->with('how_to_register', $how_to_register);
    }

    public function postUpdateHowToRegister(Request $request)
    {
        $how_to_register = HowToUseDiamond::find(1);
        if ($how_to_register) {
            $how_to_register->detail = $request->how_to_register;
            $how_to_register->save();
        }
        return redirect()->back();
    }

    public function getHowToSupport()
    {
        $check_field = Rules::find(1);
        if (!$check_field) {
            $create_field = new Rules;
            $create_field->save();
        }
        $how_to_support = Rules::find(1);
        return view('admin.change_ui.how_to_support')
            ->with('how_to_support', $how_to_support);
    }

    public function postUpdateHowToSupport(Request $request)
    {
        $how_to_support = Rules::find(1);
        if ($how_to_support) {
            $how_to_support->detail = $request->how_to_support;
            $how_to_support->save();
        }
        return redirect()->back();
    }

    public function getContact()
    {
        Session::put('active_menu', 'front-end');
        $contact = new Contact;
        $check_detail = $contact::where('id', 1)->first();

        if (count($check_detail) == 0) {
            $contact->contact_detail = '';
            $contact->save();
        } else {
            $contact = $contact::where('id', 1)->first();
        }

        return view('admin.change_ui.contact')->with('contact', $contact);
    }

    public function postUpdateContact(Request $request)
    {
        $contact = new Contact;
        $contact = $contact::where('id', 1)->first();
        $contact->contact_detail = $request->contact_detail;
        $contact->save();
        return redirect()->back();
    }

}

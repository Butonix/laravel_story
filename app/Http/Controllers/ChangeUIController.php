<?php

namespace App\Http\Controllers;

use App\HowToUnlockStory;
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

    public function getAboutUs()
    {
        $check_field = AboutUs::find(1);
        if (!$check_field) {
            $create_field = new AboutUs;
            $create_field->save();
        }
        $about_us = AboutUs::find(1);
        return view('admin.change_ui.about_us')
            ->with('about_us', $about_us);
    }

    public function postUpdateAboutUs(Request $request)
    {
        $about_us = AboutUs::find(1);
        if ($about_us) {
            $about_us->detail = $request->detail;
            $about_us->save();
        }
        return redirect()->back();
    }

    public function getHowToUseDiamond()
    {
        $check_field = HowToUseDiamond::find(1);
        if (!$check_field) {
            $create_field = new HowToUseDiamond;
            $create_field->save();
        }
        $how_to_diamond = HowToUseDiamond::find(1);
        return view('admin.change_ui.how_to_diamond')
            ->with('how_to_diamond', $how_to_diamond);
    }

    public function postUpdateHowToUseDiamond(Request $request)
    {
        $how_to_diamond = HowToUseDiamond::find(1);
        if ($how_to_diamond) {
            $how_to_diamond->detail = $request->detail;
            $how_to_diamond->save();
        }
        return redirect()->back();
    }

    public function getRules()
    {
        $check_field = Rules::find(1);
        if (!$check_field) {
            $create_field = new Rules;
            $create_field->save();
        }
        $rules = Rules::find(1);
        return view('admin.change_ui.rules')
            ->with('rules', $rules);
    }

    public function postUpdateRules(Request $request)
    {
        $rules = Rules::find(1);
        if ($rules) {
            $rules->detail = $request->detail;
            $rules->save();
        }
        return redirect()->back();
    }

    public function getHowToUnlockStory()
    {
        $check_field = HowToUnlockStory::find(1);
        if (!$check_field) {
            $create_field = new HowToUnlockStory;
            $create_field->save();
        }
        $how_to_unlock_story = HowToUnlockStory::find(1);
        return view('admin.change_ui.how_to_unlock_story')
            ->with('how_to_unlock_story', $how_to_unlock_story);
    }

    public function postUpdateHowToUnlockStory(Request $request)
    {
        $how_to_unlock_story = HowToUnlockStory::find(1);
        if ($how_to_unlock_story) {
            $how_to_unlock_story->detail = $request->detail;
            $how_to_unlock_story->save();
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

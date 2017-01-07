<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Session;

class ChangeUIController extends Controller
{
    public function getEditorContact() {
        Session::put('active_menu', 'front-end');
        $contact = new Contact;
        $check_detail = $contact::where('id', 1)->first();

        if (count($check_detail) == 0) {
            $contact->detail = '';
            $contact->save();
        } else {
            $contact = $contact::where('id', 1)->first();
        }

        return view('admin.editor.contact')->with('contact', $contact);
    }

    public function postEditorContact(Request $request) {
        $contact = new Contact;
        $contact = $contact::where('id', 1)->first();
        $contact->detail = $request->detail;
        $contact->save();
        return redirect()->back();
    }

    public function getBannerDetail() {

    }
}

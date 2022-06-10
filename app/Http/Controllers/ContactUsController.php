<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Models\Menu;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function contactUs()
    {
        $menuObj = Menu::where('slug', 'contact')->with('apiLinks')->firstOrNew();
        return view('front_site.contact_page',compact('menuObj'));
    }

    public function contactStore(Request $request)
    {
        $validated = $this->validate($request, [
            "name" => "required|max:50",
            "email" => "required",
            "subject" => "required",
            "message" => "required"
        ], [
            'name.required' => 'Name is required.',
            'email.required'  => 'Email is required.',
            'subject' => 'Subject is required.',
            'message' => 'Message is required.'
        ]);
        $contactData          = new ContactUs();
        $contactData->name    = $request->name;
        $contactData->email   = $request->email;
        $contactData->subject = $request->subject;
        $contactData->message = $request->message;
        $contactData->save();
        return redirect()->back()->with('flash_success', "Thank you for contacting us");
    }
    public function contactStatus()
    {
        $contactData          = ContactUs::all();
        return view('admin.contact_page', compact('contactData'));
    }
}

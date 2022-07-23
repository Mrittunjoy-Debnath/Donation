<?php

namespace App\Http\Controllers;

use App\Contact;
use App\OnlinePayment;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {

        return view('front-end.contact.contact');
    }

    public function saveContact(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'phonenumber' => 'required',
            'message' => 'required',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phonenumber = $request->phonenumber;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->route('contact')->with('success','Your Suggestions is saved successfully.Thank you.');
    }

    public function donatePerson()
    {
        $payments = OnlinePayment::latest()->get();
        return view('front-end.donate.donatepeople',[
            'payments' => $payments,
        ]);
    }
}

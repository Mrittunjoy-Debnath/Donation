<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;
class MessageController extends Controller
{
    public function showMessage()
    {
        $messages = Contact::all();

        return view('admin.contact.showmessage',[
            'messages' => $messages,
        ]);
    }

    public function deleteMessage($id)
    {
        $message = Contact::find($id);
        $message->delete();
        return redirect()->back()->with('success','Message delete successfully');
    }
}

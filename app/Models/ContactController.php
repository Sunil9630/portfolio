<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $messages = Contact::latest()->paginate(15);

        return view('admin.contacts.index', compact('messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:100',
            'email'=>'required|email',
            'subject'=>'required|max:255',
            'message'=>'required'
        ]);

        Contact::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message
        ]);

        return back()->with('success','Message Sent Successfully.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return back()->with('success','Message Deleted.');
    }
}
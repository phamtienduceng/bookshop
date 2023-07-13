<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactUsController extends Controller
{
    public function index(){
        $contacts = Contact::all();

        return view('admin.contactUs.viewContact', compact('contacts'));
    }

    public function getContactUs(Request $request){
        $contact = $request->all();

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ], 
        [
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'subject.required' => 'Subject is required.',
            'message.required' => 'Message is required.',
        ]);
        
        Contact::create($contact);
        return redirect()->route('contactUs')->with('message', 'Send message successfully');
    }
}

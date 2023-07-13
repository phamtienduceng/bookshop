<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\contactUs;

class DashboardController extends Controller
{
    public function home(){
        return view('admin.home');
    }

    public function product(){
        return view('admin.product');
    }
    
    public function showProfile()
    {
        return view('admin.profile'); 
    }

    public function profile(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|alpha|min:2|max:30',
            'password' => 'nullable|min:8',
            'phone' => 'required|min:10|numeric',
            'address' => 'required',
        ]);

        $user= User::find(\auth()->id());
        $user->name =$request->name;
        $user->phone =$request->phone;
        $user->address =$request->address;
        $user->password = bcrypt($request->input('password')); 

        $user->save();
        return redirect()->route('home')->with('success','cap nhat thanh cong');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
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
        
        contactUs::create($contact);
        return redirect()->route('contactUs');
    }

}

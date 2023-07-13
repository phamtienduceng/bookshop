<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\contactUs;
use App\Models\Product;

class DashboardController extends Controller
{
    public function home(){
        return view('admin.home');
    }

    public function product(){
        return view('admin.product');
    }

    public function viewSingle($slug){
        $book = Product::where('slug', $slug)->first();

        return view('admin.product.viewSingle', compact('book'));
    }
    
    public function showProfile()
    {
        return view('admin.profile'); 
    }

    public function profile(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|alpha|min:2|max:30',
            'phone' => 'required|integer|digits: 10',
            'address' => 'required',
        ], [
            'name.required' => 'Name is required',
            'name.alpha' => 'Name must only contain letters.',
            'name.min' => 'Name must only contain letters.',
            'name.max' => 'Name must only contain letters.',
            'phone.required' => 'Phone is required',
            'phone.integer' => 'Phone must only contain digits',
            'phone.digits' => 'Phone field must be 10 digits',
            'address.required' => 'Address is required',
        ]);

        $user= User::find(\auth()->id());
        $user->name =$request->name;
        $user->phone =$request->phone;
        $user->address =$request->address;

        $user->save();
        return redirect()->route('home')->with('success','cap nhat thanh cong');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}

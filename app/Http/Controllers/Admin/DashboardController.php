<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\contactUs;
use App\Models\Product;
use Hash;

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
            'phone' => 'required|numeric|min:10',
            'address' => 'required',
        ], [
            'name.required' => 'Name is required',
            'name.alpha' => 'Name must only contain letters.',
            'name.min' => 'Name must only contain letters.',
            'name.max' => 'Name must only contain letters.',
            'phone.required' => 'Phone is required',
            'address.required' => 'Address is required',
        ]);

        $user= User::find(\auth()->id());
        $user->name =$request->name;
        $user->phone =$request->phone;
        $user->address =$request->address;

        $user->save();
        return redirect()->back()->with('success','Successfully updated');
    }


    public function showPassword()
    {
        return view('admin.UpdatePassword'); 
    }

    public function password(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' =>'required|min:4',
            'new_confirm_password' => 'same:new_password',
        ]);
        $current_user=auth()->user();
        if(Hash::check($request->old_password, $current_user->password)){
            $current_user->update([
                'password'=>bcrypt($request->input('new_password'))
            ]);
            return redirect()->back()->with('success','Change Password Successfully');
        }else{
            return redirect()->back()->with('error','Old Password Is Not Correct');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}

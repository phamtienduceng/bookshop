<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\Mail;
use App\Http\Controllers\Auth\Str;
use App\Http\Controllers\Auth\UserVerify;
use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Route;
use Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')
                ->withSuccess('You have Successfully loggedin');
        }

        return redirect("login")->with('error', 'Email or Password is inconnect');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function postRegistration(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|alpha|min:2|max:30',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
            'Confirm-Password' => 'required|same:password',
        ], [
            'name.required' => 'Name is required.',
            'name.alpha' => 'Name must only contain letters.',
            'name.min' => 'Name must be at least 2 characters.',
            'name.max' => 'Name must not be greater than 30 characters',
            'email.required' => 'Email is required.',
            'email.email' => 'Email must be a valid email address.',
            'email.unique' => 'Email has already been taken',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 4 characters.',
            'Confirm-Password.same' => 'Confirm password field must match password',
            'Confirm-Password.required' => 'Confirm password is required.',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();
        return  redirect()->route('login')->withSuccess('Great! You have Successfully loggedin');
    }


    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}

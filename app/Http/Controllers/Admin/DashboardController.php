<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home(){
        return view('admin.home');
    }

    public function product(){
        return view('admin.product');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function register()
    {
        return view('admin.register');
    }
}

<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('guest.index');
    }

    public function contactUs(){
        return view('guest.page.contactUs');
    }

    public function aboutUs(){
        return view('guest.page.aboutUs');
    }

    public function articles(){
        return view('guest.page.articles');
    }

    public function products(){
        return view('guest.page.products');
    }
}

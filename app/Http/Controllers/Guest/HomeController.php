<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $books = Product::all();
        return view('guest.index', compact('books'));
    }

    public function singleProducts($slug){
        $book = Product::where('slug', $slug)->first();
        return view('guest.singleProduct', compact('book'));
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

        $books = Product::all();
        return view('guest.page.products', compact('books'));
    }
}

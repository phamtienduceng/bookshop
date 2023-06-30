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

    public function cart(){
        return view('guest.cart');
    }

    public function aboutUs(){
        return view('guest.page.aboutUs');
    }

    public function articles(){
        return view('guest.page.articles');
    }

    public function products(Request $request){
        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];

            if($sort_by == 'price_desc'){
                $books = Product::all()->sortByDesc('price');
            }elseif($sort_by == 'price_asc'){
                $books = Product::all()->sortBy('price');
            }elseif($sort_by == 'title_asc'){
                $books = Product::all()->sortBy('title');
            }elseif($sort_by == 'title_desc'){
                $books = Product::all()->sortByDesc('title');
            }elseif($sort_by == 'latest'){
                $books = Product::all()->sortByDesc('created_at');
            }elseif($sort_by == 'oldest'){
                $books = Product::all()->sortBy('created_at');
            }        
        }else{
            $books = Product::all();
        }    
        return view('guest.page.products', compact('books'));
    }
}

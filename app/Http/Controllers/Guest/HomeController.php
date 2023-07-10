<?php

namespace App\Http\Controllers\Guest;

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
        
        $category_id = $book->category_id;

        $related = Product::where('category_id', $category_id)->whereNotIn('slug', [$slug])->inRandomOrder()->limit(5)->get();
        return view('guest.singleProduct', compact('book', 'related'));
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
                $books = Product::orderBy('created_at', 'asc')->paginate(12);
            }
       
        }

        if(isset($_GET['filter_cate'])){


            // $books = Product::whereBetween('price', [$min_price, $max_price])->orderBy('price', 'asc')->paginate(12);

            $checked = $_GET['filter_cate'];
            $books = Product::whereIn('category_id', $checked)->get();

            if(isset($_GET['start_price']) && $_GET['end_price']){

            $min_price = $_GET['start_price'];
            $max_price = $_GET['end_price'];

            $books = Product::whereBetween('price', [$min_price, $max_price])->whereIn('category_id', $checked)->orderBy('price', 'asc')->get();
            }
        }
        else{
            $books = Product::paginate(12);
            
            if(isset($_GET['start_price']) && $_GET['end_price']){

                $min_price = $_GET['start_price'];
                $max_price = $_GET['end_price'];
    
                $books = Product::whereBetween('price', [$min_price, $max_price])->orderBy('price', 'asc')->get();
            }

        }    

        $category = Category::orderBy('id', 'asc')->get();

        return view('guest.page.products', compact('books', 'category', 'min_price', 'max_price'
                                                    , 'min_price_range', 'max_price_range'));
    }

    public function search(Request $request){
        $category = Category::orderBy('id', 'asc')->get();
        $min_price = Product::min('price');
        $min_price_range = $min_price - 12;
        $max_price = Product::max('price');
        $max_price_range = $max_price + 100;
        
        if($_GET['keywords'] != null){
            $keywords = $request->keywords;
            $search_books = Product::where('title', 'like', '%'.$keywords.'%')->get();
            return view('guest.page.search', compact('category', 'search_books'));
        }else{
            $category = Category::orderBy('id', 'asc')->get();
            $books = Product::all();
            return redirect()->route('products');
        }
    }
}

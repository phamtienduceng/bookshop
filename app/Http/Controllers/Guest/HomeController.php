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

    public function addToCart($id, Request $request)
    {
        $books = $request->all();
        $books['slug'] = \Str::slug($request->title);

        if($request->hasFile('photo'))
        {
            $file = $request -> file('photo');
            $ext = $file->getClientOriginalExtension();
            if($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg')
            {
                $cates = Category::all();
                return view('admin.product.create')
                    ->with('error', 'only jpg, png or jpeg');
            }
            $imgName = $file->getClientOriginalName();
            $file->move('images', $imgName);
        }else
        {
            $imgName = null;
        }
        $books['image'] = $imgName;

        $books = Product::find($id);

        if(!$books) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this is the first product
        if(!$cart) {

            $cart = [
                    $id => [
                        "title" => $books->title,
                        "quantity" => 1,
                        "price" => $books->price,
                        "image" => $books->image
                    ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Book added successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Book added successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "title" => $books->title,
            "quantity" => 1,
            "price" => $books->price,
            "image" => $books->image
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Book added successfully!');

    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Book removed successfully');
        }
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

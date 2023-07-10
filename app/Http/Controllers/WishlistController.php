<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = auth()->user()->wishlist;
        return view('wishlist.index', compact('wishlist'));
    }

    public function store(Product $product)
{
    auth()->user()->wishlist()->syncWithoutDetaching([$product->id]);
    return redirect()->back();
}

public function destroy(Product $product)
{
    auth()->user()->wishlist()->detach($product->id);
    return redirect()->back();
}


    public function __construct()
    {
        $this->middleware('auth');
    }
}

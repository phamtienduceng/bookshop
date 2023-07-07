<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        // Retrieve the cart items from the session
        $cartItems = Session::get('cart.items', []);

        // Check if the product already exists in the cart
        if (isset($cartItems[$product->id])) {
            // If it exists, update the quantity
            $cartItems[$product->id]['quantity'] += $request->quantity;
        } else {
            // If it doesn't exist, add it to the cart
            $cartItems[$product->id] = [
                'product' => $product,
                'quantity' => $request->quantity,
            ];
        }

        // Store the updated cart items back to the session
        Session::put('cart.items', $cartItems);

        // Redirect to cart index and display success message
        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully.');
    }


    public function index()
    {
        // Retrieve the cart items from the session
        $cartItems = Session::get('cart.items', []);

        // Calculate the total price of the cart items
        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $totalPrice += $item['product']->price * $item['quantity'];
        }

        // Store the total price in the session
        Session::put('total', $totalPrice);

        // Pass the cart items and total price to the cart view
        return view('cart.index', compact('cartItems', 'totalPrice'));
    }
    public function updateQuantity(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        $cartItems = Session::get('cart.items', []);
        if (isset($cartItems[$product->id])) {
            if ($request->action == 'increase') {
                $cartItems[$product->id]['quantity']++;
            } else if ($request->action == 'decrease') {
                $cartItems[$product->id]['quantity']--;
                if ($cartItems[$product->id]['quantity'] <= 0) {
                    unset($cartItems[$product->id]);
                }
            }

            Session::put('cart.items', $cartItems);

            // Recalculate total price
            $totalPrice = $this->calculateTotalPrice($cartItems);
            Session::put('total', $totalPrice);
        }

        return response()->json(['newQuantity' => $cartItems[$product->id]['quantity'] ?? 0]);
    }

    public function removeItem(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        $cartItems = Session::get('cart.items', []);
        if (isset($cartItems[$product->id])) {
            unset($cartItems[$product->id]);
            Session::put('cart.items', $cartItems);

            // Recalculate total price
            $totalPrice = $this->calculateTotalPrice($cartItems);
            Session::put('total', $totalPrice);
        }

        return response()->json(['success' => true]);
    }

    private function calculateTotalPrice($cartItems)
    {
        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $totalPrice += $item['product']->price * $item['quantity'];
        }

        return $totalPrice;
    }




}

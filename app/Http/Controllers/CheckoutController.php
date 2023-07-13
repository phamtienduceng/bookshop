<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CartItem;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::all();
        $totalPrice = $this->calculateTotalPrice($cartItems);
        return view('checkout.index', compact('totalPrice'));
    }

    public function processPayment(Request $request)
    {
        $paymentMethod = $request->input('payment_method');
        $paymentAmount = $request->input('payment_amount');
        $paymentSuccessful = $this->processPaymentMethod($paymentMethod, $paymentAmount);

        if ($paymentSuccessful) {
            $order = $this->createOrder($request);
            if ($order instanceof Order) {
                // Get the total amount before clearing the cart data
                $cartItems = CartItem::all();
                $totalAmount = $this->calculateTotalPrice($cartItems);

                // Clear the cart data
                $this->clearCartData($request);

                // Redirect to the success page with the total amount
                return redirect()->route('checkout.success')->with([
                    'success' => 'Payment processed successfully. Order ID: ' . $order->id,
                    'totalAmount' => $totalAmount
                ]);
            } else {
                return $order;
            }
        }
        return redirect()->route('checkout.cancel')->with('error', 'Payment processing failed.');
    }





    private function createOrder(Request $request)
    {
        $customerName = $request->input('customer_name');
        $orderTotal = $request->input('order_total');
        $products = $request->session()->get('cart');

        $user = auth()->user();

        if ($user === null) {
            return redirect()->route('login')->with('error', 'You must be logged in to complete the checkout process.');
        }

        $userId = $user->id;

        $order = Order::create([
            'user_id' => $userId,
            'customer_name' => $customerName ?: 'Administrator',
            'order_total' => $orderTotal,
        ]);

        if ($products !== null) {
            foreach ($products as $product) {
                if (isset($product['id'])) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $product['id'],
                        'quantity' => $product['quantity'],
                        'price' => $product['price'],
                    ]);
                }
            }
        }

        return $order;
    }



    private function processPaymentMethod($paymentMethod, $paymentAmount)
    {
        // Add your payment processing logic here
        // Return true if payment is successful, false otherwise
        // This is a sample value
        return true;
    }

    public function calculateTotalPrice($cartItems)
    {
        $totalPrice = 0;

        foreach ($cartItems as $cartItem) {
            $productPrice = $cartItem->product->price;
            $totalPrice += $productPrice * $cartItem->quantity;
        }

        return $totalPrice;
    }

    private function clearCartData()
    {
        // Deleting all items from the cart
        CartItem::truncate();
    }


    public function success()
    {
        $totalAmount = session()->get('totalAmount', 0);
        $orderID = uniqid(); // Generate a random order ID
        return view('checkout.success', [
            'totalAmount' => $totalAmount,
            'orderID' => $orderID,
        ]);
    }




    public function cancel()
    {
        return view('checkout.cancel');
    }
}
